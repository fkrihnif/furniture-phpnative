<?php 
include 'header.php';

if(isset($_SESSION['id_cs'])){

	$id_cs = $_SESSION['id_cs'];
}
?>

<section class="header mt-70">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <img src="assets_home/images/shop.png" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section class="companies mt-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-primary btn-sm">All</button>&nbsp; 

            <?php
              				$result_category = mysqli_query($conn, "SELECT * FROM category");
                      while ($row_category = mysqli_fetch_assoc($result_category)) {

            ?>
                  <button type="button" class="btn btn-secondary btn-sm"><?= $row_category['category_name'];  ?></button>&nbsp; 

                  <?php
                    }
                  ?>
          </div>
        </div>
      </div>
    </section>
    <section class="features mt-70" style="padding-bottom: 60px;">
      <div class="container">
        <div class="row">


        <?php 
				$result = mysqli_query($conn, "SELECT * FROM product");
				while ($row = mysqli_fetch_assoc($result)) {
				?>

        <div class="col-3">
            <a href="detail-shop.php?id=<?= $row['id']; ?>" style="text-decoration: none">
              <div class="card" style="width: 18rem">
                <img
                  src="image/product/<?= $row['image']; ?>"
                  class="card-img-top"
                  alt="..."
                  height="200px" />
                <div class="card-body">
                  <b style="color: black;"><?= $row['name'];  ?></b>

                  <?php
                      $category_id = $row['category_id'];
                      $category = mysqli_query($conn, "SELECT * from category where id = '$category_id'");
                      $data = mysqli_fetch_assoc($category);

                      if (strlen($row['description']) > 30) {
                        $description = substr($row['description'], 0, 50) . '...';
                      } else {
                        $description = $row['description'];
                      }
                  ?>

                  <p style="color: black; font-size: 70%;">Category : <?= $data['category_name'];  ?></p>
                  <p style="color: black; font-size: 90%;">Stock : <?= $row['stock'];  ?>
                  <p class="card-text" style="font-size: 60%; color: black">
                    <?= $description;  ?>
                  </p>
                  <p style="color: black;"><?php
                    echo rupiah($row['price']);
                    ?></p>

                  <?php
                    if(isset($_SESSION['user'])){
                  ?>
                  <form action="controller/add-to-cart.php" method="POST">
                  <input type="hidden" name="id_cs" value="<?= $id_cs; ?>">
                  <input type="hidden" name="id_product" value="<?= $row['id']; ?>">
                  <input type="hidden" name="hal" value="1">
                  <input type="hidden" name="qty" value="1">

                    <div class="col" style="text-align: right;">
                      <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-cart"></i> Cart</button>
                    </div>
                  </form>
                  <?php
                    }else{
                  ?>
                  <div class="col" style="text-align: right;">
                    <a href="login.php"><button type="submit" class="btn btn-success btn-sm"><i class="bi bi-cart"></i> Cart</button></a>
                  </div>
                  <?php
                    }
                  ?>

                </div>
              </div>
            </a>
          </div>

        <?php
					}
				 ?>

        </div>
      </div>
    </section>
 
    <?php
    include 'footer.php';
    ?>
