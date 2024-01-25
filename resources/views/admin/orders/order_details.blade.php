<?php use App\Models\Product; ?>
@extends('admin.layout.layout')
@section('content')
 
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              @if(Session::has('success_message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success:</strong> {{ Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert"   aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                   </button>
                  </div>
                 @endif
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Order #00{{ $orderDetails['id'] }} Details</h3>
                  <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/orders')}}">Back to Orders</a></h6>
                  
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    
                   
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
      
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
               <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order Details</h4>
                   
                    <div class="form-group">
                      <label >Order Date:</label>
                      <label >{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])); }}</label>
                    </div>
                    <div class="form-group">
                      <label >Order Status:</label>
                      <label >{{ $orderDetails['order_status'] }}</label>
                    </div>
                    <div class="form-group">
                      <label >Order Number</label>
                      <label >#00{{ $orderDetails['id'] }}</label>
                    </div>
                    <!--<div class="form-group">-->
                    <!--  <label >Delivery Amount:</label>-->
                    <!--  <label >R20.00</label>-->
                    <!--</div>-->
                    <div class="form-group">
                      <label >You will recieve:</label>
                      <label >R{{ $orderDetails['dish_price'] }}</label>
                      
                    </div>
                    <div class="form-group">
                      <label >Payment Method: Cash on Delivery</label>
                      <label ></label>
                    </div>
                    <!-- <div class="form-group">
                      <label >Order Date:</label>
                      <label >{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])); }}</label>
                    </div> -->
                   
                </div>
              </div>
            </div>
              <div class="col-md-6 grid-margin stretch-card">
               <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customer Details</h4>
                  <div class="form-group">
                      <label >Customer Name:</label>
                      <label >{{ $orderDetails['username'] }}</label>
                    </div>
                    <div class="form-group">
                      <label >Customer Address:</label>
                      <label >{{ $orderDetails['address'] }}</label>
                    </div>
                </div>
              </div>
            </div>

            <!-- <div class="col-md-6 grid-margin stretch-card">-->
            <!--   <div class="card">-->
            <!--    <div class="card-body">-->
            <!--      <h4 class="card-title">Delivery Address</h4>-->

                    
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
          
            <div class="col-md-6 grid-margin stretch-card">
               <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Order Status</h4>

                  <form action="{{ url('admin/update-order-status') }}" method="post">@csrf
                    <input type="hidden" name="order_id" value="{{ $orderDetails['id'] }}">
                    <select name="order_status" required="">
                      <option value="">Select</option>
                      @foreach($orderStatuses as $status)
                      <option value="{{ $status['name'] }}" @if(!empty($orderDetails['order_status']) && $orderDetails['order_status']==$status['name']) selected="" @endif>{{ $status['name'] }}</option>
                      @endforeach
                    </select>
                    <button type="submit">Update</button>
                  </form>
                </div>
              </div>
            </div>
         

           
          </div>
        </div>
        
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       @include('admin.layout.footer')
        <!-- partial -->
  </div>
@endsection