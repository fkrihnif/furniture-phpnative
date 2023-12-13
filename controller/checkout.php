<?php 
include '../connection/connection.php';
$id_cs = $_POST['id_cs'];
$name = $_POST['name'];
$address = $_POST['address'];
$no_hp = $_POST['no_hp'];
$now = date("Y-m-d");



$kode = mysqli_query($conn, "SELECT transaction_code from transaction order by id desc");
$data = mysqli_fetch_assoc($kode);
$num = substr($data['transaction_code'], 3, 4);
$add = (int) $num + 1;
if(strlen($add) == 1){
	$format = "INV000".$add;
}else if(strlen($add) == 2){
	$format = "INV00".$add;
}
else if(strlen($add) == 3){
	$format = "INV0".$add;
}else{
	$format = "INV".$add;
}


$query_transaction = "INSERT INTO transaction VALUES(null, '$id_cs', '$format','$name','$no_hp','$address',null,0,'$now')";

// Execute the query
if (mysqli_query($conn, $query_transaction)) {
    // Get the ID of the last inserted row
    $lastInsertedId = mysqli_insert_id($conn);
}

$keranjang = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$id_cs' AND status = 0");

$purchaseOrder = [];

while($row = mysqli_fetch_assoc($keranjang)){
	$qty = $row['qty'];
	$price = $row['price'];
	$id_cart = $row['id'];
	$product_id = $row['product_id'];
	$total_price = $qty*$price;

	$edit = mysqli_query($conn, "UPDATE cart SET status = 1, transaction_id = '$lastInsertedId'  where id = '$id_cart'");

	//kurangkan stok di table product
	$product = mysqli_query($conn, "SELECT * FROM product WHERE id = '$product_id'");
    $data_product = mysqli_fetch_assoc($product);
	$stock = $data_product['stock']; 

	//stok - qty pembelian
	$stock_now = $stock - $qty;

	//update stock to table product
	$update_stock_product = mysqli_query($conn, "UPDATE product SET stock = '$stock_now'  where id = '$product_id'");

	$purchaseOrder[] = $total_price;

}

	$totalPurchase = array_sum($purchaseOrder);

	$insert_total_transaction = mysqli_query($conn, "UPDATE transaction SET total_price = '$totalPurchase' where id = '$lastInsertedId'");


	if($insert_total_transaction){
		header("location:../checkout-done.php");
	}



?>