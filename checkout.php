<?php 
include 'header.php';
if(isset($_SESSION['user'])){
    $id_cs = $_SESSION['id_cs'];
    // CEK JUMLAH KERANJANG
    $cek = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$id_cs'");
    $jml = mysqli_num_rows($cek);

    $result = mysqli_query($conn, "SELECT k.id as cart_id, k.product_id as product_id, k.qty as qty, p.image as gambar, p.price as hrg, p.name as name_product FROM cart k join product p on k.product_id=p.id WHERE customer_id = '$id_cs' and status = 0");
    
?>


<div class="container mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="shop.php" style="color: #29795a; text-decoration: none"
              >Shop</a
            >
          </li>
          <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
      </nav>
    </div>


    <div class="container" style="background-color: white; border-radius: 30px; margin-bottom:60px">
      <div class="row pt-4">
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

              <input type="hidden" name="id" value="<?php echo $row['cart_id']; ?>">
              <td style="text-align: center">
                <?= $row['qty']; ?>
              </td>

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
      <hr style="margin-top: 40px;margin-bottom: 40px">
      <form action="controller/checkout.php" method="post">
        <input type="hidden" name="id_cs" value="<?php echo $id_cs ?>">
        <div class="row justify-content-evenly">
          <div class="col-4">
            <h4><u>Please Fill this Form</u></h4>
          </div>
          <div class="col-4"></div>
        </div>
        <div class="row justify-content-evenly">
          <div class="col-4">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" autofocus required/>
          </div>
          <div class="col-4">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" required/>
          </div>
        </div>

        <div class="row justify-content-evenly" style="padding-bottom: 60px;">
          <div class="col-4 mt-4">
            <label for="">No Hp</label>
            <input type="number" class="form-control" name="no_hp" required />
          </div>

          <div class="col-4 mt-5">
              <div class="d-grid gap-2 col-12 mx-auto">
                <button class="btn btn-primary btn-lg" type="submit">Order Now</button>
              </div>
          </div>
        </div>
      </form>


    </div>

    <?php
    include 'footer.php';
    ?>

    <?php
        } else {
            header('location:/');
        }
        ?>
