@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center fw-bold display-5">Why Choose Rising Aluminium Works?</h1>

    <div class="row gy-4 align-items-center">
        <div class="col-lg-6">
            <img src="{{ asset('images/pic-1.jpg') }}" class="img-fluid rounded shadow" alt="Aluminium Work">
        </div>
        <div class="col-lg-6">
            <h4 class="fw-semibold mt-3">Quality Craftsmanship</h4>
            <p class="fs-5">We take pride in delivering top-notch aluminium fabrication with precision and excellence.</p>

            <h4 class="fw-semibold mt-3">Custom Solutions</h4>
            <p class="fs-5">From windows and doors to unique designs, we offer fully customizable aluminium solutions.</p>

            <h4 class="fw-semibold mt-3">Durability & Reliability</h4>
            <p class="fs-5">Our aluminium products are lightweight, rust-resistant, and built to last in all weather conditions.</p>

            <h4 class="fw-semibold mt-3">Competitive Pricing</h4>
            <p class="fs-5">We offer premium quality at affordable prices to suit every budget.</p>

            <h4 class="fw-semibold mt-3">Timely Delivery</h4>
            <p class="fs-5">We value your time and ensure on-time project completion with efficiency.</p>
        </div>
    </div>

    <div class="mt-5 text-center">
        <h3 class="fw-bold display-6">Let’s Build Something Great Together!</h3>
    </div>
</div>

@endsection
