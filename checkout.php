<?php 
include 'header.php';
?>

<div class="container mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="shop.html" style="color: #29795a; text-decoration: none"
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
            <tr style="text-align: center">
              <td>
                <div class="row">
                  <div class="col-1"></div>
                  <div class="col-4">
                    <img
                      src="assets_home/images/image3.png"
                      class="rounded float-left img-thumbnail"
                      alt="..."
                      width="150px"
                      style="border-color: #4ca763" />
                  </div>
                  <div class="col-7" style="text-align: left">
                    <p>Lemari</p>
                    <b>Rp 500.000</b>
                  </div>
                </div>
              </td>
              <td style="text-align: center">
                <div class="row">
                  <div class="col-12">
                    <p>2</p>
                  </div>
                  <div class="col-6"></div>
                </div>
              </td>
              <td>Rp 1000.000</td>
            </tr>
            <tr style="text-align: center">
              <td>
                <div class="row">
                  <div class="col-1"></div>
                  <div class="col-4">
                    <img
                      src="assets_home/images/image3.png"
                      class="rounded float-left img-thumbnail"
                      alt="..."
                      width="150px"
                      style="border-color: #4ca763" />
                  </div>
                  <div class="col-7" style="text-align: left">
                    <p>Lemari</p>
                    <b>Rp 500.000</b>
                  </div>
                </div>
              </td>
              <td style="text-align: center">
                <div class="row">
                  <div class="col-12">
                    <p>2</p>
                  </div>
                  <div class="col-6"></div>
                </div>
              </td>
              <td>Rp 1000.000</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row justify-content-end pb-4">
        <div class="col-4" style="text-align: right; margin-right:70px">
          <h4>Total : Rp 2.000.000</h4>
        </div>
      </div>

      <div class="row justify-content-evenly">
        <div class="col-4">
          <h3><u>Formulir</u></h3>
        </div>
        <div class="col-4"></div>
      </div>
      <div class="row justify-content-evenly">
        <div class="col-4">
          <label for="">Nama</label>
          <input type="text" class="form-control" name="" />
        </div>
        <div class="col-4">
          <label for="">Alamat Lengkap</label>
          <input type="text" class="form-control" name="" />
        </div>
      </div>

      <div class="row justify-content-evenly pb-4">
        <div class="col-4 mt-4">
          <label for="">No Hp</label>
          <input type="text" class="form-control" name="" />
        </div>

        <div class="col-4 mt-5">
          <a href="">
            <button class="btn btn-primary btn-lg" onclick="myFunction()">
              Pesan Sekarang
            </button></a
          >
        </div>
      </div>
    </div>
 
    <?php
    include 'footer.php';
    ?>
