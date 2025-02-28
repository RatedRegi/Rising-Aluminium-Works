@extends('layouts.app')

@section('content')
 
<div class="container mt-5 w-75">
    <form action="{{route('products')}}" method="GET" class="d-flex gap-2">
      @csrf
      <div class="input-group">
      <span class="input-group-text mr-2">Category</span>
      <select name="category_id" id="">
        <option value="">All</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}" @selected(request('category_id') == $category->id)>{{$category->name}}</option>
        @endforeach
    </select>
       
    <input type="search" name="search" class="form-control me-2 ml-2 mr-2" placeholder="search" value="{{request('search')}}" aria-label="search">
        
    <button type="submit" class="btn btn-outline-danger">search</button>
  </div>
    </form>
</div>

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Products</h2>
            </div>
            @if ($products->count())
            <div class="row">
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="box">
                                <div class="img-box">
                                    <img src="{{ asset('storage/' .$product->image_url) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="detail-box">
                                    <h6>Price: <span>${{ $product->price }}</span></h6>
                                    <h6 class="new">{{ $product->name }}</h6>
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="quantity" value="1" min="1">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @else
                    <p>No products available!</p>
                @endif
            </div>
    </section>  
{{-- pagination --}}
<div class="container-fluid mb-5">
    <div class="row justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
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
@endsection