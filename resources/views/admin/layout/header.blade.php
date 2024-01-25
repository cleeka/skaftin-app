 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ url('/admin/dashboard')}}"><img src="{{ url('admin/images/skaftin-logo.png') }}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/admin/dashboard')}}"><img src="{{ url('admin/images/skaftin-logo.png') }}" class="mr-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <!--<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">-->
        <!--  <span class="icon-menu"></span>-->
        <!--</button>-->
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            
             
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="{{ url('admin/update-admin-details')}}" data-toggle="dropdown" id="profileDropdown">
              
              @if(!empty(Auth::guard('admin')->user()->image))
                <img src="{{  url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}" alt="profile">
                @else
                <img src="{{ url('admin/images/photos/no-image.png') }}" alt="profile">
              @endif 
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="{{ url('admin/update-admin-password')}}"  class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a href="{{ url('admin/logout')}}" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>