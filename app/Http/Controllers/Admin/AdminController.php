<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetail;
use App\Models\VendorsBankDetail;
use Image;
use Session;

class AdminController extends Controller
{
    public function dashboard() {
      Session::put('page','dashboard');
      return view('admin.dashboard');      
    }

    public function updateAdminPassword(Request $request) {
      Session::put('page','update_admin_password');
      if($request->isMethod('post')){
         $data = $request->all();
         //check if current password entered by admin is correct
         if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
         //check if new password is matching with confirm password
         	if($data['confirm_password']==$data['new_password']){
         		Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
         		return redirect()->back()->with('success_message','Password has been updated successfully!');
         	}else{
         		return redirect()->back()->with('error_message','New password and Confirm password does not match!');
         	}
         }else{
         	return redirect()->back()->with('error_message','Your current password is incorrect!');
         }

      }
      $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
      return view('admin.settings.update_admin_password')->with(compact('adminDetails'));      
    }

    public function checkAdminPassword(Request $request){
      $data = $request->all();
      if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
      	return "true";
      }else{
      	return "false";
      }
    }

    public function updateAdminDetails(Request $request){
      Session::put('page','update_admin_details');
    	if($request->isMethod('post')){
    		$data = $request->all();

    		//update admin image
    		if($request->hasFile('admin_image')){
               $image_tmp = $request->file('admin_image');
               if($image_tmp->isValid()){
               	// Get image extension
               	$extension = $image_tmp->getClientOriginalExtension();
               	//Generate new image name
               	$imageName = rand(111,99999).'.'.$extension;
               	$imagePath = 'admin/images/photos/'.$imageName;
               	// Upload the image
               	Image::make($image_tmp)->save($imagePath);
               }
            }else if(!empty($data['current_admin_image'])){
            	$imageName = $data['current_admin_image'];
            }else{
            	$imageName = "";
            }

    		//update admin details
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'], 'mobile'=>$data['admin_phone'],'image'=>$imageName]);

           return redirect()->back()->with('success_message','Admin details updated successfully!');
    	}
    	return view('admin.settings.update_admin_details');
    }

    public function updateVendorDetails($slug, Request $request){
      if($slug=="personal"){
        Session::put('page','update_personal_details');
        if($request->isMethod('post')){
         $data = $request->all();
         
          //update admin image
        if($request->hasFile('vendor_image')){
               $image_tmp = $request->file('vendor_image');
               if($image_tmp->isValid()){
                // Get image extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $imageName = rand(111,99999).'.'.$extension;
                $imagePath = 'admin/images/photos/'.$imageName;
                // Upload the image
                Image::make($image_tmp)->save($imagePath);
               }
            }else if(!empty($data['current_vendor_image'])){
              $imageName = $data['current_vendor_image'];
            }else{
              $imageName = "";
            }
            
         // update admin identity proof
          if($request->hasFile('identity_image')){
               $image_tmp = $request->file('identity_image');
               if($image_tmp->isValid()){
                // Get image extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $fileName = rand(111,99999).'.'.$extension;
                $filePath = 'admin/images/proofs/'.$fileName;
                // Upload the image
                Image::make($image_tmp)->save($filePath);
               }
            }else if(!empty($data['current_identity_image'])){
              $fileName = $data['current_identity_image'];
            }else{
              $fileName = "";
            }
            

        //update in admins table
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name'], 'mobile'=>$data['vendor_phone'],'image'=>$imageName]);
         //update in vendors table
            Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'], 'mobile'=>$data['vendor_phone'], 'address'=>$data['vendor_address'], 'city'=>$data['vendor_city'], 'province'=>$data['vendor_province'], 'postal'=>$data['vendor_postal'],'image'=>$imageName, 'identity_proof'=>$data['identity_proof'], 'identity_image'=>$fileName
            ]);

           return redirect()->back()->with('success_message','Cooks details updated successfully!');
        }
        $vendorDetails = Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
     
      }else if ($slug=="bank"){
        Session::put('page','update_bank_details');
        if($request->isMethod('post')){
         $data = $request->all();

         $vendorCount = VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->count();
          if($vendorCount>0){
            //update in vendors bank details table
            VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update(['account_holder_name'=>$data['account_holder_name'], 'bank_name'=>$data['bank_name'], 'account_number'=>$data['account_number'], 'branch_code'=>$data['branch_code'], 'account_type'=>$data['account_type']]);
          }else{
            //insert in in vendors bank details table
            VendorsBankDetail::insert(['vendor_id'=>Auth::guard('admin')->user()->vendor_id,'account_holder_name'=>$data['account_holder_name'], 'bank_name'=>$data['bank_name'], 'account_number'=>$data['account_number'], 'branch_code'=>$data['branch_code'], 'account_type'=>$data['account_type']]);
          }

           return redirect()->back()->with('success_message','Cook Bank details updated successfully!');
         }
        $vendorCount = VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->count();

         if($vendorCount>0){
            $vendorDetails = VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
          }else{
            $vendorDetails = array();
          }
      }
      return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails'));

    }

    public function login(Request $request) {

    if($request->isMethod('post')){
       $data = $request->all();
       //echo "<pre>"; print_r($data); die;

       $validated = $request->validate([
        'email' => 'required|email|max:255',
        'password' => 'required',
       ]);

      /* if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
             return redirect('admin/dashboard');
           }else{
           	return redirect()->back()->with('error_message','Invalid Emmail or Password');
           }*/
       if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
             if(Auth::guard('admin')->user()->type=="vendor" && Auth::guard('admin')->user()->confirm=="No"){
              return redirect()->back()->with('error_message','Please confirm your email to activate your Vendor Account');
             }else if(Auth::guard('admin')->user()->type!="vendor" && Auth::guard('admin')->user()->status=="0"){
               return redirect()->back()->with('error_message','Your admin account is not active');
             }else{
              return redirect('admin/dashboard');
             }  
           }else{
            return redirect()->back()->with('error_message','Invalid Email or Password');
           }

    }	
      return view('admin.login');      
    }  

    public function admins($type=null){
      $admins = Admin::query();
      if(!empty($type)){
        $admins = $admins->where('type',$type);
        $title = ucfirst($type)."s";
        Session::put('page','view_'.strtolower($title));
      }else{
        $title = "All Admins/Subadmins/Vendors";
        Session::put('page','view_all');
      }
      $admins = $admins->get()->toArray();

      return view('admin.admins.admins')->with(compact('admins','title'));
    }

    public function viewVendorDetails($id){
      $vendorDetails = Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
      $vendorDetails = json_decode(json_encode($vendorDetails),true);
      // dd ($vendorDetails);
      return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
    }

     // updateAdminStatus
    public function updateAdminStatus(Request $request){
     if($request->ajax()){
      $data = $request->all();
      
      if($data['status']=="Active"){
        $status = 0;
      }else{
        $status = 1;
      }
      Admin::where('id',$data['admin_id'])->update(['status'=>$status]);
      $adminDetails = Admin::where('id',$data['admin_id'])->first()->toArray();
      if($adminDetails['type']=="vendor" && $status==1){
        Vendor::where('id',$adminDetails['vendor_id'])->update(['status'=>$status]);

         //send approval email
            $email = $adminDetails['email'];
            $messageData = [
             'email' => $adminDetails['email'],
             'name' => $adminDetails['name'],
             
            ];

            Mail::send('emails.vendor_approved',$messageData,function($message)use($email){
              $message->to($email)->subject('Vendor Account is Approved');
            });
      }

      return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
     }
       
    }

    public function logout(){
       Auth::guard('admin')->logout();
       return redirect('admin/login');

    }
}
