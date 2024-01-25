@extends('front.layout.layout')
@section('content')

          <div class="products mt-5 mb-5">
                        <div class="container">

                            <div class="row cart">
                                <div class="col-md-12">
                                    <div class="single mt-4">
                                        <h4 class="title">Order #{{ $orderDetails['id'] }} Details</h4>

                                        <span><a href="{{ url('user/orders') }}">Go Back to Orders</a></span>
                                        <br>
                                        <br>
                                        <table class="table table-striped">
                                            <tr><td colspan="2" class="table-danger"><strong>Order Details</strong></td></tr>
                                            <tr><td>Order Date</td><td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])); }}</td></tr>
                                            
                                            
                                            
                                        	
                                        </table>
                                        <table class="table table-striped">
                                            <tr class="table-danger">
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Product Size</th>
                                                <th>Product Colour</th>
                                                <th>Product Quantity</th>
                                            </tr>
                                            
                                        </table> 
                                        <table class="table table-striped">
                                            <tr><td colspan="2" class="table-danger"><strong>Delivery Address</strong></td></tr>
                                            
                                            
                                            
                                       </table>   
                                    </div>
                                </div>           
                            </div>
        
                        </div>
                    </div>

@endsection