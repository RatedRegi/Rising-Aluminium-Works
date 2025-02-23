@extends('dashboard.index')

@section('content')

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Customers</h1>

					<div class="row">
						<div class=" d-flex">
							<div class="card flex-fill">
								<div class="card-header">
				
									<h5 class="card-title mb-0">Active</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th>Surname</th>
											<th>Email</th>
											<th class="d-none d-md-table-cell">Address</th>
											<th class="d-none d-md-table-cell">Phone #</th>
											<th class="d-none d-xl-table-cell">Created At</th>
											<th class="d-none d-xl-table-cell">Updated At</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($users as $user)
										<tr>
											<td>{{$user->name}}</td>
											<td>{{$user->surname}}</td>
											<td>{{$user->email}}</td>
											<td class="d-none d-md-table-cell">{{$user->address->address_line ?? 'No address available'}}</td>
											<td class="d-none d-md-table-cell">{{$user->phone_number}}</td>
											<td class="d-none d-md-table-cell">{{$user->created_at}}</td>
											<td class="d-none d-md-table-cell">{{$user->updated_at}}</td>
											<td>
												<form action="{{route('deleteUser', $user->id)}}" method="POST" style="display: inline;">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-danger btn-sm">Delete</button>
												  </form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</main>

{{-- pagination --}}
<div class="container-fluid">
	<div class="row justify-content-center">
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<!-- Previous Page Link -->
				<li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
					<a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
						<span aria-hidden="true">&laquo; Previous</span>
					</a>
				</li>
		
				<!-- Pagination Links (for each page number) -->
				@foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
					<li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
						<a class="page-link" href="{{ $url }}">{{ $page }}</a>
					</li>
				@endforeach
		
				<!-- Next Page Link -->
				<li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
					<a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
						<span aria-hidden="true">Next &raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
			@endsection