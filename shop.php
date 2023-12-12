<?php 
include 'header.php';
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
            <button type="button" class="btn btn-primary btn-sm">All</button>
            <button type="button" class="btn btn-secondary btn-sm">Sofa</button>
            <button type="button" class="btn btn-secondary btn-sm">
              Kabinet
            </button>
            <button type="button" class="btn btn-secondary btn-sm">
              Chair
            </button>
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
                  <b><?= $row['name'];  ?></b>
                  <p class="card-text" style="font-size: 60%">
                    <?= $row['description'];  ?>
                  </p>
                  <p>Rp. <?= $row['price'];  ?></p>
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
