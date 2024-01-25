<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Section;


class DishesController extends Controller
{
    public function index()
    {
        $dishes = Dish::orderBy('created_at', 'desc')->get();
        return response()->json(['data' => $dishes], 200); 
    }
    
    public function showSectionDishes($sectionId)
    {
        $dishes = Dish::where('section_id', $sectionId)->get();

        return response()->json(['dishes' => $dishes], 200);
    }
    
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $results = Dish::whereJsonContains('days', $searchTerm)
            ->orWhereJsonContains('days', $searchTerm)->orderBy('created_at', 'desc')
            ->get();

        return response()->json($results);
    }
}
