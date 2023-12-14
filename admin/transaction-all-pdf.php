<?php
// memanggil library FPDF
require('../libraryPdf/fpdf.php');
include '../connection/connection.php';
include '../controller/format-rupiah.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'REPORT ALL TRANSACTION',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(30,7,'Code Transaction' ,1,0,'C');
$pdf->Cell(40,7,'Name' ,1,0,'C');
$pdf->Cell(25,7,'No Hp' ,1,0,'C');
$pdf->Cell(30,7,'Total Price',1,0,'C');
$pdf->Cell(20,7,'Date',1,0,'C');
$pdf->Cell(35,7,'Status',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;

$data = mysqli_query($conn, "SELECT * FROM transaction order by id desc");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(30,6, $d['transaction_code'],1,0);
  $pdf->Cell(40,6, $d['name'],1,0);
  $pdf->Cell(25,6, $d['no_hp'],1,0);
  $pdf->Cell(30,6, rupiah($d['total_price']),1,0);  
  $pdf->Cell(20,6, $d['created_at'],1,0);

  if ($d['status'] == 0) {
    $pdf->Cell(35,6, "Order being checked",1,1);
  } else {
    $pdf->Cell(35,6, "Order received",1,1);
  }


  $id_transaction = $d['id'];
  $data_cart = mysqli_query($conn, "SELECT k.id as cart_id, k.product_id as product_id, k.qty as qty, k.price as hrg, p.image as gambar, p.name as name_product FROM cart k join product p on k.product_id=p.id WHERE transaction_id = '$id_transaction'");
  while ($c = mysqli_fetch_array($data_cart)) {

      $hrg = $c['hrg'];
      $qty = $c['qty'];
      $total = $hrg*$qty;
      
      $pdf->Cell(10,6, "",1,0,'C');
      $pdf->Cell(180,6, $c['name_product']."  @".rupiah($c['hrg'])." x ".$c['qty']." = ".rupiah($total),1,1);
    
  }
}

$check_revenue = mysqli_query($conn, "SELECT SUM(total_price) AS total_transaction FROM transaction");
$row = mysqli_fetch_assoc($check_revenue);
$count_revenue = $row['total_transaction'];

$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'Total Revenue : '.rupiah($count_revenue),0,0,'C');
 
$pdf->Output();
 
?>