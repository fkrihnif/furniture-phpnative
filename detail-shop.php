<?php 
include 'header.php';

if(isset($_SESSION['id_cs'])){

	$id_cs = $_SESSION['id_cs'];
}
$id = $_GET['id'];
$product = mysqli_query($conn, "SELECT * from product where id = '$id'");
$data = mysqli_fetch_assoc($product);

$category_id = $data['category_id'];
$category = mysqli_query($conn, "SELECT * from category where id = '$category_id'");
$data_category = mysqli_fetch_assoc($category);
?>

<div class="container mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="shop.php" style="color: #29795a; text-decoration: none"
              >Shop</a
            >
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Detail Product
          </li>
        </ol>
      </nav>
</div>

    <div class="container" style="background-color: white; border-radius: 30px; margin-bottom: 60px; padding-bottom:70px">
      <div class="row pt-4">
        <div class="col-4">
          <div class="card" style="width: 20rem">
            <img src="image/product/<?= $data['image']; ?>" class="card-img-top" alt="..." />
          </div>
        </div>
        <div class="col-8">
          <h2><?= $data['name']; ?></h2>
          <h6>Category : <?= $data_category['category_name']; ?></h6>
          <h4 class="mb-2" style="color: #29795a"><?php echo rupiah($data['price']); ?></h4>
          <p>Stock : <?= $data['stock']; ?></p>
          <form action="controller/add-to-cart.php" method="POST">
            <input type="hidden" name="id_cs" value="<?= $id_cs; ?>">
            <input type="hidden" name="id_product" value="<?= $data['id']; ?>">
            <input type="hidden" name="hal"  value="2">
            <input
              type="number"
              class="form-control"
              value="1"
              min="1"
              name="qty"
              style="width: 60px" />
        
              <?php 
              if(isset($_SESSION['user'])){
                ?>
                <button type="submit" class="btn btn-success mt-2">
                <i class="bi bi-cart"></i> Cart
              </button>
                <?php 
              }else{

                ?>
                <a href="login.php"><button type="button" class="btn btn-success mt-2">
                <i class="bi bi-cart"></i> Cart
                </button></a>
                <?php 
              }
              ?>          


          </form>
          <h5 class="mt-3"><u>Detail</u></h5>
          <p>
          <?= $data['description']; ?>
          </p>
        </div>
      </div>
    </div>
 
    <?php
    include 'footer.php';
    ?>
