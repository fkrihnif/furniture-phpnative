<?php
include 'header.php';

if(!isset($_SESSION['admin'])) {
  header('location:../index.php');
} else {
  ?>


  <div class="container" style="background-color: white; border-radius: 30px">
      <div class="row mt-5" style="padding-top: 20px">
        <h4 class="mt-3" style="padding-left: 35px">Add Product</h4>
      </div>

    <form action="controller/store-product.php" method="POST" enctype="multipart/form-data">
    <div class="row" style="padding-left: 20px; padding-bottom: 40px">
        <div class="col-6">
          <div class="form-group">
            <label for="">Name Product</label>
            <input type="text" class="form-control" name="name" />
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Category</label>
            <select class="form-select" aria-label="Choose Category" name="category_id">
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group mt-3">
            <label for="">Photo Product</label>
            <input type="file" class="form-control" name="files" />
          </div>
        </div>
        <div class="col-6">
          <div class="form-group mt-3">
            <label for="">Price</label>
            <input type="text" class="form-control" name="price" />
          </div>
        </div>
        <div class="col-6">
          <div class="form-group mt-3">
            <label for="">Description</label>
            <textarea
              name="description"
              id=""
              cols="10"
              rows="4"
              class="form-control"></textarea>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group mt-3">
            <label for="">Stock</label>
            <input type="text" class="form-control" name="stock" />
          </div>
        </div>
        <div class="col-6 mt-4">
          <button class="btn btn-success" type="submit">Save Product</button>
        </div>
      </div>
    </form>
    </div>
   <!-- Modal -->
   <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>
          <div class="modal-body">Yakin Ingin Logout?</div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal">
              Close
            </button>
            <a href="controller/logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function () {
        new DataTable("#example");
      });
    </script>
  </body>
</html>

<?php
}
?>
