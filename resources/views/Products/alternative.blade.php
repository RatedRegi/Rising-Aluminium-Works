
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}"/>
</head>
@if(session('message'))
<div class="alert alert-success" id="success-alert">
    {{ session('message') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger" id="danger-alert">
    {{ session('error') }}
</div>
@endif
<body>
  <div class="container my-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
    </nav>

    <!-- Card -->
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="m-0">Products</h5>
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalCreate">New</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

@foreach ($products as $product)
  @if (is_object($product))
    <tr>
      <td>{{$product->id}}</td>
      <td>
        <img src="{{asset('Storage/' .$product->image_url)}}" alt="{{$product->name}}" width="100px" height="100px">
      </td>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>{{"R" .$product->price}}</td>
      <td>{{$product->stock}}</td>
      <td>
        <button class="btn btn-secondary btn-sm">Show</button>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalUpdate">
          <a href="{{url('Adminproducts/' .$product->id. '/edit')}}"> Edit</a>
        </button>
        <form action="{{route('deleteProduct', $product->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </td>
    </tr>
  @endif
@endforeach

</body>
</html>