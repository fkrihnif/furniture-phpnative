<?php 
include '../connection/connection.php';

$hal = $_POST['hal'];
$id_cs = $_POST['id_cs'];
$id_product = $_POST['id_product'];
if(isset($_POST['qty'])){
	$qty = $_POST['qty'];
}


$result = mysqli_query($conn, "SELECT * FROM product WHERE id = '$id_product'");
$row = mysqli_fetch_assoc($result);

$nama_produk = $row['name'];
$kd = $row['id'];
$harga = $row['price'];
$stock = $row['stock'];

$now = date("Y-m-d");

if ($stock > 0) {
	//if stock ready
	if($hal == 1){
		$cek = mysqli_query($conn, "SELECT * from cart where product_id = '$id_product' and customer_id = '$id_cs' and status = 0");
		$jml = mysqli_num_rows($cek);
		$row1 = mysqli_fetch_assoc($cek);
		if($jml > 0){
			$set = $row1['qty']+1;
			$update = mysqli_query($conn, "UPDATE cart SET qty = '$set' WHERE status = 0 and product_id = '$id_product' and customer_id = '$id_cs'");
			if($update){
				echo "
				<script>
				alert('Successfully Added to Cart!');
				window.location = '../shop.php';
				</script>
				";
				die;
			}
		}else{
	
			$insert = mysqli_query($conn, "INSERT INTO cart VALUES(null,'$id_product','$id_cs', null, '$qty', '$harga',0,'$now')");
			if($insert){
				echo "
				<script>
				alert('Successfully Added to Cart!');
				window.location = '../shop.php';
				</script>
				";
				die;
			}
		}
	
	
	}else{
		$cek = mysqli_query($conn, "SELECT * from cart where product_id = '$id_product' and customer_id = '$id_cs' and status = 0");
		$jml = mysqli_num_rows($cek);
		$row1 = mysqli_fetch_assoc($cek);
		if($jml > 0){
			$set = $row1['qty']+$qty;
			$update = mysqli_query($conn, "UPDATE cart SET qty = '$set' WHERE status = 0 and product_id = '$id_product' and customer_id = '$id_cs'");
			if($update){
				echo "
				<script>
				alert('Successfully Added to Cart!');
				window.location = '../detail-shop.php?id=".$id_product."';
				</script>
				";
				die;
			}
		}else{
	
			$insert = mysqli_query($conn, "INSERT INTO cart VALUES(null,'$id_product','$id_cs', null, '$qty', '$harga',0,'$now')");
			if($insert){
				echo "
				<script>
				alert('Successfully Added to Cart!');
				window.location = '../detail-shop.php?id=".$id_product."';
				</script>
				";
				die;
			}
	
		}
	
	
	
	
	
	
	}

} else {
	echo "
	<script>
	alert('Uppss, Stock Empty!');
	history.back();
	</script>
	";
	die;
}







?>