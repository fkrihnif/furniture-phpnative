<?php
include 'header.php';

if(!isset($_SESSION['admin'])) {
  header('location:../index.php');
} else {
    ?>

    <div class="container" style="background-color: white; border-radius: 30px">


      <div class="row mt-3 pt-4" style="padding-bottom: 40px; margin-bottom: 60px">
        <div class="col-6 mb-3">
        <h4 class="" style="padding-left: 20px">Category</h4>
        </div>
        <div class="col-6 mb-3" style="text-align: right;">
        <a href="add-category.php" class="btn btn-success"><i class="bi bi-plus"></i> Add Category</a>
        </div>
        <div class="col-12" style="padding-left: 35px">
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th style="width: 10%;">No</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $result = mysqli_query($conn, "SELECT * FROM category order by id desc");
                  $no = 1;
                  foreach ($result as $row):
              ?>
              <tr style="text-align: center">
                  <td align="left"><?= $no; ?></td>
                  <td align="left">
                  <?= $row['category_name']; ?>
                  </td>
                  <td align="left"> <a href="edit-category.php?id=<?= $row['id']; ?>"><i class="bi bi-pencil"></i></a> &nbsp;
              <a href="controller/delete-category.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></a></td>
                    <?php 
              $no++;
            ?>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
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
