@extends('admin.layout.layout')
@section('content')
 
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Dish Size </h3>
                  
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
                  <h4 class="card-title">Add Dish Size</h4>
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
                 
                  <form class="forms-sample" action="{{ url('admin/add-edit-attributes/'.$dish['id'])}}"  method="post">@csrf
                    
                    <div class="form-group">
                      <label for="dish_name">Dish Name</label>
                      &nbsp; {{ $dish['dish_name']}}
                    </div>
                    
                    <div class="form-group">
                      <label for="dish_price">Dish Price</label>
                      &nbsp; R{{ $dish['dish_price']}}
                    </div>
                    <div class="form-group">
                      <div class="field_wrapper">
                          <div>
                              <input type="text" name="size[]" placeholder="Size" style="width: 120px"/>
                              <input type="text" name="sku[]" placeholder="SKU" style="width: 120px"/>
                              <input type="text" name="price[]" placeholder="Price" style="width: 120px"/>
                             
                              <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                          </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                  <br><br>

                  <form method="post" action="{{ url('admin/edit-attributes/'.$dish['id']) }}">@csrf
                  <table  id="table_id" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Size
                          </th>
                          <th>
                           SKU
                          </th>
                          <th>
                            Price
                          </th>
                         
                           <th>
                            Actions
                          </th>
                                           
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dish['attributes'] as $attribute)
                        <input style="display:none;" type="text" name="attributeId[]" value="{{ $attribute['id'] }}">        
                        <tr>
                          <td>
                            {{ $attribute['id']}}
                          </td>
                          <td>
                            {{ $attribute['size'] }}
                          </td>
                          <td>
                             {{ $attribute['sku'] }}
                          </td>
                          <td>
                             <input type="number" name="price[]" value="{{ $attribute['price'] }}" required="" style="width: 70px;">
                            
                          </td>
                          
                         
                          <td>
                          @if($attribute['status']==1)
                            <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active" ></i></a> 
                            @else
                            <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)">
                            <i style="font-size:25px;" class="mdi mdi-bookmark-outline"  status="Inactive" ></i></a>
                          @endif

                          <a title="attribute" class="confirmDelete" href="{{ url('admin/delete-attribute/'.$attribute['id'])}}"><i style="font-size:25px;" class="mdi mdi-file-excel-box"></i></a> 
                           
                          </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Update Attributes</button>
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