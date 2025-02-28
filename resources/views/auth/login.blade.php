@extends('layouts.app')

@section('content')

<main class="d-flex w-100">
  <div class="container d-flex flex-column">
    <div class="row vh-100">
      <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
        <div class="d-table-cell align-middle">

          <div class="text-center mt-4">
            <h1 class="h2">Welcome</h1>
            <p class="lead">
              Sign in to your account to continue
            </p>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="m-sm-3">
                <form action="{{route('login')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control form-control-lg" type="email" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}"/>
                    @if ($errors->has('email'))
                    <span class="text-danger">
                      {{$errors->first('email')}}
                    </span>
                @endif
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control form-control-lg" type="password" name="password" id="password" placeholder="Enter password"/>
                    @if ($errors->has('password'))
                    <span class="text-danger">
                      {{$errors->first('password')}}
                    </span>
                @endif
                  </div>
                  <div>
                    <div class="form-check align-items-center">
                      <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                      <label class="form-check-label text-small" for="customControlInline">Remember me</label>
                    </div>
                  </div>
                  <div class="d-grid gap-2 mt-3">
                    <button type="submit" class="btn btn-danger mt-2">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="text-center mb-3">
            Don't have an account? <a href="{{route('register')}}">Sign up</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection