@extends('front.layout.layout')
@section('content')

<div class="products mt-5 mb-5">
                        <div class="container">

                            <div class="row cart">
                                <div class="col-md-4">
                                    <div class="single mt-4">
                                        <h4 class="title">Update Contact Details</h4>
                                         <hr>
                                    
                                           <div class="wrapper text-center">
                                           	<p id="account-success"></p>
                                           <form id="accountForm" class="form" action="javascript:;" method="post" >@csrf

                                            <div class="field mb-3">
                                                <input type="email" class="form-input form-control"  value="{{ Auth::user()->email }}" hidden="" disabled="">
                                               
                                            </div> 
                                            <div class="field mb-3">
                                                <input type="text" class="form-input form-control" id="user-name" name="name" value="{{ Auth::user()->name }}" placeholder="Username">
                                                <p id="account-name"></p>
                                            </div>
                                            <div class="field mb-3">
                                                <input type="text" class="form-input form-control" id="user-address" name="address" value="{{ Auth::user()->address }}" placeholder="Address">
                                                <p id="account-address"></p>
                                            </div>
                                            <div class="field mb-3">
                                                <input type="text" class="form-input form-control" id="user-city" name="city" value="{{ Auth::user()->city }}" placeholder="City">
                                                <p id="account-city"></p>
                                            </div>
                                            <div class="field mb-3">
                                                <input type="text" class="form-input form-control" id="user-state" name="state" value="{{ Auth::user()->state }}" placeholder="State">
                                                <p id="account-state"></p>
                                            </div>
                                            <div class="field mb-3">
                                                <input type="text" class="form-input form-control" id="user-country" name="country" value="{{ Auth::user()->country }}" placeholder="Country">
                                                <p id="account-country"></p>
                                            </div>
                                            <div class="field mb-3">
                                                <input type="text" class="form-input form-control" id="user-pincode" name="pincode" value="{{ Auth::user()->pincode }}" placeholder="City">
                                                <p id="account-pincode"></p>
                                            </div>
                                            <div class="field mb-3">
                                                <input type="text" class="form-input form-control" id="user-mobile" name="mobile" value="{{ Auth::user()->mobile }}" placeholder="Mobile">
                                                <p id="account-mobile"></p>
                                            </div>
                                            
                                     
                                            <button type="submit" class="btn primary dark block mt-4 custom">Update Account</button>

                                            <!-- <button class="btn block mt-3 gray custom">Gmail</button> -->

                                            <!-- <p class="mt-5">Already registered? <a href="{{ url('user/login')}}">Login</a></p> -->
                                        </form>
                                    </div>
                             
                                       
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="single mt-4">
                                        
                                            <h4>Update password</h4>
                                            <hr>
                                            <div class="wrapper text-center">
                                            	<p id="password-success"></p>
                                            	<p id="password-error"></p>
                                               <form id="passwordForm" class="form" action="javascript:;" method="post" >@csrf

                                             <div class="field mb-3">
                                                <input type="password" class="form-input form-control" id="current-password" name="current_password" value="" placeholder="Current Password">
                                                <p id="password-current_password"></p>
                                            </div>
                                            <div class="field mb-3">
                                                <input type="password" class="form-input form-control" id="new-password" name="new_password" value="" placeholder="New Password">
                                                <p id="password-new_password"></p>
                                            </div>
                                            <div class="field mb-3">
                                                <input type="password" class="form-input form-control" id="confirm-password" name="confirm_password" value="" placeholder="Confirm Password">
                                                <p id="password-confirm_password"></p>
                                            </div>

                                            <button type="submit" class="btn primary dark block mt-4 custom">Update Password</button>
                                        </form>
                                            </div>
                                            
                                        
                                    </div>
                                </div>

                            </div>
        
                        </div>
                    </div>

    @endsection                