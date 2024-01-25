<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use Auth;
use DB;

class AddressController extends Controller
{
    public function addAddress(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Create a new address for the user
        $address = new Address([
            'user_id' => $userId,
            'address' => $request->input('address'),
            
        ]);

        // Save the address to the database
         $address->save();

        return response()->json(['message' => 'Address added successfully'], 201);
    }
}
