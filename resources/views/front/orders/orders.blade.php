@extends('front.layout.layout')
@section('content')

          <div class="products mt-5 mb-5">
                        <div class="container">

                            <div class="row cart">
                                <div class="col-md-12">
                                    <div class="single mt-4">
                                        <h4 class="title">My Orders</h4>

                                      
                                        <table class="table">
                                        	<tr class="table-danger">
                                        		<th>Order ID</th>
                                        		<th>Order Products</th>
                                        		<th>Payment Method</th>
                                        		<th>Grand Total</th>
                                        		<th>Create On</th>
                                        	</tr>
                                        	@foreach($orders as $order)
                                        	<tr>
                                        		<td><a href="{{ url('user/orders/'.$order['id']) }}">{{$order['id']}}</a></td>
                                        		<td>
                                        			@foreach($order['orders_products'] as $product)
                                                       {{ $product['product_code'] }}<br>
                                        			@endforeach
                                        		</td>
                                        		<td>{{$order['payment_method']}}</td>
                                        		<td>{{$order['grand_total']}}</td>
                                        		<td>{{ date('Y-m-d h:i:s', strtotime($order['created_at'])); }}</td>
                                        	</tr>
                                        	@endforeach
                                        </table>


                                       

                                       
                                    </div>
                                </div>

                             

                            </div>
        
                        </div>
                    </div>

@endsection