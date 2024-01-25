<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return response()->json(['data' =>  $vendors], 200); 
    }
}
