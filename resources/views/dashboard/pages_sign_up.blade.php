<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>AdminKit Demo - Bootstrap 5 Admin Template</title>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}"/>
  <link href=" {{URL::asset('assets/css/responsive.css')}}" rel="stylesheet"/>
	<link href="{{asset('dashboardAdmin/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Surname</label>
											<input class="form-control form-control-lg" type="text" name="surname" placeholder="Enter your surname" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Image</label>
											<input type="file" class="form-control form-control-lg" name="photo_url" placeholder="Enter photo" />
										  </div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirm password" />
										  </div>
										  <input type="hidden" name="role" value="admin" />
										  <input type="hidden" name="phone_number" value="0782143404" />
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign Up</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Already have account? <a href="{{route('sign_in')}}">Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="{{asset('dashboardAdmin/js/app.js')}}"></script>


	<script src=" {{URL::asset('assets/js/jquery-3.4.1.min.js')}}"></script>
	<script src=" {{URL::asset('assets/js/bootstrap.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script src=" {{URL::asset('assets/js/custom.js')}}"></script>
  
	   <!-- cart info section -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="{{URL::asset('assets/itemsSelect.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src=" {{URL::asset('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
  
  <!-- Add jQuery and AJAX logic -->    
  <script type="text/javascript" src="{{asset('assets/js/alert.js')}}"></script>

</body>

</html>