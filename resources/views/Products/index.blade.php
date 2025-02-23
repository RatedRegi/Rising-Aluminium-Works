@extends('layouts.app')

@section('content')

  <div class="d-flex border mt-5 border-success bg-white p-3 justify-content-between">
    <h5 class="m-0 prod-admin">Admin</h5>
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalCreate">New</a>
  </div>
  <div class="container my-5 text-white">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="m-0 prod-head">Products</h2>
      <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalCreate">New</a>
    </div>
  </div>
 
  <div class="container my-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
      </ol>
    </nav>
  </div>
    <!-- Card -->
 <div class="flex bg-success w-75 ml-auto mr-auto mb-5">
  <table class="table text-center bg-whit ml-auto mr-auto justify-content-center align-items-center" >
    <thead>
      <tr>
        <th class="col-1">#</th>
        <th class="col-2">Image</th>
        <th class="col-2">Name</th>
        <th class="col-2">Description</th>
        <th class="col-1">Price</th>
        <th class="col-1">Stock</th>
        <th class="col-2">Category</th>
        <th class="col-1">Action</th>
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
        <td>{{$product->description}}</td>
        <td>{{"R" .$product->price}}</td>
        <td>{{$product->stock}}</td>
        <td>{{$product->category ? $product->category->name : 'No Category'}}</td>
        <td>
  <button class="btn btn-primary btn-sm w-25 mr-2" data-bs-toggle="modal" data-bs-target="#ModalUpdate-{{$product->id}}">Edit</button>
  <form action="{{route('delete', $product->id)}}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm w-25">Delete</button>
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
    
  @include('Products.Modal.create')
  
@endsection