<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;



class AuthController extends BaseController
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['firstname'] =  $user->firstname;
            $success['lastname'] =  $user->lastname;
            $success['id'] =  $user->id;
            $success['email'] =  $user->email;
            $success['phone_number'] =  $user->phone_number;
            $success['profile_image'] =  $user->profile_image;
            $success['email_verified_at'] =  $user->email_verified_at;
   
            return $this->sendResponse($success, 'User login successfully.' );
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    
        
}
