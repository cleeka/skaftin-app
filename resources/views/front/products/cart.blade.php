<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

          <div class="products mt-5 mb-5">
                <div class="container">
                	@if(Session::has('error_message'))
                                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          <strong>Error:</strong><?php echo Session::get('error_message'); ?>
                    
                                              </div>
                                             @endif

                                             @if(Session::has('success_message'))
                                             <div class="alert alert-success alert-dismissible   fade show" role="alert">
                                                <strong>Success:</strong> <?php echo Session::get('success_message'); ?>
                                              </div>
                                             @endif
                     <div id="appendCartItems" >
                         @include('front.products.cart_items')
                    </div> 
                </div>
          </div>

@endsection