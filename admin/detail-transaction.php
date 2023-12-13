<?php 
include 'header.php';
if(isset($_SESSION['admin'])){
    // CEK JUMLAH KERANJANG

    $id_transaction = $_GET['id_transaction'];

    if(isset($_POST['submit1'])){
        $status = $_POST['status'];
        $id = $_POST['id_transaction'];
    
        $edit = mysqli_query($conn, "UPDATE transaction SET status = '$status' where id = '$id'");
        if($edit){
                echo "
            <script>
            alert('Status Transaction Updated Successfully!');
            window.location = 'index.php';
            </script>
            ";
        }
    }

    // $cek = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$id_cs'");
    // $jml = mysqli_num_rows($cek);

    $result = mysqli_query($conn, "SELECT k.id as cart_id, k.product_id as product_id, k.qty as qty, p.image as gambar, p.price as hrg, p.name as name_product FROM cart k join product p on k.product_id=p.id WHERE transaction_id = '$id_transaction'");

    $customer = mysqli_query($conn, "SELECT * FROM transaction WHERE id = '$id_transaction'");
    $data_customer = mysqli_fetch_assoc($customer);

?>


<div class="container mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <button onclick="history.back()" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back</button>
        </ol>
      </nav>
    </div>


    <div class="container" style="background-color: white; border-radius: 30px; margin-bottom:60px">
        <div class="row pt-4">
            <div class="col-2">
                <b>Transaction Code</b>
            </div>
            <div class="col-4">
                : <?= $data_customer['transaction_code']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <b>Name</b>
            </div>
            <div class="col-4">
                : <?= $data_customer['name']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <b>No Hp</b>
            </div>
            <div class="col-4">
                : <?= $data_customer['no_hp']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <b>Address</b>
            </div>
            <div class="col-4">
                : <?= $data_customer['address']; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <b>Status</b>
            </div>
            <div class="col-4">
                :
                <?php
                    if ($data_customer['status'] == 0) {
                        ?>
                        <button class="btn btn-warning btn-sm">Order being checked by admin</button>
                        <?php
                    } else {
                        ?>
                        <button class="btn btn-success btn-sm">Order received by admin</button>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="id_transaction" value="<?php echo $id_transaction; ?>">
                <label for="status"><b>Change Status Transaction</b> : </label>
                <select name="status" id="" required>
                    <option disabled selected value> -- select an option -- </option>
                    <option value="0">Order being checked by admin</option>
                    <option value="1">Order received by admin</option>
                </select>
                <button type="submit" name="submit1" class="btn btn-success btn-sm">Update</button>
            </form>
            </div>
        </div>
      <div class="row pt-4" style="padding-bottom: 40px">
      <table class="table">
          <thead>
            <tr style="text-align: center">
              <th scope="col" style="width: 50%">Description</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          $purchaseOrder = [];
          foreach ($result as $row):
          $total = $row['hrg']*$row['qty'];
          ?>
          <tr style="text-align: center">
              <td>
                <div class="row">
                  <div class="col-1"></div>
                  <div class="col-4">
                    <img
                      src="../image/product/<?= $row['gambar']; ?>"
                      class="rounded float-left img-thumbnail"
                      alt="..."
                      width="150px"
                      style="border-color: #4ca763" />
                  </div>
                  <div class="col-7" style="text-align: left">
                    <p><?= $row['name_product']; ?></p>
                    <b><?php
                    echo rupiah($row['hrg']);
                    ?></b>
                  </div>
                </div>
              </td>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['cart_id']; ?>">
              <td style="text-align: center">
              <?= $row['qty']; ?>
              </td>
              </form>

              <td align="right" style="padding-right: 50px;"><?php echo rupiah($total);?></td>
            </tr>
            <?php
            $purchaseOrder[] = $total;
            ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="row justify-content-end pb-4">
        <div class="col-3" align="right" style="padding-right: 50px;">
            <?php
              $totalPurchase = array_sum($purchaseOrder);
            ?>
          <b style="font-size: 130%;">Total : <?php echo rupiah($totalPurchase);?></b>
        </div>
      </div>


    </div>


    <?php
        } else {
            header('location:/');
        }
        ?>
