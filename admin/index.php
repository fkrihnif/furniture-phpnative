<?php
include 'header.php';

if(!isset($_SESSION['admin'])) {
  header('location:../index.php');
} else {
  ?>
  


    <div class="container" style="background-color: white; border-radius: 30px">
      <div class="row mt-5" style="padding-top: 20px">
        <h4 class="mt-3" style="padding-left: 35px">Dashboard</h4>
      </div>
      <div class="row mt-3">
        <div class="col-4">
          <div class="form-group" style="padding-left: 20px">
            <input type="date" class="form-control" name="" />
          </div>
        </div>
      </div>
      <div class="row mt-4" style="padding-left: 20px">
        <div class="col-3">
          <div class="card" style="width: 18rem">
            <div class="card-body">
              <b>Total Customers</b>
              <br /><br />
              <p>Rp. 50.000</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card" style="width: 18rem">
            <div class="card-body">
              <b>Transaction</b>
              <br /><br />
              <p>Rp. 50.000</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card" style="width: 18rem">
            <div class="card-body">
              <b>Revenue</b>
              <br /><br />
              <p>Rp. 50.000</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5" style="padding-bottom: 40px">
        <div class="col-12" style="padding-left: 35px">
          <h4>Report Purchasing Product</h4>
        </div>
        <div class="col-12" style="padding-left: 35px">
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
              </tr>
              <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
              </tr>
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
