<!DOCTYPE html>
   <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTVFSXUU9KuOYFtNoUFof6qVJBU5t9MR8&libraries=places"></script>
 </head>
   
     <body id="page-top">

         

         <!-- Navigation-->
        <nav class="navbar navbar-expand-lg  fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset('front/assets/img/skaftin-logo.png') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/')}}">Home</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="{{ url('vendor/login')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('vendor/register')}}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>


    

        <section class="page-section bg-light">
            <div class="container">
                <br>
                <br>
                <div class="text-center">
                    <h3 class="section-heading text-uppercase">FAQ</h3>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <div class="portfolio-caption">
                                
                         <p><strong>Can I cancel my order? </strong> <br>Answer: an order can be cancelled as long you cancel before cut-off time that is set by the cook. To cancel your order, go to order history and select the order you want to cancel and select cancel my order.</p>
                         
                          <p><strong>Are meals delivered ready to eat?</strong> <br>Answer: yes the meals on Skaftin are delivered ready to eat. You can feel free to heat them up for dinner or refrigerate them to eat later. Better yet you could join the cook at their table, if they allow that option and share the meal together with others in your community.</p>
                          
                          <p><strong>What areas do you serve?</strong> <br>Answer: currently Skaftin is limited to specific suburbs in Johannesburg. To see if we are in your area yet please contact us. Thank you.</p>
                          
                           <p><strong>Are there any delivery fees?</strong> <br>Answer: delivery fee is charged at a flat rate of R20 per order from each cook. If you order your meals from multiple cooks, delivery fee will be charged per each cook.</p>
                           
                           <p><strong>What happens if I am not at home in time for my delivery?</strong> <br>Answer: the delivery driver will contact you to let you know that they will be coming to deliver your meal in case you are not at home to receive your delivery. We would also encourage you to plan accordingly to avoid receiving your meals late after they’ve been processed for delivery and avoid any inconveniences.</p>
                           
                            <p><strong>Can I track my order?</strong> <br>Answer: on the day of delivery, you will receive a notification reminding you about your delivery. When the delivery driver has picked up your order you will also be notified that your meal is on its way to you.</p>



                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-4 col-sm-6 mb-4">-->
                        <!-- Portfolio item 2-->
                    <!--    <div class="portfolio-item">-->
                    <!--        <div class="portfolio-caption">-->
                    <!--            <h2 class="portfolio-caption-heading">Flexibility</h2>-->
                    <!--            <p class="portfolio-caption-subheading text-muted">-->
                    <!--                With Skaftin you're in control of your availability, prices and how you interact with the guests.-->
                    <!--                You can set times for collection, delivery or sit-in and handle the process as you like.-->

                    <!--            </p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-4 col-sm-6 mb-4">-->
                        <!-- Portfolio item 3-->
                    <!--    <div class="portfolio-item">-->
                    <!--        <div class="portfolio-caption">-->
                    <!--            <h2 class="portfolio-caption-heading">Support</h2>-->
                    <!--            <p class="portfolio-caption-subheading text-muted">-->
                    <!--                We're with you all the way. Skaftin provides dispute resolution between you and your guests, 24/7 online support and tips on meal ideas.-->
                    <!--            </p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
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
        
    

        <!-- Footer-->
        <footer class="footer py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Skaftin  <span id="year"></span></div>
                    
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        
                    </div>
                </div>
            </div>
        </footer>
                
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ url('front/js/scripts.js') }}"></script>
        <script src="{{ url('front/js/custom.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
         <script>
    // Get the current year
    var currentYear = new Date().getFullYear();

    // Update the content of the 'year' div
    document.getElementById('year').innerHTML = currentYear;
  </script>

        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script>
    // Initialize the Google Places Autocomplete service
    function initAutocomplete() {
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input);
    }

    // Load the Google Places API on page load
    google.maps.event.addDomListener(window, 'load', initAutocomplete);
  </script>
    </body>
</html>