<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Vendor;
use Validator;
use Session;
use Auth;
use Hash;
use DB;

class VendorController extends Controller
{
    public function register(){
    	return view('front.vendors.register');
    }

    public function login(){
    	return view('front.vendors.login');
    }

    public function vendorRegister(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();

         // Validate Vendor
    		$rules = [
              "name" => "required",
              "email" => "required|email|unique:admins|unique:vendors",
              "mobile" => "required|min:11|numeric|unique:admins|unique:vendors",
              "accept" => "required"
    		];
    		$customMessages = [
              "name.required" => "Name is required",
              "email.required" => "Email is required",
              "email.unique" => "Email already exists",
              "mobile.required" => "Mobile is required",
              "mobile.unique" => "Mobile already exists",
              "accept.required" => "Please accept T&C",

    		];
    		$validator = Validator::make($data,$rules,$customMessages);
    		if($validator->fails()){
    			return Redirect::back()->withErrors($validator);
    		}

    		DB::beginTransaction();

    		// Create vendor account
            
            //insert the vendor details in vendors table
    		$vendor = new Vendor;
    		$vendor->name = $data['name'];
    		$vendor->email = $data['email'];
    		$vendor->mobile = $data['mobile'];
    		$vendor->status = 0;
    		$vendor->save();

    		$vendor_id = DB::getPdo()->lastInsertId();

    		//insert the vendor details in admins table
    		$admin = new Admin;
    		$admin->type = 'vendor';
    		$admin->vendor_id = $vendor_id;
    		$admin->name = $data['name'];
    		$admin->email = $data['email'];
    		$admin->mobile = $data['mobile'];
    		$admin->password = bcrypt($data['password']);
    		$admin->status = 0;
    		$admin->save();

    		//send confirmation email
            $email = $data['email'];
            $messageData = [
             'email' => $data['email'],
             'name' => $data['name'],
             'code' => base64_encode($data['email'])
            ];

            Mail::send('emails.vendor_confirmation',$messageData,function($message)use($email){
            	$message->to($email)->subject('Confirm your vendor Account');
            });

            DB::commit();

            // Redirect back vendor with success message
            $message = "Thanks for registering as a Cook, Please check your email to confirm";
            return redirect()->back()->with('success_message',$message);

    	}
    }

    public function confirmVendor($email){
    	// Decode vendor email
    	$email = base64_decode($email);
    	// check vendor email exists
    	$vendorCount = Vendor::where('email',$email)->count();
    	if($vendorCount>0){
    		//vendor email is already activated or not
    		$vendorDetails = Vendor::where('email',$email)->first();
    		if($vendorDetails->Confirm == "Yes"){
    			$message = "Your vendor account is already confirmed. you can login";
    			return redirect('vendor/register')->with('error_message',$message);
    		}else{
    			// update confirm column to yes in both admins/vendors tables to activate
    			Admin::where('email',$email)->update(['confirm'=>'Yes']);
    			Vendor::where('email',$email)->update(['confirm'=>'Yes']);

    			//send register email
                $messageData = [
                 'email' => $email,
                 'name' => $vendorDetails->name,
                 'mobile' => $vendorDetails->mobile
                ];

                 Mail::send('emails.vendor_confirmed',$messageData,function($message)use($email){
            	     $message->to($email)->subject('Your vendor Account is confirmed');
                 });

    			//redirect to vendor login/register page with success message
    			$message = "Your vendor email account is confirmed. You can now login";
    			return redirect('vendor/register')->with('success_message',$message);
    		}
    	}else{
    		abort(404);
    	}
    }
    
    public function forgotPasswordVendor(Request $request){
    	if($request->ajax()) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;

    		$validator = Validator::make($request->all(), [
              'email'  => 'required|email|max:150|exists:vendors'
             ],
    		 [
              'email.exists' =>'Email does not Exists'
    		 ]
         	);

         	if($validator->passes()){
         		// generate new password
               $new_password = Str::random(16);

               // update new password
              Admin::where('email',$data['email'])->update(['password'=>bcrypt($new_password)]);

               //get vendor details
               $adminDetails = Admin::where('email',$data['email'])->first()->toArray();

               // send email to vendor
               $email = $data['email'];
               $messageData = ['name'=>$adminDetails['name'],'email'=>$email,'password'=>$new_password];
               Mail::send('emails.vendor_forgot_password',$messageData,function($message)use($email){
               	$message->to($email)->subject('New Password - Skaftin');

               });

               return response()->json(['type'=>'success','message'=>'New Password has been sent to your email!']);
         	}else{
         		return response()->json(['type'=>'error','errors'=>$validator->messages()]);
         	}
    		
    	}else {
    		return view('front.vendors.forgot_password');
    	}
    	
    }
}
