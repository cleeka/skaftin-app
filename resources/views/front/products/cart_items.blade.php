<?php use App\Models\Product; ?>

                              
           <div class="row cart">
                   <div class="col-md-9">
                         <div class="single mt-4">
                                  <h4 class="title">Cart</h4>
                                  <hr>
                                       @php $total_price = 0 @endphp
                                        @foreach($getCartItems as $item)
                                        <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']); 
                                        ?>
                                        <div class="cart__item flex jc-sb ai-c">
                                            <div class="cart_info flex jc-sb ai-c">
                                                <div class="product--img">
                                                    <a href="{{ url('product/'.$item['product_id']) }}">
                                                    <img src="{{ asset('front/images/product_images/small/'.$item['product']['product_image']) }}" alt="product image"></a>
                                                </div>
                                                <div class="product--info">
                                                    <h4>{{ $item['product']['product_name'] }}<br><span>{{ $item['size'] }}</span>
                                                    <strong>
                                                        @if($getDiscountAttributePrice['discount']>0)
                                                 <div class="product-price">
                                                
                                                <del>R{{ $getDiscountAttributePrice['product_price'] }}</del>
                                                <span> R{{ $getDiscountAttributePrice['final_price'] }}</span>
                                               </div>
                                                @else
                                                <div class="product-price">
                                                <span>R{{ $getDiscountAttributePrice['final_price'] }}</span>
                                                </div>
                                                @endif
                                               </strong>
                                                </div>
                                            </div>
                                            <div class="cart__meta">
                                                
                                              <div class="cart-plus-minus">
                                                <input type="text"  value="{{ $item['quantity'] }}"  class="cart-plus-minus-box">
                                                <div class="dec qtybutton updateCartItem" data-cartid="{{ $item['id']}}"  data-qty="{{ $item['quantity'] }}">-</div>
                                                <div class="inc qtybutton updateCartItem" data-cartid="{{ $item['id']}}"  data-qty="{{ $item['quantity'] }}">+</div>
                                               </div>


                                                <div class="cart__remove">
                                                    <a  class=" flex ai-c jc-sa me-lg-1 deleteCartitem" data-cartid="{{ $item['id'] }}" >
                                                        <span class="material-icons">delete_outline </span>
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                  @endforeach                                 
                          </div>
                    </div>

                           <div class="col-md-3">
                                    <div class="single mt-4">
                                        <div class="cart__summary">
                                            <h4>Cart Summary</h4>
                                            <hr>
                                            
                                            <div class="flex jc-sb">
                                                <span>
                                                    <p><strong>Sub total:</strong></p>
                                                </span>
                                                <span>
                                                    <p>R {{ $total_price }}</p>
                                                </span>
                                            </div>
                                            <div class="flex jc-sb">
                                                <span>
                                                    <p><strong>Coupon Discount:</strong></p>
                                                </span>
                                                <span>
                                                    <p>R 0</p>
                                                </span>
                                            </div>
                                            <div class="flex jc-sb">
                                                <span>
                                                    <p><strong>Grand total:</strong></p>
                                                </span>
                                                <span>
                                                    <p>R {{ $total_price }}</p>
                                                </span>
                                            </div>
                                            <small><i>Delivery fee not included yet.</i></small>
                                            <div class="mt-4 mb-3 text-center">
                                                <a href="{{ url('/checkout') }}" class="button">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>

               </div>                                
                                
 
                                