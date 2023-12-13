<?php 
include 'header.php';
if(isset($_SESSION['user'])){
    $id_cs = $_SESSION['id_cs'];
    // CEK JUMLAH KERANJANG

    $id_transaction = $_GET['id_transaction'];

    // $cek = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$id_cs'");
    // $jml = mysqli_num_rows($cek);

    $result = mysqli_query($conn, "SELECT * FROM cart WHERE transaction_id = '$id_transaction'");

    $result = mysqli_query($conn, "SELECT k.id as cart_id, k.product_id as product_id, k.qty as qty, p.image as gambar, p.price as hrg, p.name as name_product FROM cart k join product p on k.product_id=p.id WHERE customer_id = '$id_cs' and transaction_id = '$id_transaction'");

?>


<div class="container mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <button onclick="history.back()" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Back</button>
        </ol>
      </nav>
    </div>


    <div class="container" style="background-color: white; border-radius: 30px; margin-bottom:60px">
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
                      src="image/product/<?= $row['gambar']; ?>"
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
    include 'footer.php';
    ?>

    <?php
        } else {
            header('location:/');
        }
        ?>
