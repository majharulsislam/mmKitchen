<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('frontend/images/Logo_main.png') }}" type="favicon/ico" />

  <title>MM Kitchen</title>

  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/flexslider.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/pricing.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datetimepicker.min.css') }}">
  <!-- Toastr Css -->
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <!-- Main Css -->
  <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">


  <script src="{{ asset('frontend/js/jquery-1.11.2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/jquery.flexslider.min.js') }}"></script>
  <script type="text/javascript">
      $(window).load(function() {
          $('.flexslider').flexslider({
           animation: "slide",
           controlsContainer: ".flexslider-container"
          });
      });
  </script>

  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script>
      function initialize() {
          var mapCanvas = document.getElementById('map-canvas');
          var mapOptions = {
              center: new google.maps.LatLng(24.909439, 91.833800),
              zoom: 16,
              scrollwheel: false,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          var map = new google.maps.Map(mapCanvas, mapOptions)

          var marker = new google.maps.Marker({
              position: new google.maps.LatLng(24.909439, 91.833800),
              title:"Mamma's Kitchen Restaurant"
          });

          // To add the marker to the map, call setMap();
          marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
  </script>


</head>
<body data-spy="scroll" data-target="#template-navbar">


	{{-- Pages Content Here --}}
		@yield('pages_content')


  <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-md-offset-3">
                  <div class="copyright text-center">
                      <p>
                          &copy; Copyright, 2015 <a href="#">Your Website Link.</a> Theme by <a href="#"  target="_blank">ThemeWagon</a>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/jquery.mixitup.min.js') }}" ></script>
  <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.validate.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/jquery.hoverdir.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/jQuery.scrollSpeed.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-datetimepicker.min.js') }}"></script>

  <script src="{{ asset('frontend/js/script.js') }}"></script>

  <script>
      $(document).ready(function(){
         $(window).scroll(function() {
           if ($(document).scrollTop() > 50) {
               $("#logo").attr("src", "{{ asset('frontend/images/Logo_stick.png') }}")
           }
           else {
               $("#logo").attr("src", "{{ asset('frontend/images/Logo_main.png') }}")
           }
         });
      });
  </script>

  <script>
    $(document).ready(function(){
      $('#datetimepick').datetimepicker({
        //language:  'en',
          format: "dd/mm/yyyy - HH:ii P",
          weekStart: 1,
          todayBtn:  1,
          autoclose: 1,
          todayHighlight: 1,
          startView: 2,
          forceParse: 0,
          showMeridian: 1
      });
    });
  </script>
  
  <!-- Toastr -->
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
   {!! Toastr::message() !!}
</body>
</html>