<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Order;
use App\Models\DeliveryAddress;
use Validator;
use Session;
use Hash;
use DB;

class UserController extends Controller

{
    
    public function index()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
     } 

    public function register(Request $request)
    {
        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:6',
        //     'phone_number' => 'required|string|min:10',
        // ]);
        
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()], 422);
        // }

        // Generate a 6-digit verification code
        $verificationCode = mt_rand(100000, 999999);

        $user = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'verification_code' => $verificationCode,
        ]);
        
        

       
        
         // Send the verification code to the user's email
          $this->sendVerificationCodeEmail($user->email, $verificationCode);

        return response()->json(['message' => 'User registered successfully']);
    }
    
    private function sendVerificationCodeEmail($email, $verificationCode)
    {
        $subject = 'Email Verification Code';
        $data = ['verificationCode' => $verificationCode];

        Mail::send('emails.verification_code', $data, function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
    
     public function verifyEmail(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|digits:6',
        ]);

        // Find the user
        $user = User::where('email', $request->email)
            ->where('verification_code', $request->verification_code)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid verification code'], 422);
        }

        // Update the user's email verification status (you may also want to reset the verification code)
        $user->email_verified_at = now();
        $user->save();

        return response()->json(['message' => 'Email verified successfully', 'user' => $user ]);
    }
    
     public function verifyPassword(Request $request)
    {
        // Validation
        $request->validate([
            // 'email' => 'required|email',
            'verification_code' => 'required|digits:6',
        ]);

        // Find the user
        $user = User::where('verification_code', $request->verification_code)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid verification code'], 422);
        }

        // Update the user's email verification status (you may also want to reset the verification code)
        $user->email_verified_at = now();
        $user->save();

        return response()->json(['message' => 'Password verified successfully' ]);
    }
    
    
    public function sendResetCode(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the user with the provided email exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Generate a new 6-digit verification code
        $verificationCode = mt_rand(100000, 999999);

        // Update the user's verification code in the database
        DB::table('users')->where('id', $user->id)->update([
            'verification_code' => $verificationCode,
        ]);

        // Send the new verification code to the user's email
        $this->sendVerificationCodeEmail($user->email, $verificationCode);

        return response()->json(['message' => 'New verification code sent to your email']);
    }
    
    
    
     public function update(Request $request, $id)
     {
        //  $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:6',
        //     'phone_number' => 'required|string|min:10',
        //  ]);
         
        $user = User::find($id);

      if (!$user) {
          return response()->json(['message' => 'User not found'], 404);
      }

      $user->update($request->all());

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
     }
     
    
     
     public function updateProfileImage(Request $request, User $user)
     {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profileImage = $request->file('profile_image');
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();

        $profileImage->storeAs('front/profile_images', $imageName, 'public');

        $user->update([
            'profile_image' => $imageName,
        ]);

        return response()->json(['message' => 'Profile image updated successfully', 'profile_image' => $imageName ]);
     }
    
    public function updatePassword(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $request->validate([
            'password' => 'required|string|min:6',
        ]);

        $user->password = bcrypt($request->input('password'));
        $user->save();

        return response()->json(['message' => 'Password updated successfully']);
       }
    
    
      
      
      public function deleteUserAndOrders($userId)
    {
        // Find the user by ID
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete associated orders
        Order::where('user_id', $userId)->delete();

        // Delete the user
        $user->delete();

        return response()->json(['message' => 'User account and associated orders deleted successfully']);
    }
    
     public function resendCode($email)
     {
        // Validation
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid email'], 422);
        }

        // Find the user by email
        $user = User::where('email', $email)->first();

        // Generate a new 6-digit verification code
        $verificationCode = mt_rand(100000, 999999);

        // Update the user's verification code in the database
        $user->update([
            'verification_code' => $verificationCode,
        ]);

        // Send the new verification code to the user's email
        $this->sendVerificationCodeEmail($user->email, $verificationCode);

        return response()->json(['message' => 'New verification code sent to your email']);
    }
    
    
    
}
