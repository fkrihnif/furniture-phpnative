<?php
include 'header.php';

if(!isset($_SESSION['admin'])) {
  header('location:../index.php');
} else {
  ?>
  


  <div class="container" style="background-color: white; border-radius: 30px; margin-bottom: 50px">
      <div class="row mt-5" style="padding-top: 20px">
        <h4 class="mt-3" style="padding-left: 35px">Product</h4>
        <p style="padding-left: 35px">List Of Product</p>
      </div>

      <div class="row mb-4" style="padding-left: 20px">
        <div class="col-3">
          <a href="add-product.php">
            <button class="btn btn-success btn-sm">Create Product</button></a
          >
        </div>
      </div>

      <div class="row" style="padding-left: 20px">
      <?php 
				$result = mysqli_query($conn, "SELECT * FROM product");
				$no =1;
				while ($row = mysqli_fetch_assoc($result)) {
				?>

        <div class="col-4 mb-4">
          <div class="card" style="width: 18rem">
            <img
              src="../../image/product/<?= $row['image']; ?>"
              class="card-img-top"
              alt="..."
              height="200px" />
            <div class="card-body">
              <b><?= $row['name'];  ?></b>
              <p class="card-text" style="font-size: 60%"> Stok :
              <?= $row['stock'];  ?>
              </p>
              <p>Rp. <?= $row['price'];  ?></p>
              <a href="edit_produk.php?id=<?= $row['id']; ?>"><i class="bi bi-pencil"></i></a> &nbsp;
              <a href="controller/delete-product.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></a>
            </div>
          </div>
        </div>

        <?php
					}
				 ?>
  
      </div>
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
