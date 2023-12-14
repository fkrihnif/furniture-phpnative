<?php
include 'header.php';

if(!isset($_SESSION['admin'])) {
  header('location:../index.php');
} else {

        if(isset($_POST['search'])){
          $date = $_POST['date'];

          $check_transaction = mysqli_query($conn, "SELECT id from transaction where created_at = '$date'");
          $count_transaction = mysqli_num_rows($check_transaction);
  
          $check_revenue = mysqli_query($conn, "SELECT SUM(total_price) AS total_transaction FROM transaction where created_at = '$date'");
          $row = mysqli_fetch_assoc($check_revenue);
          $count_revenue = $row['total_transaction'];

        }else{
          $check_transaction = mysqli_query($conn, "SELECT id from transaction");
          $count_transaction = mysqli_num_rows($check_transaction);
  
          $check_revenue = mysqli_query($conn, "SELECT SUM(total_price) AS total_transaction FROM transaction");
          $row = mysqli_fetch_assoc($check_revenue);
          $count_revenue = $row['total_transaction'];
        }

        $check_customer = mysqli_query($conn, "SELECT id from customer");
        $count_customer = mysqli_num_rows($check_customer);
    ?>

    <div class="container" style="background-color: white; border-radius: 30px">
      <div class="row mt-5" style="padding-top: 20px">
        <h4 class="mt-3" style="padding-left: 35px">Dashboard</h4>
      </div>
      <div class="row mt-3">
        <div class="col-4">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="" style="padding-left: 20px">
            <input type="date" class="form-control" name="date" 
            <?php
            if(isset($_POST['search'])){
              $date = $_POST['date'];
              ?>
              value="<?= $date; ?>"
              <?php

              }
            ?>
            
            />
            <button type="submit" name="search" class="btn btn-success btn-sm mt-2">Search</button>
          </div>
        </form>
            
        </div>
      </div>
      <div class="row mt-4" style="padding-left: 20px">
        <div class="col-3">
          <div class="card" style="width: 18rem">
            <div class="card-body">
              <b>Total Customers</b>
              <br /><br />
              <p><?php echo $count_customer; ?></p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card" style="width: 18rem">
            <div class="card-body">
              <b>Transaction</b>
              <br /><br />
              <p><?php echo $count_transaction; ?></p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card" style="width: 18rem">
            <div class="card-body">
              <b>Revenue</b>
              <br /><br />
              <p><?php 
              if ($count_revenue > 0) {
                echo rupiah($count_revenue); 
              } else {
                echo "0"; 
              }
            
              ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5" style="padding-bottom: 40px; margin-bottom: 60px">
        <div class="col-6 mb-3" style="padding-left: 35px">
          <h4>Report Transaction</h4>
        </div>
        <div class="col-6 mb-3" style="text-align: right;">
        <a href="transaction-all-pdf.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> Export All Transaction to PDF</a>
        </div>
        <div class="col-12" style="padding-left: 35px">
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Transaction Code</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Export Pdf</th>
              </tr>
            </thead>
            <tbody>
              <?php
                 if(isset($_POST['search'])){
                  $date = $_POST['date'];
                  $result = mysqli_query($conn, "SELECT * FROM transaction where created_at = '$date' order by id desc");
                } else {
                  $result = mysqli_query($conn, "SELECT * FROM transaction order by id desc");
                }
                  $no = 1;
                  foreach ($result as $row):
              ?>
              <tr style="text-align: center">
                  <td><?= $no; ?></td>
                  <td align="left">
                  <?= $row['transaction_code']; ?>
                  </td>
                  <td align="left"><?php echo rupiah($row['total_price']);?></td>
                  <td align="left"><?= $row['created_at']; ?></td>
                    <?php
                        if ($row['status'] == 0) {
                            ?>
                            <td align="left"><button class="btn btn-warning btn-sm">Order being checked by admin</button></td>
                            <?php
                        } else {
                            ?>
                            <td align="left"><button class="btn btn-success btn-sm">Order received by admin</button></td>
                            <?php
                        }
                    ?>
                    

                  <td align="left"><a href="detail-transaction.php?id_transaction=<?= $row['id']; ?>">
                      <button class="btn btn-warning btn-sm">
                        <i class="bi bi-eye"></i>
                      </button>
                    </a>
                </td>
                <td align="left">
                <a href="transaction-pdf.php?id_transaction=<?= $row['id'] ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
                </td>
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
