<!DOCTYPE html>
   <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="" />
        <title>Skaftin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ url('front/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ url('front/css/main.min.css') }}" rel="stylesheet" />
        <link href="{{ url('front/css/custom.css') }}" rel="stylesheet" />
 </head>
 <body>
     <div class="loader">
            <img src="{{ asset('front/images/loaders/loader.gif') }}" alt="loading..." />
         </div>

 

<section class="page-section bg-light">
            <div class="container">

                <div class="row auth align-items-center">
                    <div class="col-md-6 p-0">
                        <div class="auth-image">
                            <img src="{{ asset('front/assets/img/cook2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 px-5">
                        <div class="heading">
                            <h2 class="section-heading text-uppercase">Signup</h2>
                            <h3 class="section-subheading text-muted">Signup as a Chef or a Cook</h3>
                        </div>

                             @if(Session::has('error_message'))
                                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                       <strong>Error:</strong> {{ Session::get('error_message')}}
                                        <button type="button" class="close" data-dismiss="alert"   aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                        </button>
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
                                     
                                     <form class="d-flex" action="{{ url('vendor/register') }}" method="post" >@csrf
                                  <div class="row align-items-stretch w-100">
                                     <div class="col-md-6">
                                       <div class="form-group">
                                        <!-- name input-->
                                        <input class="form-control" id="user-name" name="name" type="text" placeholder="Your Username *"  />
                                        
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Email input-->
                                        <input class="form-control" id="user-email" name="email" type="email" placeholder="Your Email *"  />
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- phone input-->
                                        <input class="form-control" id="user-mobile" name="mobile" type="text" placeholder="Your Phone Number *"  />
                                       
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- password input-->
                                        <input class="form-control" id="user-password" name="password"  type="password" placeholder="Your Password *" />
                                      
                                    </div>
                                </div>

                                <label class="form-check-label text-muted">
                                             <input type="checkbox" name="accept" class="form-check-input">
                                                I have read and accepted the terms & conditions
                                           </label> 

                                           <br>
                                           <br>

                                <!-- Submit Button-->
                                <div class="col-md-12">
                                <div class="button">
                                  <button class="btn btn-primary btn-xl text-uppercase " type="submit">Register</button>
                                </div>
                                <br>
                                <br>
                                <p class="section-subheading text-muted mb-4">
                                 Login if you already have an account
                               <a href="{{ url('vendor/login') }}">Login</a>
                                </p>
                                </div>

                            </div>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
        </section>


<!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ url('front/js/scripts.js') }}"></script>
        <script src="{{ url('front/js/custom.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    </body>
</html>