@extends('dashboard.index')

@section('content')

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Orders</h1>
					<div class="row">
						<div class=" d-flex">
							<div class="card flex-fill">
								<div class="card-header">
				
									<h5 class="card-title mb-0">Latest Orders</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th>Surname</th>
											<th>Address</th>
											<th>Phone #</th>
											<th class="d-none d-xl-table-cell">Created At</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Total Amount</th>
											<th class="">Update</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($orderOwner as $order)
										<tr>
											<td>{{$order->user->name ?? 'N/A'}}</td>
											<td>{{$order->user->surname ?? 'N/A'}}</td>
											<td>
											@if ($order->user && $order->user->address)
        									{{ $order->user->address->address_line }}
    										@else
    									    No address available
    										@endif
											</td>
											<td>{{$order->user->phone_number ?? 'N/A'}}</td>
											<td class="d-none d-xl-table-cell">{{$order->localTime}}</td>
											<td> @if($order->status === 'completed')
												<span class="badge bg-success">{{$order->status}}</span>
												@elseif($order->status === 'pending')
												<span class="badge bg-warning">{{$order->status}}</span>
												@elseif($order->status === 'shipped')
												<span class="badge bg-primary">{{$order->status}}</span>
												@endif
											</td>
											<td class="d-none d-md-table-cell">{{$order->total_price}}</td>
											<td>
												<form action="{{route('updateCompleted', $order->id)}}" method="POST" style="display: inline;">
													@csrf
													<button type="submit" class="btn btn-success btn-sm" name="completed" value="completed">complete</button>
												</form>
												<form action="{{route('updatePending', $order->id)}}" method="POST" style="display: inline;">
													@csrf
													<button type="submit" class="btn btn-warning btn-sm" name="pending" value="pending">pending</button>
												</form>
												<form action="{{route('updateShipped', $order->id)}}" method="POST" style="display: inline;">
													@csrf
													<button type="submit" class="btn btn-primary btn-sm" name="shipped" value="shipped">shipped</button>
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
				<li class="page-item {{ $orderOwner->onFirstPage() ? 'disabled' : '' }}">
					<a class="page-link" href="{{ $orderOwner->previousPageUrl() }}" aria-label="Previous">
						<span aria-hidden="true">&laquo; Previous</span>
					</a>
				</li>
		
				<!-- Pagination Links (for each page number) -->
				@foreach ($orderOwner->getUrlRange(1, $orderOwner->lastPage()) as $page => $url)
					<li class="page-item {{ $page == $orderOwner->currentPage() ? 'active' : '' }}">
						<a class="page-link" href="{{ $url }}">{{ $page }}</a>
					</li>
				@endforeach
		
				<!-- Next Page Link -->
				<li class="page-item {{ $orderOwner->hasMorePages() ? '' : 'disabled' }}">
					<a class="page-link" href="{{ $orderOwner->nextPageUrl() }}" aria-label="Next">
						<span aria-hidden="true">Next &raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
			@endsection