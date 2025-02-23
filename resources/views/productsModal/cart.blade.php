<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Information Modal</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}" />
 
  <!-- Custom styles for this template -->
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href=" {{URL::asset('assets/css/responsive.css')}}" rel="stylesheet"/>

</head>
<body>

  <!-- Modal -->
  <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProductModalLabel">Edit Product Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editProductForm">
            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productName" placeholder="Enter product name">
            </div>
            <div class="mb-3">
              <label for="productPrice" class="form-label">Price</label>
              <input type="number" class="form-control" id="productPrice" placeholder="Enter product price">
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">Description</label>
              <textarea class="form-control" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="saveProduct">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src=" {{URL::asset('assets/js/jquery-3.4.1.min.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>

  <script>
    document.getElementById("saveProduct").addEventListener("click", function () {
      const name = document.getElementById("productName").value;
      const price = document.getElementById("productPrice").value;
      const description = document.getElementById("productDescription").value;

      // You can now send the data to the server or use it
      console.log({ name, price, description });

      // Close the modal after saving
      const modal = bootstrap.Modal.getInstance(document.getElementById("editProductModal"));
      modal.hide();
    });
  </script>
</body>
</html>
