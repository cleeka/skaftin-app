@extends('admin.layout.layout')
@section('content')
 
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Update Cook's Details</h3>
                  
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
        @if($slug=="personal")
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Personal Information</h4>
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
                 
                  <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label >Cook's Username/Email</label>
                      <input  class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                    </div>
                  
                    <div class="form-group">
                      <label for="vendor_name">Name</label>
                      <input type="text" class="form-control" id="vendor_name" placeholder="Vendor name" name="vendor_name" value="{{ Auth::guard('admin')->user()->name }}" required="">
               
                    </div>
                     
                    <!--<div class="form-group">-->
                    <!--  <label for="vendor_address">Address</label>-->
                    <!--  <input type="text" class="form-control" id="vendor_address" placeholder="Address" name="vendor_address" value="{{ $vendorDetails['address'] }}" required="">                      -->
                    <!--</div>-->
                    
                    <div class="form-group">
                      <label for="autocomplete">Address</label>
                      <input type="text" class="form-control" id="autocomplete" placeholder="Enter a location" name="vendor_address" value="{{ $vendorDetails['address'] }}" required="">
                    </div>

                    <div class="form-group">
                      <label for="vendor_city">City</label>
                      <input type="text" class="form-control" id="vendor_city" placeholder="City" name="vendor_city" value="{{ $vendorDetails['city'] }}" required="">                      
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">Province</label>
                      <input type="text" class="form-control" id="vendor_province" placeholder="Province" name="vendor_province" value="{{ $vendorDetails['province'] }}" required="">                      
                    </div>
                    
                    <div class="form-group">
                      <label for="vendor_pincode">Postal Code</label>
                      <input type="text" class="form-control" id="vendor_postal" placeholder="Postal Code" name="vendor_postal" value="{{ $vendorDetails['postal'] }}" required="">                      
                    </div>
                    <div class="form-group">
                      <label for="vendor_phone">Phone</label>
                      <input type="text" class="form-control" id="vendor_phone" placeholder="Phone" name="vendor_phone" value="{{ $vendorDetails['mobile'] }}" required="">                      
                    </div>

                    <div class="form-group">
                      <label for="vendor_image">Cook's Profile Image</label>
                      <input type="file" class="form-control" id="vendor_image" name="vendor_image" > 
                      @if(!empty(Auth::guard('admin')->user()->image))
                      <input type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}"> 

                      @endif                   
                    </div>
                    
                    <div class="form-group">
                      <label for="identity_proof">Proof of Identity</label>
                      <select class="form-control" name="identity_proof" id="identity_proof">
                        <option value="National ID" @if(isset($vendorDetails['identity_proof']) && $vendorDetails['identity_proof']=="National ID") selected @endif>National ID</option>
                        <option value="Passport" @if(isset($vendorDetails['identity_proof']) && $vendorDetails['identity_proof']=="Passport") selected @endif>Passport</option>
                        <option value="Driving License" @if(isset($vendorDetails['identity_proof']) && $vendorDetails['identity_proof']=="Driving License") selected @endif>Driving License</option>
                       
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="identity_image">Upload Proof of Identity</label>
                      <input type="file" class="form-control" id="identity_image" name="identity_image" > 
                      @if(!empty($vendorDetails['identity_image']))
                      <input type="hidden" name="current_identity_image" @if(isset($vendorDetails['identity_image'])) value="{{ $vendorDetails['identity_image'] }}" @endif> 

                      @endif                   
                    </div>
                    
                    
                 
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                   
                </div>
              </div>
            </div>
         
        @elseif($slug=="bank")
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Bank Information</h4>
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
                 
                  <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label >Cook's Username/Email</label>
                      <input  class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
                    </div>
                  
                    <div class="form-group">
                      <label for="account_holder_name">Account Holder Name</label>
                      <input type="text" class="form-control" id="account_holder_name" placeholder="Account Holder Name" name="account_holder_name" @if(isset($vendorDetails['account_holder_name'])) value="{{ $vendorDetails['account_holder_name'] }}" @endif required="">
               
                    </div>
                     
                    <div class="form-group">
                      <label for="bank_name">Bank Name</label>
                      <input type="text" class="form-control" id="bank_name"  placeholder="Bank Name" name="bank_name" @if(isset($vendorDetails['bank_name'])) value="{{ $vendorDetails['bank_name'] }}" @endif required="">                      
                    </div>

                    <div class="form-group">
                      <label for="account_number">Account Number</label>
                      <input type="text" class="form-control" id="account_number" placeholder="Account Number" name="account_number" @if(isset($vendorDetails['account_number'])) value="{{ $vendorDetails['account_number'] }}" @endif required="">                      
                    </div>
                    <div class="form-group">
                      <label for="bank_ifsc_code">Branch Code</label>
                      <input type="text" class="form-control" id="branch_code" placeholder="Branch Code" name="branch_code" @if(isset($vendorDetails['branch_code'])) value="{{ $vendorDetails['branch_code'] }}" @endif required="">                      
                    </div>
                    <div class="form-group" >
                     <label for="account_type">Account Type</label>
                    <input type="text" class="form-control" id="account_type" placeholder="Account Type" name="account_type" @if(isset($vendorDetails['account_type'])) value="{{ $vendorDetails['account_type'] }}" @endif required="">                      
                    </div>
                    
   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        @endif
          </div>
        </div>
        
       
        
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       @include('admin.layout.footer')
        <!-- partial -->
  </div>
@endsection