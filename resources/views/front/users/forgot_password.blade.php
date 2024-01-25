@extends('front.layout.layout')
@section('content')

 <div class="auth mt-5 mb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="wrapper text-center">
                                        <h4 class="mb-5">Forgot Password</h4>
                                        @if(Session::has('error_message'))
                                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                       <strong>Error:</strong> {{ Session::get('error_message')}}
                                        
                                       </div>
                                      @endif

                                      @if ($errors->any())
                                      <div class="alert alert-danger">
                                       <ul>
                                          @foreach ($errors->all() as $error)
                                           <p>{{ $error }}</p>
                                          @endforeach
                                       </ul>
                                       </div>
                                      @endif

                                       @if(Session::has('success_message'))
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                       <strong>Success:</strong> {{ Session::get('success_message')}}
                                         
                                       </div>
                                      @endif
                                        <p id="forgot-error"></p>
                                        <p id="forgot-success"></p>
                                        <form id="forgotForm" class="form" action="javascript:;" method="post">@csrf
                                            <div class="field mb-3">
                                                <input type="email" class="form-input form-control" name="email" id="users-email" placeholder="Email">
                                                 <p id="forgot-email"></p>
                                            </div>
                                            <!-- <div class="field mb-3">
                                                <input type="password" class="form-input form-control" id="users-password" name="password"  placeholder="Password">
                                                <p id="login-password"></p>
                                            </div> -->

                                            <button type="submit" class="btn primary dark block mt-4 custom">Submit</button>

                                            <!-- <button class="btn block mt-3 gray custom">Gmail</button> -->

                                            <!-- <p class="mt-5">Not registered yet? <a href="{{ url('user/register')}}">Register</a></p>
                                            <p class="mt-5">Lost your password? <a href="{{ url('user/forgot-password')}}">Get it</a></p> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection