@extends('productManagement.index')
@section('content')
    <div class="container mt-5 mb-5">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="name...." value="{{old('name')}}"> 
              @if ($errors->has('name'))
                  <span class="text-danger">
                    {{$errors->first('name')}}
                  </span>
              @endif
              <small id="priceHelp" class="form-text text-muted">We'll never share your price with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control"  name="description" id="description" aria-describedby="descriptionHelp" placeholder="description....." value="{{old('description')}}">
                @if ($errors->has('description'))
                  <span class="text-danger">
                    {{$errors->first('description')}}
                  </span>
              @endif
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="price" class="form-control" name="price" id="price" aria-describedby="priceHelp" placeholder="price...." value="{{old('price')}}">
                @if ($errors->has('price'))
                  <span class="text-danger">
                    {{$errors->first('price')}}
                  </span>
              @endif
              </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="text" class="form-control" name="stock" id="stock" placeholder="Enter stock">
              @if ($errors->has('stock'))
              <span class="text-danger">
                {{$errors->first('stock')}}
              </span>
          @endif
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="image">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection