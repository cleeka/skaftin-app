<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\NewsletterSubscriber;

class IndexController extends Controller
{
    public function index(){

    	return view('front.index');
    }
    
    public function story(){

    	return view('front.ourstory');
    }
    
    public function faq(){

    	return view('front.faq');
    }
    
    public function food(){

    	return view('front.foodsafety');
    }
    
    public function policy(){

    	return view('front.privacy');
    }
    
     public function terms(){

    	return view('front.terms');
    }

    public function store(Request $request)
    {

    	$subs = new NewsletterSubscriber;

        $subs->email = $request->input('subscriber_email');

        $subs->save();

        return redirect('/subscriber')->with('success','Data Saved');
    }



}
