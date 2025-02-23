@extends('dashboard.index')

@section('content')

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
						
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="{{ asset( $user->photo_url) }}" alt="{{$user->name." ".$user->surname}}" class="avatar img-fluid rounded-circle mb-2" style="height: 128px; width: 128px;"  />
									<h5 class="card-title mb-0">{{$user->name." ".$user->surname}}</h5>
									<div class="text-muted mb-2">Lead Developer</div>

									<div>
										<a class="btn btn-primary btn-sm" href="#">Follow</a>
										<a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
									</div>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Skills</h5>
									<a href="#" class="badge bg-primary me-1 my-1">Laravel</a>
									<a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
									<a href="#" class="badge bg-primary me-1 my-1">Bootstrap</a>
									<a href="#" class="badge bg-primary me-1 my-1">HTML</a>
									<a href="#" class="badge bg-primary me-1 my-1">UI</a>
									<a href="#" class="badge bg-primary me-1 my-1">UX</a>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">Gweru, Midlands</a></li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">GitHub</a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Gweru</a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Elsewhere</h5>
									<ul class="list-unstyled mb-0">		
										<li class="mb-1"><a href="#">X</a></li>
										<li class="mb-1"><a href="#">Facebook</a></li>
										<li class="mb-1"><a href="#">Instagram</a></li>
										<li class="mb-1"><a href="#">GitHub</a></li>
										<li class="mb-1"><a href="#">LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Personal Information</h5>
								</div>
								<div class="card-body h-100">
									<div class="container-fluid p-0">
										<div class="row">
											<div class="card bg-secondary p-3">
												<div class="row">
													<div class="col">
														<h5 class="card-title text-white">Name</h5>
														<div class="card">
															<div class="card-body">
																<strong>{{$user->name}}</strong>
															</div>
														</div>
													</div>
													<div class="col">
														<h5 class="card-title text-white">Surname</h5>
												<div class="card">
													<div class="card-body">
														<strong>{{$user->surname}}</strong> 
													</div>
												</div>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<h5 class="card-title text-white">Email</h5>
														<div class="card">
															<div class="card-body">
																<strong>{{$user->email}}</strong>
															</div>
														</div>
													</div>
													<div class="col">
														<h5 class="card-title text-white">Phone Number</h5>
												<div class="card">
													<div class="card-body">
														<strong>{{$user->phone_number}}</strong> 
													</div>
												</div>
													</div>
												</div>
											</div>
										</div>
									</div>
				
									<div class="card-header">
										<h5 class="card-title mb-0">Social Media Accounts</h5>
									</div>

									<div class="container-fluid p-0">
										<div class="row">
											<div class="card bg-secondary p-3">
												<div class="row">
													<div class="col">
														<h5 class="card-title text-white">GitHub</h5>
														<div class="card">
															<div class="card-body">
																<strong>Reginald</strong>
															</div>
														</div>
													</div>
													<div class="col">
														<h5 class="card-title text-white">LinkedIn</h5>
												<div class="card">
													<div class="card-body">
														<strong>Chikuni</strong> 
													</div>
												</div>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<h5 class="card-title text-white">Facebook</h5>
														<div class="card">
															<div class="card-body">
																<strong>reginaldchikun2@gmail</strong>
															</div>
														</div>
													</div>
													<div class="col">
														<h5 class="card-title text-white">X</h5>
												<div class="card">
													<div class="card-body">
														<strong>+263 782 143 404</strong> 
													</div>
												</div>
													</div>
												</div>
											</div>
										</div>
									</div>
						</div>
					</div>

				</div>
			</main>

			@endsection