@extends('layouts.app')

@section('content')

{{-- <div class="container mt-5 mb-5 w-50"> --}}
      <div class="d-flex w-100 my-5">
        <div class="container d-flex flex-column">
          <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
              <div class="d-table-cell align-middle">
                <div class="text-center mt-4">
                  <h1 class="h2">Get started</h1>
                  <p class="lead">
                    Start creating the best possible user experience for you customers.
                  </p>
                </div>
    
                <div class="card">
                  <div class="card-body">
                    <div class="m-sm-3">
                      <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">First Name</label>
                          <input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" value="{{old('name')}}"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Last Name</label>
                          <input class="form-control form-control-lg" type="text" name="surname" placeholder="Enter your surname" value="{{old('surname')}}"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" value="{{old('email')}}"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Phone Number</label>
                          <input class="form-control form-control-lg" type="number" name="phone_number" placeholder="Enter your phone number" value="{{old('phone_number')}}"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Password</label>
                          <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Confirm Password</label>
                          <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirm password" />
                        </div>
                        <div class="d-grid gap-2 mt-3">
                          <button type="submit" class="btn btn-danger">Sign Up</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="text-center mb-3">
                  Already have account? <a href="{{route('login')}}">Log In</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>      
        @endsection


{{-- 
        <div class="form-group">
          <label for="name">First Name</label>
          <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Enter first name" value="{{old('name')}}"> 
          @if ($errors->has('name'))
              <span class="text-danger">
                {{$errors->first('name')}}
              </span>
          @endif
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="surname">Last Name</label>
            <input type="text" class="form-control"  name="surname" id="surname" aria-describedby="surnameHelp" placeholder="Enter last name" value="{{old('surname')}}">
            @if ($errors->has('surname'))
              <span class="text-danger">
                {{$errors->first('surname')}}
              </span>
          @endif
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
            @if ($errors->has('email'))
              <span class="text-danger">
                {{$errors->first('email')}}
              </span>
          @endif
          </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
          @if ($errors->has('password'))
          <span class="text-danger">
            {{$errors->first('password')}}
          </span>
      @endif
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm password">
          </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
          <label class="form-check-label" for="check">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div> --}}

