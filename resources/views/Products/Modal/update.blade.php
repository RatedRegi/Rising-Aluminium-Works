
  <!-- Modal -->

  {{-- @foreach ($products as $product)

  @endforeach --}}

  <form action="{{ route('updateProduct', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="modal fade" id="ModalUpdate" tabindex="-1" aria-labelledby="ModalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="#ModalUpdateLabel">Edit Product Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" name="name" id="productName" value="{{$product->name}}">
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="productDescription" rows="3" value="{{$product->description}}"></textarea>
              </div>
            <div class="mb-3">
              <label for="productPrice" class="form-label">Price</label>
              <input type="number" class="form-control" name="price" id="productPrice" value="{{$product->price}}">
            </div>
            <div class="mb-3">
                <label for="productStock" class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" id="productStock" value="{{$product->stock}}">
              </div>
              <div class="mb-3">
                <label for="image_url" class="form-label">Image</label>
                <input type="file" class="form-control" name="image_url" id="image_url">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail mt-2" width="100">
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



{{-- <div class="container mt-5 mb-5">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Enter first name" value="{{$product->name}}"> 
        </div>
        <div class="form-group">
            <label for="surname">description</label>
            <input type="text" class="form-control"  name="description" id="surname" aria-describedby="surnameHelp" placeholder="Enter last name" value="{{$product->description}}">
          
          </div>
          <div class="form-group">
            <label for="email">price</label>
            <input type="email" class="form-control" name="price" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$product->price}}">
          
          </div>
        <div class="form-group">
          <label for="password">stock</label>
          <input type="password" class="form-control" name="stock" id="password" value="{{$product->stock}}">
         
        </div>
        <div class="form-group">
            <label for="password_confirmation">image</label>
            <input type="file" class="form-control" name="image_url" id="image_url">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
</div>




</body>
</html> --}}
