<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')

 <div class="products mt-5 mb-5">
                        <div class="container-fluid">
                            <h4>{{ $getVendorShop }} Shop</h4>
                            <div class="row mt-4">
                               @foreach($vendorProducts as $product )
                               <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                <div class="col-md-3 product">
                                    <div class="product--wrapper">
                                    	<?php $brand_image_path = 'front/images/brand_images/'.$product['brand']['brand_image']; ?>
                                        <div class="product--brand">
                                            <img src="{{ asset($brand_image_path) }}" alt="img">
                                        </div>
                                         <a href="{{ url('product/'.$product['id'])}}">
                                        <div class="product--image">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img src="{{ asset($product_image_path) }}" alt="product image">
                                            @else
                                            <img src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="product image">
                                            @endif
                                        </div>
                                    </a>
                                        <div class="product--info">
                                             <h4> {{ Str::limit($product['product_name'], 25) }}</h4>
                                            <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                            @if($getDiscountPrice>0)
                                            <p><strong>R{{ $getDiscountPrice }}</strong></p>
                                            @else
                                            <p><strong>R{{ $product['product_price'] }}</strong></p>
                                            @endif
                                            <div class="cart text-center mt-2">
                                                <a href="{{ url('product/'.$product['id'])}}" class="button">Buy This</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>

                            <div>{{ $vendorProducts->links() }}</div>
                        </div>
 </div>                  

@endsection