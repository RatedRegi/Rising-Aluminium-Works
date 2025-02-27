@extends('layouts.app')

@section('content')

@if(session('message'))
<div class="alert alert-success" id="success-alert">
    {{ session('message') }}
</div>
@endif

<div class="container-fluid my-5">
    <div class="row justify-content-between">
        <div class="col-md-10">
        {{-- accordion start --}}
        <div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" id="toggleButton">
                Add Address
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
            <div class="accordion-body">
                <div class="container w-50 my-5">
                    <form action="{{route('storeAddress')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" name="address_line" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputCity">City</label>
                            <input type="text" name="city" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Province</label>
                            <x-address/>
                        </div>
                        <div class="form-group">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" name="zip" id="inputZip" placeholder="eg 2341">
                        </div>
                        <input type="hidden" class="form-control" name="user_id" id="inputZip" value="{{Auth::id()}}">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">Check me out</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


  {{-- accordion end --}}
        </div>
        <div class="col-md">
            <h1 class="user-head">Hi, {{Auth::user()->name}}</h1>
        </div>
    </div>
</div>

<div class="container-fluid">
    <h1 class="text-center order-heading my-5">Orders</h1>
</div>

<div class="container-fluid p-0 bg-dark text-white">
    <div class="row justify-content-around text-center">
        
            <div class="col-md-3 p-3 hover-color">
                <a href="{{route('pending')}}" class="text-white">
               
                <h1 class="bg-warning b-color">Pending</h1>
                <p class="my-5 p-font">{{$pending->count()}}</p>
                <h1 class="bg-warning b-color"></h1>
            </a>
            </div>
        
        <div class="col-md-3 p-3 hover-color">
            <a href="{{route('completed')}}" class="text-white">
            <h1 class="bg-success b-color">Completed</h1>
            <p class="my-5 p-font">{{$completed->count()}}</p>
            <h1 class="bg-success b-color"></h1>
        </a>
        </div>
        <div class="col-md-3 p-3 hover-color">
            <a href="{{route('shipping')}}" class="text-white">
            <h1 class="bg-primary b-color">Shipping</h1>
            <p class="my-5 p-font">{{$shipping->count()}}</p>
            <h1 class="bg-primary b-color"></h1>
        </a>
        </div>
    </div>
</div>


<div class="container-fluid my-5 border"></div>
<div class="container-fluid my-5">
            <h4 class="pay-font text-center">My Details</h4>
  </div>
{{-- payment start --}}
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8"> {{-- Ensures proper column width on different screens --}}
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Personal</h5>
                </div>

                {{-- Make table scrollable on small screens --}}
                <div class="table-responsive">
                    <table class="table table-hover my-0 text-center">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th class="d-none d-md-table-cell">Phone #</th>
                                <th class="d-none d-md-table-cell">Address</th>
                                <th class="d-none d-xl-table-cell">City</th>
                                <th class="d-none d-xl-table-cell">Province</th>
                                <th class="d-none d-xl-table-cell">Zip</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->email}}</td>
                                <td class="d-none d-md-table-cell">{{$user->phone_number}}</td>
                                <td class="d-none d-md-table-cell">{{$address->address_line ?? 'N/A'}}</td>
                                <td class="d-none d-xl-table-cell">{{$address->city ?? 'N/A'}}</td>
                                <td class="d-none d-xl-table-cell">{{$address->province ?? 'N/A'}}</td>
                                <td class="d-none d-xl-table-cell">{{$address->zip ?? 'N/A'}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div> {{-- End table-responsive --}}
            </div>
        </div>
    </div>
</div>

{{-- payment end --}}
<div class="container-fluid text-center my-5">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdate-{{optional($address)->id}}">Update Details</button>
</div>

<form action="{{route('details')}}" method="POST">
  @csrf
  @method('PUT')
<div class="modal fade" id="ModalUpdate-{{optional($address)->id}}" tabindex="-1" aria-labelledby="ModalUpdateLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="#ModalUpdateLabel">Update Your Information</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
      </div>
      <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" class="form-control" name="surname" id="surname" value="{{$user->surname}}">
      </div>
      <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
      </div>
      <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{$user->phone_number}}">
        </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address_line" id="address" value="{{$address->address_line ?? 'N/A'}}">
      </div>
      <div class="mb-3">
        <label for="City" class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="City" value="{{$address->city ?? 'N/A'}}">
      </div>
      <div class="mb-3">
        <label for="province" class="form-label">Province</label>
       <x-address/>
      </div>
      <div class="mb-3">
        <label for="zip" class="form-label">zip</label>
        <input type="number" class="form-control" name="zip" id="zip" value="{{$address->zip ?? 'N/A'}}" placeholder="eg 2341">
      </div>
      <div class="mb-3">
        <label for="current_password" class="form-label">Password</label>
        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter current password">
      </div>
      <div class="mb-3">
        <label for="new_password" class="form-label">New Password</label>
        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password">
      </div>
      <div class="mb-3">
        <label for="new_password_confirmation" class="form-label">New Password Confirmation</label>
        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm new password">
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

@endsection