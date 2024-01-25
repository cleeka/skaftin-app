<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

          <div class="products mt-5 mb-5">
                <div class="container">
                    
                    <h4 class="text-center"> YOUR PAYMENT HAS BEEN CONFIRMED</h4>
                    <p class="text-center">Thank for the payment. We will process your order very soon</p>
                    <p class="text-center">Your order number is {{ Session::get('order_id') }} and Total amount paid is R{{ Session::get('grand_total') }}</p>
                     
                </div>
          </div>

@endsection
<?php
  Session::forget('grand_total');
  Session::forget('order_id');
?>