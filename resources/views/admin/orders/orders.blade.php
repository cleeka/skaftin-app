@extends('admin.layout.layout')
@section('content')
 
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
        
     
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Orders</h4>   
                  <div class="table-responsive pt-3">
                    <table  id="table_id" class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Ordered Dish</th>
                             <th>Cook's Name</th>
                            
                           <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)
                       
                        <tr>
                              <td><a href="{{ url('user/orders/'.$order['id']) }}"></a>{{$order['id']}}</td>
                              <td>{{ date('Y-m-d h:i:s', strtotime($order['created_at'])); }}</td>
                              <td>{{ $order['order_status']}}</td>
                                <td>{{ $order['dish_name']}}</td>
                                
                                 <td> {{ $order['vendor_name']}}</td>
                                 
                                
                                 <td>
                                   <a title="View order Details" href="{{ url('admin/orders/'.$order['id']) }}"><i style="font-size:25px;" class="mdi mdi-eye"></i></a>
                                 </td>
                                 
                                 
                               </tr>
                               
                              @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
      </div>
@endsection