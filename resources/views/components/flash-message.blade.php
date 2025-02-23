
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
    {{ session('success') }}
    <input type="hidden" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></input>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="success-alert">
    {{ session('error') }}
    <input type="hidden" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></input>
</div>
@endif


@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="success-alert">
    {{ session('warning') }}
    <input type="hidden" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></input>
</div>
@endif
