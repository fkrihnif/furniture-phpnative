<?php
// memanggil library FPDF
require('libraryPdf/fpdf.php');
include 'connection/connection.php';
include 'controller/format-rupiah.php';

$id_transaction_get = $_GET['id_transaction'];
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'REPORT TRANSACTION',0,0,'C');

$pdf->Cell(10,15,'',0,1);
$data_customer = mysqli_query($conn, "SELECT * FROM transaction WHERE id = '$id_transaction_get' order by id desc");


$check_revenue = mysqli_query($conn, "SELECT SUM(total_price) AS total_transaction FROM transaction WHERE id = '$id_transaction_get' ");
$row = mysqli_fetch_assoc($check_revenue);
$count_revenue = $row['total_transaction'];

while($dc = mysqli_fetch_array($data_customer)){
$pdf->SetFont('Times','B',10);
$pdf->Cell(180,7,'Transaction Code     : '.$dc['transaction_code'],0,0);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(180,7,'Name                          : '.$dc['name'],0,0);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(180,7,'No Hp                         : '.$dc['no_hp'],0,0);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(180,7,'Address                      : '.$dc['address'],0,0);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(180,7,'Date                            : '.$dc['created_at'],0,0);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(180,7,'Sub Total                   : '.rupiah($count_revenue),0,0);
$pdf->Cell(10,5,'',0,1);
if ($dc['status'] == 0) {
  $pdf->Cell(180,7,'Status                         : '."Order being checked by admin",0,0);
} else {
  $pdf->Cell(180,7,'Status                         : '."Order received by admin",0,0);
}

}
 
$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(90,7,'Product' ,1,0,'C');
$pdf->Cell(30,7,'Price',1,0,'C');
$pdf->Cell(20,7,'Qty',1,0,'C');
$pdf->Cell(40,7,'Total',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;

$data = mysqli_query($conn, "SELECT k.id as cart_id, k.product_id as product_id, k.qty as qty, k.price as hrg, p.image as gambar, p.name as name_product FROM cart k join product p on k.product_id=p.id WHERE transaction_id = '$id_transaction_get'");
while($d = mysqli_fetch_array($data)){

  $hrg = $d['hrg'];
  $qty = $d['qty'];
  $total = $hrg*$qty;

  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(90,6, $d['name_product'],1,0);
  $pdf->Cell(30,6, rupiah($d['hrg']),1,0);  
  $pdf->Cell(20,6, $d['qty'],1,0);
  $pdf->Cell(40,6, rupiah($total),1,1);

}
 
$pdf->Output();
 
?>