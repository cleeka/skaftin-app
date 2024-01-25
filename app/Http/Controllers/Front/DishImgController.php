<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DishsImage;


class DishImgController extends Controller
{
    public function index()
    {
        $dishs_images = DishsImage::all();
        return response()->json(['data' => $dishs_images], 200); 
    }
}
