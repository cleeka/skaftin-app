@extends('front.layout.layout')
@section('content')

<section class="page-section">
            <div class="container">

                <div class="text-center mt-5">
                    <h2 class="section-heading">Thank You!</h2>
                    <h3 class="section-subheading text-muted">We will notify you once there is a meal around you</h3>
                     <a class="btn btn-primary btn-xl text-uppercase" href="{{url('/')}}">Go Back</a>
                </div>

                <div class="row">
                    
                </div>
            </div>
        </section>
<!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Skaftin</h4>
                        <p>
                            Our goal is to build communities through food.<br />
                            Order delicious home-cooked meals in your neighbourhood.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Site maps</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

@endsection