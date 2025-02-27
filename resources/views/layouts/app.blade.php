<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="alumminum fabrication, alumminum doors, alumminum windows, custom alumminum works" />
  <meta name="description" content="Rising Aluminium Works offers top notch alumminum fabrication, doors, windows, partitions and other custom solutions" />
  <meta name="author" content="Reginald Chikuni" />
  <meta name="robots" content="index, follow" />
  <meta name="csrf-token" content="{{csrf_token()}}" />
  <title> Rising Aluminium Works</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{asset('assets/css/carousel2.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/hero.css')}}">
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/customerDash.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/home.css')}}"/>
  <!-- Custom styles for this template -->
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href=" {{URL::asset('assets/css/responsive.css')}}" rel="stylesheet"/>
</head>
<body>

{{-- navbar new --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarContent">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-1">
          <a href="{{'/'}}" class="navbar-brand ">
            <div class="mr-2">
        <x-svg.Rising_Aluminium_Steel class="d-inline-block" />
          </div>
        </a>
        </div>
        <div class="col-md">
              <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" href="{{'/'}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('products')}}">
                    Shop
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('why_us')}}">
                    Why Us
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{'/about_us'}}">About Us</a>
                </li>
                @if(Auth::user())
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('customerPortal')}}">
                      Customer Portal
                    </a>
                  </li>
                  <li>
                      <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="bg-dark nav-link border-0">Logout</button>
                      </form>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{'login'}}">Login <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">
                      Register
                    </a>
                  </li>
                  @endif
                 
              </ul>
        </div>
        <div class="col-md-1">
          <ul class="navbar-nav justify-content-end">
             <a href="{{route('cart.index')}}" class="navbar-brand">
                <div>
             <x-svg.cart class="cart d-inline-block"/>
              </div>
              </a>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
{{-- navbar end --}}

<x-flash-message/>
  @yield('content')
  
 <!-- info section -->
 <div class="container-fluid bg-dark text-white mb-0">
  <div class="container-fluid social_container">
    <div class="d-flex py-3 social_box justify-content-center">
      <a href="#" class="mx-2 text-white">
        <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
      </a>
      <a href="#" class="mx-2 text-white">
        <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
      </a>
      <a href="#" class="mx-2 text-white">
        <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
      </a>
    </div>
  </div>
  <div class="info_container">
    <div class="container p-5">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <h6>
            ABOUT US
          </h6>
          <p>
            At rising aluminium works, we specialize in crafting durable and elegant aluminium solutions for residential, commercial and industrial needs.
          </p>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_form ">
            <h5>
              Testimony
            </h5>
            <form action="{{route('testimony')}}" method="POST">
              @csrf
              <textarea class="form-control" name="message" id="message" cols="25" rows="5" placeholder="Enter your testimony"></textarea>
              <button type="submit" class="btn btn-secondary my-3">
                Post
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <h6>
            NEED HELP
          </h6>
          <ul class="list-unstyled">
            <li><a href="{{route('customerPortal')}}" class="text-decoration-none text-white">Track Your Order</a></li>
            <li><a href="{{route('customerPortal')}}" class="text-decoration-none text-white">Shipping Info</a></li>
            <li><a href="{{route('faq')}}" class="text-decoration-none text-white">FAQs</a></li>
          </ul>
        </div>
        <div class="col-md-6 col-lg-3">
          <h6>
            CONTACT US
          </h6>
          <div class="">
            <a href="">
              <p class="text-white">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> 24 Road Gweru, Midlands</span>
              </p>
              
            </a>
            <a href="">
              <p class="text-white">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+263 782 143 404</span>
              </p>
            
            </a>
            <a href="">
              <p class="text-white">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span> raw@gmail.com</span>
              </p>
             
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <footer class=" footer_section bg-dark mt-0">
      <div class="container">
        <p class="text-white">
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a class="mx-1 text-white" href="#">Rated Regi</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  <!-- end info section -->
  <script src=" {{URL::asset('assets/js/jquery-3.4.1.min.js')}}"></script>
  <script src=" {{URL::asset('assets/js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{URL::asset('assets/js/custom.js')}}"></script>
 <script src="{{URL::asset('assets/js/arcodion.js')}}"></script>
  <script src="{{URL::asset('assets/js/alert.js')}}"></script>
<script  src="{{asset('assets/js/carousel2.js')}}"></script>
     <!-- cart info section -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src=" {{URL::asset('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>