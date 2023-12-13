<?php 
session_start();
include 'connection/connection.php';
include 'controller/format-rupiah.php';
if(isset($_SESSION['id_cs'])){

	$id_cs = $_SESSION['id_cs'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Furniture Shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets_home/css/style.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container minimal-navbar">
        <a class="navbar-brand" href="/">Minimal</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
            </li>

            <?php
              if (isset($_SESSION['id_cs'])) {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="my-transaction.php">My-Transaction</a>
                </li>
                <?php
              } else { 
              }
            ?>
            


   
          </ul>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">


            <?php 
					if(isset($_SESSION['id_cs'])){
					$id_cs = $_SESSION['id_cs'];
					$cek = mysqli_query($conn, "SELECT id from cart where customer_id = '$id_cs' and status = 0");
					$value = mysqli_num_rows($cek);

						?>
            <a href="cart.php"
                style="text-decoration: none;"><?= $value ?> <i class="bi bi-cart2" style="font-size: larger"></i
              ></a>
						<?php 
					}else{
					?>
                   <a href="cart.php"
                style="text-decoration: none;"><i class="bi bi-cart2" style="font-size: larger"></i
              ></a>

          <?php
					}
						?>

             |
            <?php
            	if(!isset($_SESSION['user'])){
            ?>
            <a href="login.php"><i class="bi bi-person" style="font-size: larger"></i></a>
        
            <?php
              } else {
                $user = $_SESSION['user'];
            ?>
           
              <a href="#"
              data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration: none;" >
              <?php
              echo $user;
              ?>
              <i class="bi bi-person" style="font-size: larger"></i
              ></a>
            <?php
              }
            ?>

            </li>
          </ul>
        </div>
      </div>
    </nav>