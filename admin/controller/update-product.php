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

$product_id = $_POST['product_id'];


// if($eror === 4){
// 	echo "
// 	<script>
// 	alert('TIDAK ADA GAMBAR YANG DIPILIH');
// 	window.location = '../add-product.php';
// 	</script>
// 	";
// 	die;
// }

$ekstensiGambar = array('jpg','jpeg','png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

// if(!in_array($ekstensiGambarValid, $ekstensiGambar)){
// 	echo "
// 	<script>
// 	alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
// 	window.location = '../add-product.php';
// 	</script>
// 	";
// 	die;
// }

// if($size_gambar > 1000000){
// 	echo "
// 	<script>
// 	alert('UKURAN GAMBAR TERLALU BESAR');
// 	window.location = '../add-product.php';
// 	</script>
// 	";
// 	die;
// }

$namaGambarBaru = uniqid();
$namaGambarBaru.=".";
$namaGambarBaru.=$ekstensiGambarValid;

if ($nama_gambar != null) {
    //if image exist
    $produk = mysqli_query($conn, "SELECT * FROM product where id ='$product_id'");
    $row = mysqli_fetch_assoc($produk);
    unlink("../../image/product/".$row['image']);
    // $edit = mysqli_query($conn, "UPDATE cart SET qty = '$qty' where id = '$id_keranjang'");

    if (move_uploaded_file($tmp_file, "../../image/product/".$namaGambarBaru)) {
        $edit = mysqli_query($conn, "UPDATE product SET category_id = '$category_id', name = '$name', price = '$price', stock = '$stock', description = '$description', image = '$namaGambarBaru' WHERE id = '$product_id' ");
    
        if($edit){
            echo "
            <script>
            alert('Product Updated Successfully!');
            window.location = '../product.php';
            </script>
            ";
        }
    }

} else {
    $edit = mysqli_query($conn, "UPDATE product SET category_id = '$category_id', name = '$name', price = '$price', stock = '$stock', description = '$description' WHERE id = '$product_id' ");

    if($edit){
        echo "
        <script>
        alert('Product Updated Successfully!');
        window.location = '../product.php';
        </script>
        ";
    }
}


?>