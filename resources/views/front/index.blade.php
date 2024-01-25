
@extends('front.layout.layout')
@section('content')

 <!-- Masthead-->
       
           <header class="masthead" id="home" style="background-image: url('front/assets/img/header-bg.jpg');">
            <div class="container">
                <div class="masthead-heading">Building communities through food.</div>
                <div class="masthead-heading">Enjoy home-cooked meals from cooks near you.</div>
                <div class="masthead-subheading">We'll help you experience great food in your neighbourhood.</div>
                
                <button type="button" class="btn btn-primary btn-xl text-uppercase" data-bs-toggle="modal"  data-bs-target="#exampleModal">
                   Discover Meals
                </button>
            </div>
        </header>

     {{-- Start Add Model --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Available meals around you</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center " >
       No available meal around you at the moment<br>
       Please fill in your email to get notified when there is an available meal around you.
       <br>
       <br>
       

     <form class="d-flex" action="" method="POST">@csrf
         <input class="form-control me-2" name="subscriber_email"  type="email" placeholder="Enter Email" aria-label="Email">
         <button class="btn btn btn-primary"  type="submit">Submit</button>

     </form>
      
   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

      {{-- End Add Model --}}  
        
        <!-- Services-->
        <section class="page-section"  >
            <div class="container">
                <div class="text-center">
                    <h3 class="section-heading text-uppercase">How it works</h3>
                    <h3 class="section-subheading text-muted"></h3>
                </div>

                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Discover</h4>
                        <p class="text-muted">
                            Choose your favorite meal from our growing community of cooks.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Order</h4>
                        <p class="text-muted">
                            Place an order with just few taps of a button.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-face-smile fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Enjoy</h4>
                        <p class="text-muted">
                            Take your meal home or get it delivered and share with family. Or dine with the cook if they provide the option.
                        </p>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h3 class="section-heading">Ready to get started?</h3>
                    <button type="button" class="btn btn-primary btn-xl text-uppercase" data-bs-toggle="modal"  data-bs-target="#exampleModal">
                   Discover Meals
                </button>
                </div>
            </div>
        </section>

        <section class="page-section masthead" id="cook" style="background-image: url('front/assets/img/header-bg-1.jpg');">
            <div class="container">
                <div class="masthead-heading text-uppercase">Become a cook.</div>
                <div class="masthead-subheading">Earn income as a cook.</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="{{ url('vendor/register') }}">Get started</a>
            </div>
        </section>

        <section class="page-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <div class="portfolio-caption">
                                <h2 class="portfolio-caption-heading">Why cook on skaftin</h2>
                                <p class="portfolio-caption-subheading text-muted">
                                    No matter what meal, Skaftin makes it easier and secure to earn additional income and connect with people looking for home-cooked meals such as yours in your community and create memories.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <div class="portfolio-caption">
                                <h2 class="portfolio-caption-heading">Flexibility</h2>
                                <p class="portfolio-caption-subheading text-muted">
                                    With Skaftin you're in control of your availability, prices and how you interact with the guests.
                                    You can set times for collection, delivery or sit-in and handle the process as you like.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <div class="portfolio-caption">
                                <h2 class="portfolio-caption-heading">Support</h2>
                                <p class="portfolio-caption-subheading text-muted">
                                    We're with you all the way. Skaftin provides dispute resolution between you and your guests, 24/7 online support and tips on meal ideas.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section">
            <div class="container">

                <div class="text-center mt-5">
                    <h3 class="section-heading">How to become skaftin cook.</h3>
                    <h3 class="section-subheading text-muted"></h3>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <div class="portfolio-caption">
                                <h2 class="portfolio-caption-heading">1. Create your menu.</h2>
                                
                                <p class="portfolio-caption-subheading text-muted">
                                    Sign up to create an account, create a unique menu, add photos and details and name your price.
                                    Decide how many guests you can accommodate, or simply choose to deliver or allow collection at your schedule. It's all free and easy.
                                </p>
                                <p class="portfolio-caption-subheading text-muted">
                                    
                                </p>

                                <div class="image-box mt-3">
                                    <img src="{{ asset('front/assets/img/about/1.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <div class="portfolio-caption">
                                <div class="image-box mb-3">
                                    <img src="{{ asset('front/assets/img/about/2.jpeg') }}" alt="">
                                </div>

                                <h2 class="portfolio-caption-heading">2. Experience the magic.</h2>
                                
                                <p class="portfolio-caption-subheading text-muted">
                                    Throw an open table and share your passion for food with people near you.
                                    
                                </p>
                                <p class="portfolio-caption-subheading text-muted">
                                    This is an opportunity to connect and create memories with people in your community, building strong communities one meal at a time. Or you can simply deliver or allow guests to collect the meals.

                                   
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <div class="portfolio-caption">
                                <h2 class="portfolio-caption-heading">3. Get Paid</h2>
                                
                                <p class="portfolio-caption-subheading text-muted">
                                    Earn additional income by getting paid doing what you love.
                                </p>
                                <p class="portfolio-caption-subheading text-muted">
                                    
                                </p>

                                <div class="image-box mt-3">
                                    <img src="{{ asset('front/assets/img/about/3.jpeg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <li><a href="{{ url('/our-story')}}">Our Story</a></li>
                            <li><a href="{{ url('/faq')}}">FAQ</a></li>
                            <li><a href="mailto:hello@skaftin.com">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="{{ url('/food-safety')}}">Food Safety</a></li>
                            <li><a href="{{ url('/privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{ url('/terms')}}">Terms and Conditions</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>

@endsection                    