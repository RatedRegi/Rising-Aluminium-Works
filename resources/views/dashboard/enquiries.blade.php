@extends('dashboard.index')

@section('content')

			{{-- <main class="content">
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
									<div class="row align-items-center">
										<div class="col">
											<h5 class="card-title mb-0">New enquiry from {{$enquiry->name}}</h5>
										</div>
										<div class="col text-end">
											<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalEnquiry-{{$enquiry->id}}">Open</button>
											<button class="btn btn-success" value="{{$enquiry->email}}">Send Email</button>
										</div>
									</div>
								</div>
							</div>
						</div> 	
			
						<!-- Modal for each enquiry -->
					
			
						@endforeach
					</div>
					@else
					No Enquiries Found!
					@endif
				</div>
			</main>
			 --}}

			 {{-- <main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">ENQUIRIES</h1>
						<a class="badge bg-danger text-white ms-2" href="upgrade-to-pro.html"> from customers </a>
					</div>
			
					@if($enquiries->count())
					<div class="accordion" id="enquiriesAccordion">
						@foreach($enquiries as $enquiry)
						<div class="accordion-item">
							<h2 class="accordion-header" id="heading-{{$enquiry->id}}">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
									data-bs-target="#collapse-{{$enquiry->id}}" aria-expanded="false" 
									aria-controls="collapse-{{$enquiry->id}}">
									New enquiry from {{$enquiry->name}}
								</button>
							</h2>
							<div id="collapse-{{$enquiry->id}}" class="accordion-collapse collapse" 
								aria-labelledby="heading-{{$enquiry->id}}" data-bs-parent="#enquiriesAccordion">
								<div class="accordion-body">
									<div class="mb-3">
										<label for="message-{{$enquiry->id}}" class="form-label">Message</label>
										<input type="text" class="form-control" name="description" 
											id="message-{{$enquiry->id}}" placeholder="{{$enquiry->message}}">
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
			</main> --}}



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





			
