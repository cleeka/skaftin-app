@extends('admin.layout.layout')
@section('content')
 
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                   
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }}</h4>
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
                 
                  <form class="forms-sample" @if(empty($dish['id'])) action="{{ url('admin/add-edit-dish')}}"
                   @else action="{{ url('admin/add-edit-dish/'.$dish['id'])}}" @endif method="post" enctype="multipart/form-data">@csrf
              
                    <div class="form-group">
                      <label for="dish_name">Dish Name</label>
                      <input type="text" class="form-control" id="section_name" placeholder="Enter dish name" name="dish_name" @if(!empty($dish['dish_name'])) value="{{ $dish['dish_name']}}" @else value="{{ old('dish_name')}}" @endif>
                    </div>

                   
                    <p>Select Days</p>

                    <div class="row">
                     <div class="col-md-6">
                       @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)  
                        <div class="form-group">
                          <div class="form-check">                
                            <label class="form-check-label" for="{{ strtolower($day) }}">
                              <input type="checkbox" class="form-check-input" name="days[]"
                               id="{{ strtolower($day) }}" value="{{ $day }}"   @if(!empty($dish['days'])) {{ in_array($day, $dataArray) ? 'checked' : '' }} @else  @endif>
                                {{ $day }}
                            </label>     
                         </div>
                      </div>
                      @endforeach
                     </div>
                    </div>

                    <div class="form-group">
                      <label for="dish_price">Dish Price<br><small>Example: 50.99</small> </label>
                      <input type="text" class="form-control" id="dish_price" placeholder="Enter dish price" name="dish_price" @if(!empty($dish['dish_price'])) value="{{ $dish['dish_price']}}" @else value="{{ old('dish_price')}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="dish_time">Time to Pickup<br> (Time when delivery guy should come to collect orders for delivery)</label>
                      <input type="time" class="form-control" id="dish_time"  name="dish_time"
                       @if(!empty($dish['dish_time'])) value="{{ $dish['dish_time']}}" @else value="{{ old('dish_time')}}" @endif  >
                      
                    </div>
                    <div class="form-group">
                      <label for="cut_off">Cut-off Time<br> (Time to stop receiving orders for this particular meal)
                      </label>
                      <input type="time" class="form-control" id="cut_off"  name="cut_off"
                       @if(!empty($dish['cut_off'])) value="{{ $dish['cut_off']}}" @else value="{{ old('cut_off')}}" @endif  >
                      
                    </div>
                    <div class="form-group">
                      <label for="cancel_time">Canceling Time<br> (Time customers can cancel order before cooks start cooking)
                       </label>
                      <input type="time" class="form-control" id="cancel_time"  name="cancel_time"
                       @if(!empty($dish['cancel_time'])) value="{{ $dish['cancel_time']}}" @else value="{{ old('cancel_time')}}" @endif  >
                      
                    </div>
                    <div class="form-group">
                      <label for="dish_image">Dish image (Recommended size 1000x1000)</label>
                      <input type="file" class="form-control" id="dish_image" name="dish_image" >        
                    </div>
                    <div class="form-group">
                      <label for="dish_video">Dish video (Recommended size: 2 MB)</label>
                      <input type="file" class="form-control" id="dish_video" name="dish_video" >          
                    </div>
                    <div class="form-group">
                      <label for="description">Dish Description</label>
                      <textarea name="description" id="description" class="form-control" rows="3">{{ $dish['description'] }}</textarea>
                    </div>
                   
                     <div class="form-group">
                      <label for="is_featured">Featured item</label>
                      <input type="checkbox" name="is_featured" id="is_featured" value="Yes"
                       @if(!empty($dish['is_featured']) && $dish['is_featured']=="Yes") checked="" @endif>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
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