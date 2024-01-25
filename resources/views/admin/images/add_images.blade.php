@extends('admin.layout.layout')
@section('content')
 
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Images</h3>
                  
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
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Images</h4>
                   @if(Session::has('error_message'))
                 <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Error:</strong> {{ Session::get('error_message')}}
                    <button type="button" class="close" data-dismiss="alert"   aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                   </button>
                  </div>
                 @endif

                 @if(Session::has('success_message'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success:</strong> {{ Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert"   aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                   </button>
                  </div>
                 @endif
                 
                  <form class="forms-sample" action="{{ url('admin/add-images/'.$dish['id'])}}"  method="post" enctype="multipart/form-data">@csrf
                    
                    <div class="form-group">
                      <label for="dish_name">dish Name</label>
                      &nbsp; {{ $dish['dish_name']}}
                    </div>
                    
                    
                    <div class="form-group">
                      <div class="field_wrapper">
                          <input type="file" name="images[]" multiple="" id="images">
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                  <br><br>
                  <table  id="table_id" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Image
                          </th>
                           <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dish['images'] as $image)
                               
                        <tr>
                          <td>
                            {{ $image['id']}}
                          </td>
                          <td>
                            <img src="{{ url('front/images/dish_images/small/'.$image['image']) }}">
                          </td>                                 
                          <td>
                          @if($image['status']==1)
                            <a class="updateImageStatus" id="image-{{ $image['id'] }}" attribute_id="{{ $image['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active" ></i></a> 
                            @else
                            <a class="updateImageStatus" id="image-{{ $image['id'] }}" attribute_id="{{ $image['id'] }}" href="javascript:void(0)">
                            <i style="font-size:25px;" class="mdi mdi-bookmark-outline"  status="Inactive" ></i></a>
                          @endif

                          <a title="Image" class="confirmDelete" href="{{ url('admin/delete-image/'.$image['id'])}}"><i style="font-size:25px;" class="mdi mdi-file-excel-box"></i></a> 
                           
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       @include('admin.layout.footer')
        <!-- partial -->
  </div>
@endsection