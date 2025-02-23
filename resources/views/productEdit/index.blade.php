
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href=" {{URL::asset('assets/images/favicon.png')}}" type="image/x-icon">

  <title>
    RAW
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}" />
 
  <!-- Custom styles for this template -->
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href=" {{URL::asset('assets/css/responsive.css')}}" rel="stylesheet"/>


<section class="shop_section layout_padding">
<div class="container">
    <div class="heading_container heading_center">
        <h2>Products</h2>
    </div>
    @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endif
    <div class="row">
        @if ($products->count())
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="detail-box">
                            <h6>Price: <span>${{ $product->price }}</span></h6>
                            <h6 class="new">{{ $product->name }}</h6>
                            <button 
                            class="btn btn-warning edit-product-btn" 
                            data-id="{{ $product->id }}" 
                            data-name="{{ $product->name }}" 
                            data-description="{{ $product->description }}" 
                            data-price="{{ $product->price }}" 
                            data-stock="{{ $product->stock }}" 
                            data-image-url="{{ $product->image_url }}"
                            data-bs-toggle="modal" 
                            data-bs-target="#editProductModal">
                            Edit
                        </button>
                        
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No products available!</p>
        @endif
    </div>
</div>
</section>  

  <!-- Modal -->
  <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProductModalLabel">Edit Product Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('products.update', $d)}}" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="name" value="{{ $product->name }}" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" value="">{{ old('description', "$product->description")}}</textarea>
              </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="number" class="form-control" id="price" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" value="{{ $product->stock }}">
              </div>
              <div class="mb-3">
                <label for="image_url" class="form-label">Image</label>
                <input type="file" class="form-control" id="image_url" value="{{asset($product->image_url) }}">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveProduct">Save Changes</button>
              </div>
          </form>
        </div>
      
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src=" {{URL::asset('assets/js/jquery-3.4.1.min.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>

  <script>

  </script>

<!-- Add jQuery and AJAX logic -->    
<script type="text/javascript" src="{{asset('assets/js/alert.js')}}"></script>
