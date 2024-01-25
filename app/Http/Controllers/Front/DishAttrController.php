<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishsAttribute;

class DishAttrController extends Controller
{
    public function index()
    {
        $dishs_attributes = DishsAttribute::all();
        return response()->json(['data' =>  $dishs_attributes], 200); 
    }
}
