@extends('admin.layout.layout')
@section('content')
 
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
        
     
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Menu Dishes</h4>
                  <a style="max-width: 150px;" href="{{ url('admin/add-edit-dish')}}" class="btn btn-block btn-primary">Add Dish</a>
               @if(Session::has('success_message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success:</strong> {{ Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert"   aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                   </button>
                  </div>
                 @endif
                 
                  <div class="table-responsive pt-3">
                    <table  id="table_id" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                           Dish name
                          </th>
                          
                          <th>
                            Dish image
                          </th>
                          
                          <th>
                            Added by
                          </th>                    
                          <th>
                            Status
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dishes as $dish)
                        
                        <tr>
                          <td>
                            {{ $dish['id']}}
                          </td>
                          <td>
                            {{ $dish['dish_name'] }}
                          </td>
                          
                          <td>
                            @if(!empty($dish['dish_image']))
                             <img style="width: 100px; height:100px;" src="{{ asset('front/images/dish_images/small/'.$dish['dish_image']) }}">
                             @else
                              <img style="width:100px; height:100px;" src="{{ asset('front/images/dish_images/small/no-image.png') }}">
                            @endif

                          </td>
                          
                          <td>
                             @if($dish['admin_type']=="vendor")
                               <a target="_blank" href="{{ url('admin/view-vendor-details/'.$dish['admin_id']) }}">
                                {{ ucfirst($dish['admin_type']) }}</a>
                             @else
                                {{ ucfirst($dish['admin_type']) }}
                             @endif
                          </td>
                          <td>
                           @if($dish['status']==1)
                            <a class="updateDishStatus" id="dish-{{ $dish['id'] }}" dish_id="{{ $dish['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active" ></i></a> 
                            @else
                            <a class="updateDishStatus" id="dish-{{ $dish['id'] }}" dish_id="{{ $dish['id'] }}" href="javascript:void(0)">
                            <i style="font-size:25px;" class="mdi mdi-bookmark-outline"  status="Inactive" ></i></a>
                           @endif
                          </td>
                           <td>  
                           <a href="{{ url('admin/add-edit-dish/'.$dish['id'])}}"><i style="font-size:25px;" class="mdi mdi-pencil-box"></i></a>
                           <!--<a href="{{ url('admin/add-edit-attributes/'.$dish['id'])}}"><i style="font-size:25px;" class="mdi mdi-plus-box"></i></a>-->
                           <a title="Add Multiple images" href="{{ url('admin/add-images/'.$dish['id'])}}"><i style="font-size:25px;" class="mdi mdi-library-plus"></i></a>

                           <a title="Dish" class="confirmDelete" href="{{ url('admin/delete-dish/'.$dish['id'])}}"><i style="font-size:25px;" class="mdi mdi-file-excel-box"></i></a> 
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