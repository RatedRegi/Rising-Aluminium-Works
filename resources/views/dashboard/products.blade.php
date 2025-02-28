@extends('dashboard.index')

@section('content')

			<main class="content">
				<div class="container-fluid p-0">

					<div class="container mb-3 text-white">
						<div class="d-flex justify-content-between align-items-center">
						  <h2 class="m-0 prod-head">Products</h2>
						  <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalCreate">New</a>
						</div>
					  </div>

					<div class="row">
						<div class=" d-flex">
							<div class="card flex-fill">
								<div class="card-header">
				
									<h5 class="card-title mb-0">Available</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
												<th>#</th>
												<th>Image</th>
												<th>Name</th>
												<th class="d-none d-xl-table-cell">Description</th>
												<th>Price</th>
												<th>Stock</th>
												<th class="d-none d-xl-table-cell">Category</th>
												<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@if ($products->count())
    
										@foreach ($products as $product)
									   
										<tr>
										  <td>{{$product->id}}</td>
										  <td>
											<img src="{{asset('Storage/' .$product->image_url)}}" alt="{{$product->name}}" width="100px" height="100px">
										  </td>
										  <td>{{$product->name}}</td>
										  <td class="d-none d-xl-table-cell">{{$product->description}}</td>
										  <td>{{"$" .$product->price}}</td>
										  <td>{{$product->stock}}</td>
										  <td class="d-none d-xl-table-cell">{{$product->category ? $product->category->name : 'No Category'}}</td>
										  <td>
									<button class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#ModalUpdate-{{$product->id}}">Edit</button>
									<form action="{{route('delete', $product->id)}}" method="POST" style="display: inline;">
									  @csrf
									  @method('DELETE')
									  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
									</form>
										  </td>
										</tr>
										<form action="{{ route('update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
										  @csrf
										  @method('PUT')
										<div class="modal fade" id="ModalUpdate-{{$product->id}}" tabindex="-1" aria-labelledby="ModalUpdateLabel" aria-hidden="true">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header">
												<h5 class="modal-title" id="#ModalUpdateLabel">Edit Product Information</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											  </div>
											  <div class="modal-body">
												 
												  <div class="mb-3">
													<label for="productName" class="form-label">Product Name</label>
													<input type="text" class="form-control" name="name" id="productName" value="{{$product->name}}">
												  </div>
												  <div class="mb-3">
													  <label for="productDescription" class="form-label">Description</label>
													  <textarea class="form-control" name="description" id="productDescription" rows="3" value="">{{$product->description}}</textarea>
													</div>
												  <div class="mb-3">
													<label for="productPrice" class="form-label">Price</label>
													<input type="number" class="form-control" name="price" id="productPrice" value="{{$product->price}}">
												  </div>
												  <div class="mb-3">
													  <label for="productStock" class="form-label">Stock</label>
													  <input type="number" class="form-control" name="stock" id="productStock" value="{{$product->stock}}">
													</div>
													<div class="mb-3">
													  <label for="category" class="form-label">Category</label>
													  <select name="category_id" class="form-control" required>
														<option value="">Select Category</option>
														@foreach ($categories as $category)
														<option value="{{$category->id}}">{{$category->name}}</option>
														@endforeach
													  </select>
													</div>
													<div class="mb-3">
													  <label for="image_url" class="form-label">Image</label>
													  <input type="file" class="form-control" name="image_url" id="image_url">
													  <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" class="img-thumbnail mt-2" width="100">
													</div>
											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary" id="saveProduct">Save Changes</button>
											  </div>
											</div> 
										  </div>
										</div>
									  </form>
									  
										@endforeach
										@else
											<p>There are no products</p>
										@endif
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

			@include('Products.Modal.create')
			@endsection