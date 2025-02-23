
  
  <!-- Modal -->
  <form action="{{route('productCreate')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="ModalCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalCreateLabel">Edit Product Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" name="name" id="productName" placeholder="Enter product name">
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
              </div>
            <div class="mb-3">
              <label for="productPrice" class="form-label">Price</label>
              <input type="number" class="form-control" name="price" id="productPrice" placeholder="Enter product price">
            </div>
            <div class="mb-3">
                <label for="productStock" class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" id="productStock" placeholder="Enter product quantity">
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-control" required>
                  <option value="">Select Category</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="image_url" class="form-label">Image</label>
                <input type="file" class="form-control" name="image_url" id="image_url" value="">
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
</body>
</html>
