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
                        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#cook">Become a cook</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('vendor/login')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('vendor/register')}}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>