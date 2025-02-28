@extends('dashboard.index')

@section('content')

			<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">ENQUIRIES</h1>
						<a class="badge bg-danger text-white ms-2" href="upgrade-to-pro.html"> from customers </a>
					</div>
					@if($enquiries->count())
					<div class="row">
						@foreach($enquiries as $enquiry)
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">New enquiry from {{$enquiry->name}}</h5>
			
									<!-- Bootstrap Alert -->
									<div class="alert alert-info alert-dismissible fade show" role="alert">
										<strong>Message:</strong> {{$enquiry->message}}
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
			
									<div class="text-end">
										<button class="btn btn-success" value="{{$enquiry->email}}">Send Email</button>
									</div>
								</div>
							</div>
						</div> 
						@endforeach
					</div>
					@else
					No Enquiries Found!
					@endif
				</div>
			</main>
			@endsection





			
