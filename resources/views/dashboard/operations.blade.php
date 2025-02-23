@extends('dashboard.index')

@section('content')

<div class="container-fluid">

    <div class="row">
       <div class="col-md">

        <div class="card p-3 bg-success">
            <div class="container-fluid">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <h2>Weekly Sales Report</h2>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="container-fluid my-4">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <p><strong>Current Week Sales:</strong> ${{ number_format($currentWeekSales, 2) }}</p>
                                <p><strong>Previous Week Sales:</strong> ${{ number_format($previousWeekSales, 2) }}</p>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <p>
                                    <strong>Percentage Change:</strong> 
                                    <span style="color: {{ $percentageChange >= 0 ? 'green' : 'red' }}">
                                        {{ $percentageChange }}%
                                    </span>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="card p-3 bg-primary">
            <div class="container-fluid">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <h2>Weekly Orders Report</h2>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="container-fluid my-4">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <p><strong>Current Week Orders:</strong> {{$currentWeekOrders }}</p>
                                <p><strong>Previous Week Orders:</strong> {{$previousWeekOrders }}</p>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <p>
                                    <strong>Percentage Change:</strong> 
                                    <span style="color: {{ $percentageChangeOrders >= 0 ? 'green' : 'red' }}">
                                        {{ $percentageChangeOrders }}%
                                    </span>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>


        <div class="card p-3 bg-secondary">
            <div class="container-fluid">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <h2>Weekly Customers Report</h2>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="container-fluid my-4">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <p><strong>Current Week Customers:</strong> {{$currentWeekCustomers }}</p>
                                <p><strong>Previous Week Customers:</strong> {{$previousWeekCustomers }}</p>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <p>
                                    <strong>Percentage Change:</strong> 
                                    <span style="color: {{ $percentageChangeCustomers >= 0 ? 'green' : 'red' }}">
                                        {{ $percentageChangeCustomers }}%
                                    </span>
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>

       </div>


       <div class="col-md">
        <div class="card p-3 bg-warning">
            <div class="container-fluid">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                <h2>Products Bought Report</h2>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="container-fluid my-4">
                <div class="row">
                        <div class="row">
                            <div class="col">
                                @foreach($products as $product)
                                <p>{{ $product->name }} - Sold: {{ $product->total_sold }}</p>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
            
         {{-- pagination --}}
<div class="container-fluid">
	<div class="row justify-content-center">
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<!-- Previous Page Link -->
				<li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
					<a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
						<span aria-hidden="true">&laquo; Previous</span>
					</a>
				</li>
		
				<!-- Pagination Links (for each page number) -->
				@foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
					<li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
						<a class="page-link" href="{{ $url }}">{{ $page }}</a>
					</li>
				@endforeach
		
				<!-- Next Page Link -->
				<li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
					<a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
						<span aria-hidden="true">Next &raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
        </div>
       </div>


    </div>
</div>



















<div class="container">
    
   
  
</div>
@endsection