<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Skaftin Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('admin/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ url('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('admin/vendors/mdi/css/materialdesignicons.min.css.map') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('admin/js/select.dataTables.min.css') }}">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css') }}">


  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('admin/images/') }}" />
  <!-- <style type="text/css">
    .td { 
      white-space:pre;
      overflow:  }
  </style> -->
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTVFSXUU9KuOYFtNoUFof6qVJBU5t9MR8&libraries=places"></script>
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   @include('admin.layout.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.layout.sidebar')
      <!-- partial -->
     @yield('content') 
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ url('admin/vendors/js/vendor.bundle.base.js') }}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ url('admin/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ url('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ url('admin/js/dataTables.select.min.js') }}"></script>
  

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ url('admin/js/off-canvas.js') }}"></script>
  <script src="{{ url('admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ url('admin/js/template.js') }}"></script>
  <script src="{{ url('admin/js/settings.js') }}"></script>
  <script src="{{ url('admin/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ url('admin/js/dashboard.js') }}"></script>
  <script src="{{ url('admin/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->

  <!-- Custom admin js-->
  <script src="{{ url('admin/js/custom.js') }}"></script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
  
  <script type="text/javascript">
      $(document).ready( function () {
      $('#table_id').DataTable();
       } );
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
   <script>
    // Initialize the Google Places Autocomplete service
    function initAutocomplete() {
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input);
    }

    // Load the Google Places API on page load
    google.maps.event.addDomListener(window, 'load', initAutocomplete);
  </script>
  
   <script>
    // Get the current year
    var currentYear = new Date().getFullYear();

    // Update the content of the 'year' div
    document.getElementById('year').innerHTML = currentYear;
  </script>
  
 <!-- <script>-->
 <!--     function getAMorPM(time) {-->

 <!--    }-->

 <!--   document.querySelector("form").addEventListener("submit", (event) => {-->
 <!--   event.preventDefault();-->
 <!--   console.log(event.target.elements[0].value);-->

 <!--  });-->
      
 <!-- </script>-->

</body>

</html>

