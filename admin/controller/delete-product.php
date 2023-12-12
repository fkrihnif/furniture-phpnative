<?php 
include '../../connection/connection.php';

$id = $_GET['id'];
$produk = mysqli_query($conn, "SELECT * FROM product where id ='$id'");
$row = mysqli_fetch_assoc($produk);
unlink("../../image/product/".$row['image']);
$del = mysqli_query($conn, "DELETE FROM product WHERE id = '$id'");

if($del){
	echo "
	<script>
	alert('DATA BERHASIL DIHAPUS');
	window.location = '../product.php';
	</script>
	";
}

?>