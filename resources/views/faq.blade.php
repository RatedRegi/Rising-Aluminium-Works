@extends('layouts.app')

@section('content')
<div class="d-flex flex-column mx-auto justify-content-center align-items-center p-0" 
style="background-image: url('images/pic-8.jpg'); background-size: cover; background-position: center; height: 400px;">>
   <div class="container-fluid">
    <div class="row justify-content-center align-content-center my-auto">
        <h1 class="text-white fs-6 topic-head">Frequently Asked Questions</h1>
    </div>
   </div>
</div>
<div class="container my-5 text-center">
    
    <div class="accordion" id="faqAccordion">
        @foreach ($faqs as $index => $faq)
        <div class="accordion-item my-4">
            <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                    {{ $faq['question'] }}
                </button>
            </h2>
            <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                <div class="accordion-body" style="font-size: 20px;">
                    {{ $faq['answer'] }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
