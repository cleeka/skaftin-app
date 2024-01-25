 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a @if(Session::get('page')=="dashboard") style="background:#1a4230 !important; color: #fff !important; " @endif class="nav-link" href="{{ url('admin/dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::guard('admin')->user()->type=="vendor")
         <li class="nav-item">
            <a  @if(Session::get('page')=="update_personal_details" ||  Session::get('page')=="update_bank_details"  ) style="background:#1a4230 !important; color: #fff !important; " @endif  class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Cook's Details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-vendors">
              <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#1a4230 !important; ">
                <li class="nav-item"> <a @if(Session::get('page')=="update_personal_details") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/update-vendor-details/personal')}}">Personal Details</a></li>
                 <li class="nav-item"> <a @if(Session::get('page')=="update_bank_details") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/update-vendor-details/bank')}}">Bank Details</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a @if(Session::get('page')=="sections" || Session::get('page')=="categories" || Session::get('page')=="menus" ) style="background:#1a4230 !important; color: #fff !important; " @endif class="nav-link" data-toggle="collapse" href="#ui-cata" aria-expanded="false" aria-controls="ui-cata">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Manage Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-cata">
              <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#1a4230 !important; ">
                
                <li class="nav-item"> <a @if(Session::get('page')=="menus") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/menus')}}">My Menu</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a @if(Session::get('page')=="orders"  ) style="background:#1a4230 !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Orders Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-orders">
              <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#1a4230 !important; ">
                <li class="nav-item"> <a @if(Session::get('page')=="orders") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/orders')}}">Orders</a></li>

                
              </ul>
            </div>
          </li>
          @else
          <li class="nav-item">
            <a @if(Session::get('page')=="update_admin_password" || Session::get('page')=="update_admin_details") style="background:#1a4230 !important; color: #fff !important; " @endif  class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-settings">
              <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#1a4230 !important; ">
                <li class="nav-item"> <a @if(Session::get('page')=="update_admin_password") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/update-admin-password')}}">Update Password</a></li>
                <li class="nav-item"> <a  @if(Session::get('page')=="update_admin_details") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/update-admin-details')}}">Update Details</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a @if(Session::get('page')=="view_admins" || Session::get('page')=="view_subadmins" || Session::get('page')=="view_vendors" || Session::get('page')=="view_all" ) style="background:#1a4230 !important; color: #fff !important; " @endif class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Admin Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-admins">
              <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#1a4230 !important; ">
                <li class="nav-item"> <a @if(Session::get('page')=="view_admins") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/admins/admin')}}">Admins</a></li>
                <li class="nav-item"> <a @if(Session::get('page')=="view_subadmins") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/admins/subadmin')}}">Subadmins</a></li>
                <li class="nav-item"> <a @if(Session::get('page')=="view_vendors") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/admins/vendor')}}">Vendors</a></li>
                <li class="nav-item"> <a @if(Session::get('page')=="view_all") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/admins')}}">All</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a @if(Session::get('page')=="sections" || Session::get('page')=="categories" || Session::get('page')=="menus" ) style="background:#1a4230 !important; color: #fff !important; " @endif class="nav-link" data-toggle="collapse" href="#ui-cata" aria-expanded="false" aria-controls="ui-cata">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Menu Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-cata">
              <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#1a4230 !important; ">
                <li class="nav-item"> <a @if(Session::get('page')=="sections") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/sections')}}">Sections</a></li>
                <li class="nav-item"> <a @if(Session::get('page')=="categories") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/categories')}}">Categories</a></li>
                <li class="nav-item"> <a @if(Session::get('page')=="menus") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/menus')}}">All Menus</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a @if(Session::get('page')=="orders"  ) style="background:#1a4230 !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Orders Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-orders">
              <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#1a4230 !important; ">
                <li class="nav-item"> <a @if(Session::get('page')=="orders") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/orders')}}">Orders</a></li>

                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a @if(Session::get('page')=="users" || Session::get('page')=="subscribers" ) style="background:#1a4230 !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Users Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-users">
              <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#1a4230 !important; ">
                <li class="nav-item"> <a @if(Session::get('page')=="users") style="background:#1a4230 !important; color: #fff !important; " @else style="background:#fff !important; color: #1a4230 !important; " @endif class="nav-link" href="{{ url('admin/users')}}">Users</a></li>

              </ul>
            </div>
          </li>
          @endif
          
        </ul>
      </nav>

