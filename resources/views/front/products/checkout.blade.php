<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')


           <div class="products mt-5 mb-5">
                        <div class="container">
                          
                            @if(Session::has('error_message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> <?php echo Session::get('error_message'); ?>
                                </div>
                            @endif
                            <div class="row cart">
                                <div class="col-md-6" id="deliveryAddresses">
                                	@include('front.products.delivery_addresses')
                                </div>

                                <div class="col-md-6">
                                    <div class="single mt-4">
                                        <div class="cart__summary">
                                          <form name="checkoutForm" id="checkoutForm
                                              " action="{{ url('/checkout') }}" method="post">@csrf
                                             @if(count($deliveryAddresses)>0)
                                        <h4 class="title">Select Delivery address</h4>
                                       
                                         @foreach($deliveryAddresses as $address)
                                           <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="address_id" id="address{{ $address['id'] }}" value="{{ $address['id'] }}" >
                                                  <label class="form-check-label" for="flexRadioDefault">{{ $address['name'] }}, {{ $address['address'] }}
                                                 <!--  ({{ $address['mobile'] }}) -->
                                                  </label>
                                                  <a style="float: right; margin-left: 5px;" href="javascript:;" data-addressid="{{ $address['id'] }}" class="removeAddress">Remove</a>
                                                  <a style="float: right;" href="javascript:;" data-addressid="{{ $address['id'] }}" class="editAddress">Edit</a>
                                                </div>
                                              @endforeach
                                              @endif 
                                              <br>
                                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="text-primary">Your Order</span>
                                            </h4>
                                               
                                            <ul class="list-group mb-3">
                                            	@php $total_price = 0 @endphp
                                                @foreach($getCartItems as $item)
                                                  <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']); 
                                                  ?>
                                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                                    <div>
                                                    <h6 class="my-0">{{ $item['product']['product_name'] }}</h6>
                                                    <small class="text-muted">x {{ $item['quantity'] }}</small>
                                                    </div>
                                                    <span class="text-muted">R{{ ($getDiscountAttributePrice['final_price'] * $item['quantity']) }}</span>
                                                </li>
                                                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                                 @endforeach
                                                 <li class="list-group-item d-flex justify-content-between">
                                                    <span>Items total</span>
                                                    <strong>R{{ $total_price }}</strong>
                                                </li>   
                                                 <li class="list-group-item d-flex justify-content-between">
                                                    <span>Shipping & Handling</span>
                                                    <strong>R{{ $total_price * 10/100}}</strong>
                                                </li>    
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>Delivery Amount</span>
                                                    <strong id="result"></strong>
                                                </li>
                                                @php $grand_total = $total_price  +  $total_price * 10/100 @endphp

                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>Grand Total</span>
                                                  
                                                    <strong>R{{ $grand_total }}</strong>
                                                </li>
                                            </ul>
                                      
                                            <!-- <form class="card p-2">
                                                <div class="input-group">
                                                  <input type="text" class="form-control" placeholder="Promo code">
                                                  <button type="submit" class="btn btn-secondary">Redeem</button>
                                                </div>
                                            </form> -->

                                            <hr class="my-4">
                                  
                                            <h4 class="mb-3">Payment</h4>
                                  
                                            <div class="row gy-3">
                                                <div class="col-md-6">
                                                   <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="payment_gateway"  id="cash-on-delivery" value="COD">
                                                  <label class="form-check-label" for="flexRadioDefault1">
                                                         Cash on Delivery
                                                   </label>
                                                </div>
                                                <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="payment_gateway" id="paypal" value="Paypal" checked>
                                                  <label class="form-check-label" for="flexRadioDefault2">
                                                         Paypal
                                                  </label>
                                                </div>
                                                </div>
                                            </div>  
                                            <button class="btn primary dark block mt-4 custom" type="submit">Place Order</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                             
                            </div>
                        
                  </div>
                </div>

@endsection