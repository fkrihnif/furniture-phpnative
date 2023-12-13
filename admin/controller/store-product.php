<?php 
include '../../connection/connection.php';

$category_id = $_POST['category_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$nama_gambar = $_FILES['files']['name'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$eror = $_FILES['files']['error'];
$type = $_FILES['files']['type'];


if($eror === 4){
	echo "
	<script>
	alert('TIDAK ADA GAMBAR YANG DIPILIH');
	window.location = '../add-product.php';
	</script>
	";
	die;
}

$ekstensiGambar = array('jpg','jpeg','png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

if(!in_array($ekstensiGambarValid, $ekstensiGambar)){
	echo "
	<script>
	alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
	window.location = '../add-product.php';
	</script>
	";
	die;
}

if($size_gambar > 1000000){
	echo "
	<script>
	alert('UKURAN GAMBAR TERLALU BESAR');
	window.location = '../add-product.php';
	</script>
	";
	die;
}

$namaGambarBaru = uniqid();
$namaGambarBaru.=".";
$namaGambarBaru.=$ekstensiGambarValid;

if (move_uploaded_file($tmp_file, "../../image/product/".$namaGambarBaru)) {

	$result = mysqli_query($conn, "INSERT INTO product VALUES(null,'$category_id','$name','$price','$stock','$description','$namaGambarBaru')");

	if($result){
		echo "
		<script>
		alert('Data Successfully Added!');
		window.location = '../product.php';
		</script>
		";
	}


}




?>