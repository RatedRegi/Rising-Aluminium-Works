<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href=" {{URL::asset('assets/images/favicon.png')}}" type="image/x-icon">

  <title>
    RAW
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}" />
 
  <link href="{{URL::asset('assets/css/sideBar.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
 
  <!-- responsive style -->
  <link href=" {{URL::asset('assets/css/responsive.css')}}" rel="stylesheet" />

  <style>
    .card {
        border: none;
        border-radius: 8px;
    }
    .card .card-body {
        color: #fff;
    }
    .card-purple { background-color: #6f42c1; }
    .card-blue { background-color: #007bff; }
    .card-yellow { background-color: #ffc107; }
    .card-red { background-color: #dc3545; }
</style>
<body >
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin Dashboard</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Order Management</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Pending</a>
                        </li>
                        <li>
                            <a href="#">Completed</a>
                        </li>
                        <li>
                            <a href="#">Cancelled</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product Management</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{route('mastercard.payment')}}">Add</a>
                        </li>
                        <li>
                            <a href="#">Edit</a>
                        </li>
                        <li>
                            <a href="#">Delete</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container my-5">
                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-md-3">
                        <div class="card card-purple">
                            <div class="card-body">
                                <h6 class="card-title">Customers</h6>
                                <h2>{{$users}}</h2>
                                <p class="mb-0"><small>-12.4%</small></p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-3">
                        <div class="card card-blue">
                            <div class="card-body">
                                <h6 class="card-title">Products</h6>
                                <h2>{{$products}}</h2>
                                <p class="mb-0"><small>+49.9%</small></p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-md-3">
                        <div class="card card-yellow">
                            <div class="card-body">
                                <h6 class="card-title">Orders</h6>
                                <h2>{{$orders}}</h2>
                                <p class="mb-0"><small>20%</small></p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-md-3">
                        <div class="card card-red">
                            <div class="card-body">
                                <h6 class="card-title">Payments</h6>
                                <h2>44K</h2>
                                <p class="mb-0"><small>-23.6%</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="line"></div>
            <div class="container-fluid border border-primary">
                <div class="row align-items-end">
                    <div class="card bg-success col-6 col-md-4">Hello</div>
                    <div class="card bg-warning col-6 col-md-4">Hello</div>
                    <div class="card bg-warning col-6 col-md-4">Hello</div>
                    <div class="w-100"></div>
                    <div class="card bg-danger col">Hello</div>
                    <div class="card bg-danger col">Hello</div>
                </div>
                <div class="row">
                    <div class="card bg-success col">Hello</div>
                    <div class="card bg-warning col">Hello</div>
                    <div class="card bg-danger col">Hello</div>
                </div>
            </div>
            
           

            <div class="line"></div>

        
          
            <div class="container-fluid custom-container">  
                <div class="d-flex text-center">
                    <div class="col-md-4">
                        <h1 class="custom-heading">Customers</h1>
                        <p class=" text-muted"></p>
                    </div>
                    <div class="col-md-4">
                        <h1 class="custom-heading">Products</h1>
                        <p class=" text-muted"></span></p>
                    </div>
                    <div class="col-md-4">
                        <h1 class="custom-heading">Orders</h1>
                        <p class=" text-muted"></p>
                    </div>
                    
                </div>
            </div>

            <div class="line"></div>

            <h3>Lorem Ipsum Dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>


    <script type="text/javascript" src="{{asset('assets/js/sideBar.js')}}"></script>
    <script src=" {{URL::asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src=" {{URL::asset('assets/js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src=" {{URL::asset('assets/js/custom.js')}}"></script>
    <script src=" {{URL::asset('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
   
</body>
</html>