@extends('admin.layout.layout')
@section('content')
 
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Vendor Details</h3>
                  
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
                  <h4 class="card-title">Personal Information</h4>
                   
                    <div class="form-group">
                      <label >Email</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['email']}}" readonly="">
                    </div>
                  
                    <div class="form-group">
                      <label for="vendor_name">Name</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['name']}}" readonly="">
               
                    </div>
                     
                    <div class="form-group">
                      <label for="vendor_address">Address</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['address']}}" readonly="">                      
                    </div>

                    <div class="form-group">
                      <label for="vendor_city">City</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['city']}}" readonly="">                 
                    </div>
                    <div class="form-group">
                      <label for="vendor_state">Province</label>
                     <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['province']}}" readonly="">                  
                    </div>
                    
                    <div class="form-group">
                      <label for="vendor_pincode">Postal Code</label>
                      <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['postal']}}" readonly="">                      
                    </div>
                    <div class="form-group">
                      <label for="vendor_phone">Phone</label>
                     <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile']}}" readonly="">                      
                    </div>
                    @if(!empty($vendorDetails['image']))
                    <div class="form-group">
                      <label for="vendor_image">Vendor image</label>
                      <br>
                      <img style="width: 200px;" src="{{ url('admin/images/photos/'.$vendorDetails['image']) }}" >                 
                    </div>
                    @endif
                    <div class="form-group">
                      <label for="vendor_proof">Proof of Identity</label>
                     <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['identity_proof']}}" readonly="">                      
                    </div>
                </div>
              </div>
            </div>
             
             <div class="col-md-6 grid-margin stretch-card">
               <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bank Information</h4>
                   
                    <div class="form-group">
                      <label >Account Holder Name</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['vendor_bank']['account_holder_name'])) value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" @endif readonly="">
                    </div>
                  
                    <div class="form-group">
                      <label for="vendor_name">Bank Name</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['vendor_bank']['bank_name'])) value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" @endif  readonly="">
               
                    </div>
                     
                    <div class="form-group">
                      <label for="vendor_address">Account Number</label>
                      <input type="text" class="form-control"  @if(isset($vendorDetails['vendor_bank']['account_number'])) value="{{ $vendorDetails['vendor_bank']['account_number'] }}" @endif readonly="">                      
                    </div>

                    <div class="form-group">
                      <label for="vendor_city">Branch Code</label>
                      <input type="text" class="form-control" @if(isset($vendorDetails['vendor_bank']['bank_ifsc_code'])) value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}" @endif readonly="">                 
                    </div>
                    
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