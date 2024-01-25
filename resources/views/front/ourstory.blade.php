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
                    <h3 class="section-heading text-uppercase">Our Story</h3>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <div class="portfolio-caption">
                                
                                <p >
                                    Skaftin is an online marketplace for home-cooked meals, that enables home cooks to share their meals with other people in their communities who are looking for such meals and earn an additional income to support their families whilst helping build great communities through shared meals.</p>
                                    
<p>The idea for Skaftin came about when Valentine Kembo-Maruma, the co-founder & CEO of Skaftin lived alone and was often too busy and lazy to cook but would often want a proper home-cooked meal and he also couldn’t afford takeaway every night. He then thought of approaching his next-door neighbour – a French family who cooked dinner almost every night, and asked if they could include an extra plate for him when they cook dinner and he’d pay for it. The neighbours were more than happy to share their dinner with Valentine and did not even charge him for it, he joined them on their dinner table almost every evening for a year and a half until the neighbours had to relocate back to France, and he was back to the same problem again.</p>
<p>This is when he realised what if there was a platform that can connect him to other people in his neighbourhood who are already cooking dinner for their families anyway and he could buy a plate from them, or better yet even join them at their dinner tables in their homes and get to know people around him much better and experience their different cultures just the same way he experienced his French neighbours at the dinner table. He then went on to approach Emmanuel Mawuena, the co-founder & CTO of Skaftin to join him and build the platform together with him.</p>
<p>Today, Skaftin has evolved to become a growing community of cooks who share their meals with other people around them creating meaningful communities by fulfilling great relationships over shared meals, whilst earning additional income to support their families.
                                </p>
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