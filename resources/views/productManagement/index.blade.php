
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
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href=" {{URL::asset('assets/images/favicon.png')}}" type="image/x-icon">

  <title>
    RAW
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css')}}"/>
 
  <!-- responsive style -->
  <link href=" {{URL::asset('assets/css/responsive.css')}}" rel="stylesheet"/>
 
  <!-- Custom styles for this template -->
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href=" {{URL::asset('assets/css/responsive.css')}}" rel="stylesheet"/>
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

        .col-2{
            height: 50px;
            border-radius: 10px;
            color: whitesmoke;
        }
        .btn{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
        }
        .container{
            margin-top: 6rem;
        }
    </style>
<body>
    
    <div class="container-fluid my-5">
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card card-purple">
                    <div class="card-body">
                        <h6 class="card-title">Customers</h6>
                        <h2></h2>
                        <p class="mb-0"><small>-12.4%</small></p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="card card-blue">
                    <div class="card-body">
                        <h6 class="card-title">Products</h6>
                        <h2></h2>
                        <p class="mb-0"><small>+49.9%</small></p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="card card-yellow">
                    <div class="card-body">
                        <h6 class="card-title">Orders</h6>
                        <h2></h2>
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


    <div class="container border">
        <div class="row justify-content-between">
           
            <div class="col-2 btn btn-primary"><a href="{{route('admin')}}">ADD</a></div>
            <div class="col-2 btn btn-warning"><a href="{{route('admin')}}">EDIT</a></div>
            <div class="col-2 btn btn-danger"><a href="{{route('admin')}}">REMOVE</a></div>
        </div>
    </div>

    @yield('content')
   
</body>
</html>
