<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

<div class="products mt-5 mb-5">
                        <div class="container">
                       

                              <nav aria-label="breadcrumb">
                             <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="{{ url('/')}} ">Home</a></li>
                               <?php echo $categoryDetails['breadcrumbs'] ?>

                             </ol>
                            </nav>

                            <div class="single mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single--details img-gallery">

                                            <div class="large-img large-img-js">
                                                <div class="large-img-item">
                                                    <a href="{{ asset('front/images/product_images/large/'.$productDetails['product_image']) }}" data-rel="lightcase:myCollection">
                                                        <img src="{{ asset('front/images/product_images/large/'.$productDetails['product_image']) }}" alt="Image">
                                                    </a>
                                                </div>
                                                @foreach($productDetails['images'] as $image)
                                                <div class="large-img-item">
                                                    <a href="{{ asset('front/images/product_images/large/'.$image['image']) }}" data-rel="lightcase:myCollection">
                                                        <img src="{{ asset('front/images/product_images/large/'.$image['image']) }}" alt="Image">
                                                    </a>
                                                </div>
                                                 @endforeach
                                            </div>
                                              	
                                            <div class="small-img small-img-js slick-arrow-2">

                                               <div class="small-img-item">
                                                    <img src="{{ asset('front/images/product_images/large/'.$productDetails['product_image']) }}" alt="Image">
                                                </div>

                                               @foreach($productDetails['images'] as $image)
                                                <div class="small-img-item">
                                                    <img src="{{ asset('front/images/product_images/large/'.$image['image']) }}" alt="Image">
                                                </div>
                                                
                                                @endforeach

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single--details product-info pl-0">
                                            <h3>{{ $productDetails['product_name'] }}</h3>
                                            <?php $getDiscountPrice = Product::getDiscountPrice($productDetails['id']); ?>
                                            <span class="getAttributePrice">
                                            @if($getDiscountPrice>0)
                                            <div class="product-price">
                                                <span> R{{ $getDiscountPrice }}</span>
                                                <del>R{{ $productDetails['product_price'] }}</del>
                                            </div>
                                            @else
                                            <div class="product-price">
                                                <span>R{{ $productDetails['product_price'] }}</span>
                                            </div>
                                            @endif
                                            </span>
                                            <div class="product-meta">
                                                <ul>
                                                    <li>
                                                        <strong>Brand:</strong> 
                                                        <span>
                                                            <a href="#">{{ $productDetails['brand']['name']  }}</a>
                                                        </span>
                                                    </li>
                                                    @if(isset($productDetails['vendor']))
                                                    <li>
                                                        <strong>Sold by:</strong> 
                                                        <span>
                                                    <a href="/products/{{ $productDetails['vendor']['id'] }}">{{ $productDetails['vendor']['vendorbusinessdetails']['shop_name']   }}</a>
                                                        </span>
                                                    </li>
                                                    @endif
                                                    <li>
                                                        <strong>Product Code:</strong> 
                                                        <span>
                                                            <a>{{ $productDetails['product_code'] }}</a>
                                                        </span>
                                                    </li>
                                                    @if($totalStock>0)
                                                    <li>
                                                        <strong>Stock:</strong> 
                                                        <span>
                                                            <a>{{ $totalStock }} Left</a>
                                                        </span>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            @if(count($groupProducts)>0)
                                            <div>
                                                <strong>Product Colours</strong>
                                                <div>
                                                    @foreach($groupProducts as $product)
                                                    <a href="{{ url('product/'.$product['id']) }}"><img style="width:50px;" src="{{ asset('front/images/product_images/small/'.$product['product_image']) }}"></a>
                                                    @endforeach

                                                </div>
                                                
                                            </div>
                                            @endif
                                        
                                          
                                            @if(Session::has('error_message'))
                                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                              <?php echo Session::get('error_message'); ?>
                    
                                              </div>
                                             @endif

                                             @if(Session::has('success_message'))
                                             <div class="alert alert-success alert-dismissible   fade show" role="alert">
                                                 <?php echo Session::get('success_message'); ?>
                                              </div>
                                             @endif
                                            <form action="{{ url('cart/add') }}" method="Post">@csrf
                                            <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                                            @if($totalStock>0) 
                                            <div class="row align-items-end">
                                              <div class="col-6">
                                              	<h6>Attributes:</h6> 
                                                 <select name="size" id="getPrice" product-id="{{ $productDetails['id'] }}" class="form-select" aria-label="Default select example" required="">
                                                 	<option value="">Select Size</option>
                                                 	@foreach($productDetails['attributes'] as $attribute)
                                                  
                                                  <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                            </div>
                                            @else 
                                             
                                            <input type="hidden"  name="size" product-id="{{ $productDetails['id'] }}" class="form-select" aria-label="Default select example" value="1000"  >

                                            @endif 

                                            <div class="product-quantity">
                                                <ul class="flex ai-c">
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="1" name="quantity" class="cart-plus-minus-box" >
                                                            <div class="dec qtybutton">-</div>
                                                            <div class="inc qtybutton">+</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                       <button type="submit" class="theme-btn-1 btn btn-effect-1"> <i class="fas fa-shopping-cart"></i>
                                                       <span>ADD TO CART</span>	</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            </form>
                                            <hr>
                                            <div class="product-social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="product-safe-checkout">
                                                <h5>Guaranteed Safe Checkout</h5>
                                                <img src="/front/images/icons/payment-2.png" alt="Payment Image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <h3>Product description</h3>
                                        <p>
                                            {{ $productDetails['description'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
@endsection
