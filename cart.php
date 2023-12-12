<?php 
include 'header.php';

if(isset($_POST['submit1'])){
	$id_keranjang = $_POST['id'];
	$qty = $_POST['qty'];

	$edit = mysqli_query($conn, "UPDATE cart SET qty = '$qty' where id = '$id_keranjang'");
	if($edit){
			echo "
		<script>
		alert('Cart Updated Successfully!');
		window.location = 'cart.php';
		</script>
		";
	}
}else if(isset($_POST['delete-cart'])){
	$id_keranjang = $_POST['id'];
	$del = mysqli_query($conn, "DELETE FROM cart WHERE id = '$id_keranjang'");
	if($del){
		echo "
		<script>
		alert('1 Product Successfully Deleted!');
		window.location = 'cart.php';
		</script>
		";
	}
}



?>

<div class="container mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="shop.html" style="color: #29795a; text-decoration: none"
              >Shop</a
            >
          </li>
          <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
      </nav>
    </div>

		<?php 
			if(isset($_SESSION['user'])){
				$id_cs = $_SESSION['id_cs'];
			// CEK JUMLAH KERANJANG
				$cek = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$id_cs'");
				$jml = mysqli_num_rows($cek);

        $result = mysqli_query($conn, "SELECT k.id as cart_id, k.product_id as product_id, k.qty as qty, p.image as gambar, p.price as hrg, p.name as name_product FROM cart k join product p on k.product_id=p.id WHERE customer_id = '$id_cs' and status = 0");
					?>	


    <div class="container" style="background-color: white; border-radius: 30px; margin-bottom:60px">
      <div class="row pt-4">
        <table class="table">
          <thead>
            <tr style="text-align: center">
              <th scope="col" style="width: 50%">Description</th>
              <th scope="col">Quantity</th>
              <th scope="col">Remove</th>
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
                    <b>Rp <?= $row['hrg']; ?></b>
                  </div>
                </div>
              </td>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['cart_id']; ?>">
              <td style="text-align: center">
                <div class="row">
                  <div class="col-12">
                    <input
                      type="number"
                      value="<?= $row['qty']; ?>"
                      min="1"
                      name="qty"
                      style="width: 60px" />
                      <button type="submit" name="submit1" class="btn btn-success btn-sm">
                        Update
                      </button>
                  </div>
                  <div class="col-6"></div>
                </div>
              </td>
              </form>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <input type="hidden" name="id" value="<?php echo $row['cart_id']; ?>">
              <td>
                <a href="#" onclick="return confirm('Are You Sure to Delete This Product ?')">
                  <button class="btn btn-danger btn-sm" type="submit" name="delete-cart">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </a>
              </td>
            </form>

              <td>Rp <?= $total; ?></td>
            </tr>
            <?php
            $purchaseOrder[] = $total;
            ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="row justify-content-end pb-4">
        <div class="col-2">
            <?php
              $totalPurchase = array_sum($purchaseOrder);
            ?>
          <b>Total : Rp <?= $totalPurchase; ?></b>
        </div>
      </div>
      <div class="row justify-content-end pb-4">
        <div class="col-2">
          <a href="checkout.php">
            <button class="btn btn-primary">Checkout</button></a
          >
        </div>
      </div>
    </div>

    <?php
      } else {
        ?>

    <div class="container" style="background-color: white; border-radius: 30px; margin-bottom:160px">
          <div class="row pt-4">
            <table class="table">
              <thead>
                <tr style="text-align: center">
                  <th scope="col" style="width: 50%">Description</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Remove</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
              <tr>
              <td colspan='7' class='text-center bg-warning'><h5><b>Please Login First ...</b></h5></td>
              </tr>
    
          </tbody>
        </table>
      </div>
    </div>


        <?php
      }
    ?>




 
    <?php
    include 'footer.php';
    ?>
