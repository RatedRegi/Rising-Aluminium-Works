@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center font-weight-bold my-5">Why Choose Rising Aluminium Works?</h1>

    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('images/pic-1.jpg')}}" class="h-100 w-100 rounded shadow" alt="Aluminium Work">
        </div>
        <div class="col-md-6">
            <h4>Quality Craftsmanship</h4>
            <p>We take pride in delivering top-notch aluminium fabrication with precision and excellence.</p>

            <h4>Custom Solutions</h4>
            <p>From windows and doors to unique designs, we offer fully customizable aluminium solutions.</p>

            <h4>Durability & Reliability</h4>
            <p>Our aluminium products are lightweight, rust-resistant, and built to last in all weather conditions.</p>

            <h4>Competitive Pricing</h4>
            <p>We offer premium quality at affordable prices to suit every budget.</p>

            <h4>Timely Delivery</h4>
            <p>We value your time and ensure on-time project completion with efficiency.</p>
        </div>
    </div>

    <div class="mt-5 text-center">
        <h3>Let’s Build Something Great Together!</h3>
    </div>
</div>
@endsection
