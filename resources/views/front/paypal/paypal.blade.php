<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

          <div class="products mt-5 mb-5">
                <div class="container text-center">
                    
                    <h4 class="text-center"> Please make payment for your order!</h4>
                    <p></p>
                    <form action="{{ route('payment') }}" method="post" >@csrf
                    	<input type="hidden" name="amount" value="{{ round(Session::get('grand_total')/18.17,2) }}">
                    	<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png">

                    </form>
                    
                </div>
          </div>

@endsection