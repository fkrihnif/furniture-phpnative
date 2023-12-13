<?php 
include 'header.php';
if(isset($_SESSION['user'])){
    $id_cs = $_SESSION['id_cs'];
?>


<div class="container mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="shop.php" style="color: #29795a; text-decoration: none"
              >Shop</a
            >
          </li>
          <li class="breadcrumb-item active" aria-current="page">Checkout - Done</li>
        </ol>
      </nav>
    </div>


    <div class="container" style="background-color: white; border-radius: 30px; margin-bottom:50px">
      <div class="row pt-4" style="padding-bottom: 30px;">
            <div class="col-12">
            <div class="card text-center">
                <div class="card-header">
                    Checkout Success !
                </div>
                <div class="card-body">
                    <h5 class="card-title">Thank you for shopping at our store</h5>
                    <p class="card-text">We will immediately process your order</p>
                    <a href="shop.php" class="btn btn-success">Back to Shopping</a>
                </div>
                </div>
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
