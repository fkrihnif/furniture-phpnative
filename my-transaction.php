<?php 
include 'header.php';
if(isset($_SESSION['user'])){
    $id_cs = $_SESSION['id_cs'];
    // CEK JUMLAH KERANJANG
    $cek = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$id_cs'");
    $jml = mysqli_num_rows($cek);

    $result = mysqli_query($conn, "SELECT * FROM transaction WHERE customer_id = '$id_cs' order by id Desc");
?>


<div class="container mt-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php" style="color: #29795a; text-decoration: none"
              >Home</a
            >
          </li>
          <li class="breadcrumb-item active" aria-current="page">My Transaction</li>
        </ol>
      </nav>
    </div>


    <div class="container" style="background-color: white; border-radius: 30px; margin-bottom:60px">
      <div class="row pt-4" style="padding-bottom: 40px">
        <table class="table">
          <thead>
            <tr style="text-align: center">
                <th scope="col">No</th>
              <th scope="col" style="width: 20%">Code Transaction</th>
              <th scope="col">Total Price</th>
              <th scope="col">Date</th>
              <th scope="col">Status</th>
              <th scope="col">Export PDF</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          foreach ($result as $row):
          ?>
          <tr style="text-align: center">
              <td><?= $no; ?></td>
              <td>
              <?= $row['transaction_code']; ?>
              </td>
              <td><?php echo rupiah($row['total_price']);?></td>
              <td><?= $row['created_at']; ?></td>
                <?php
                    if ($row['status'] == 0) {
                        ?>
                        <td><button class="btn btn-warning btn-sm">Order being checked by admin</button></td>
                        <?php
                    } else {
                        ?>
                        <td><button class="btn btn-success btn-sm">Order received by admin</button></td>
                        <?php
                    }
                ?>
                
              <td> <a href="transaction-pdf.php?id_transaction=<?= $row['id'] ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
                </td></td>
              <td><a href="detail-transaction.php?id_transaction=<?= $row['id']; ?>">
                  <button class="btn btn-warning btn-sm">
                    <i class="bi bi-eye"></i>
                  </button>
                </a>
            </td>
                <?php 
					$no++;
				?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
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
