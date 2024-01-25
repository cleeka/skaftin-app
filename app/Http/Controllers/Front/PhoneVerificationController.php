<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

use App\Models\User;

class PhoneVerificationController extends Controller
{
    
    public function showForm()
     { 
       return view('front.send-verification-code');
     } 
     
    public function sendVerificationCode(Request $request)
    {
        $input = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|unique:users',
            'password' => 'required|string',
             
        ]);

        $phoneNumber = $input['phone_number'];

        try {
            $verificationCode = mt_rand(1000, 9999); // Generate a random code

            // Send verification code via Twilio
            app('twilio')->messages->create(
                // $phoneNumber,
                [
                    'from' => config('services.twilio.from'),
                    'body' => "Your verification code is: $verificationCode",
                ]
            );

            // Save the user and verification code in the database
            $user = User::create(array_merge($input, ['code' => $verificationCode]));

            return response()->json(['message' => 'Verification code sent successfully']);
        } catch (TwilioException $e) {
            return response()->json(['error' => 'Failed to send verification code']);
        }
    }
}
