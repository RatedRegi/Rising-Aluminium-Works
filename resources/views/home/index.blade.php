@extends('layouts.app')

@section('content')

{{-- open hero-body --}}
<div class="container-fluid hero text-white position-relative d-flex align-items-center justify-content-center" 
     style="background-image: url('images/hero-section.jpg'); background-size: cover; background-position: center; height: 100vh;">
    <!-- Full Overlay -->
    <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.5;"></div>
    
    <!-- Centered Content -->
    <div class="position-relative text-center">
        <h1 class="display-2 mb-0">Crafting Excellence</h1>
        <h1 class="display-2 mb-0">in Aluminium Solutions</h1>
        <p class="lead mb-0">Premium aluminium fabrication for your</p>
        <p class="lead">residential, commercial, and industrial needs</p>
        <a class="btn btn-danger btn-lg mt-3" href="{{ route('products') }}">Buy Now</a>
    </div>
</div>
{{-- close hero --}}


{{-- shop section --}}
<section class="shop_section layout_padding">
  <div class="container">
      <div class="heading_container heading_center">
        <h2 class="service-font fw-bold fs-1">Our Products</h2>
      </div>
      <div class="row">
          @if ($products->count())
              @foreach ($products as $product)
                  <div class="col-sm-6 col-md-4 col-lg-3">
                      <div class="box">
                          <div class="img-box">
                              <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}">
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
                                  <button type="submit" class="btn btn-danger btn-sm">Shop</button>
                              </form>
                          </div>
                      </div>
                  </div>
              @endforeach
          @else
              <p class="mx-auto">No products available!</p>
          @endif
      </div>
      <div class="btn-box">
        <a href="{{route('products')}}">
          View All Products
        </a>
      </div>
  </div>
</section>  

{{-- line --}}

{{-- who we are section --}}
<section class="shop_section layout_padding mb-5">
<div class="container2">
<div class="heading_container heading_center">
        <h2 class="service-font fw-bold fs-1">The Team</h2>
      </div>
  <aside class="carousel2">
    <div class="carousel__wrapper">
      <div class="item2" id="slide-0"><img src="{{ asset('images/slide-1.jpg') }}" alt="" width="418" height="418"/></div>
      <div class="item2" id="slide-1"><img src="{{ asset('images/slide-2.jpg') }}" alt="" width="418" height="418"/></div>
      <div class="item2" id="slide-2"><img src="{{ asset('images/slide-3.jpg') }}" alt="" width="418" height="418"/></div>
      <div class="item2" id="slide-3"><img src="{{ asset('images/slide-4.jpg') }}" alt="" width="418" height="418"/></div>
      <div class="item2" id="slide-4"><img src="{{ asset('images/slide-5.jpg') }}" alt="" width="418" height="418"/></div>
      <div class="item2" id="slide-5"><img src="{{ asset('images/pic-5.jpg') }}" alt="" width="418" height="418"/></div>
      <div class="item2" id="slide-6"><img src="{{ asset('images/slide-3.jpg') }}" alt="" width="418" height="418"/></div>
    </div>
  </aside>
</div>
</section>  
  <!-- quotation section -->
  <section class="contact_section my-5">
    <div class="container px-0">
      <div class="heading_container heading_center">
        <h2>
          Enquiries
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0" style="background-image: url('images/pic-3.jpg'); background-size: cover; background-position: center; ">
          
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="{{route('enquiry')}}" method="POST">
            @csrf
            <div>
              <input type="text" placeholder="Name" name="name" value="{{old('name')}}"/>
            </div>
            <div>
              <input type="email" placeholder="Email" name="email" value="{{old('email')}}"/>
            </div>
            <div>
              <input type="text" placeholder="Phone" name="phone_number" value="{{old('phone_number')}}"/>
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" name="message" value="{{old('message')}}"/>
            </div>
            <div>
              <input type="hidden" name="status" value="pending"/>
            </div>
            <div class="d-flex ">
              <button type="submit">
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- end quotation section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel carousel-fade" data-ride="carousel" data-bs-interval="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            @if($testimonies->count())
            @foreach($testimonies as $testimony)
            <div class="box w-100">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    {{$testimony->user->name}}
                  </h5>
                  <h6>
                   {{$testimony->created_at}}
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                {{$testimony->message}}
              </p>
            </div>
            @endforeach
            @else
            <p class="mx-auto">no testimonial found</p> 
            @endif
          </div>

        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->
@endsection