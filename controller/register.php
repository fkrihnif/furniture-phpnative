<?php 
include '../connection/connection.php';

$nama = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$konfirmasi = $_POST['konfirmasi'];


$hash = password_hash($password, PASSWORD_DEFAULT);

if($password == $konfirmasi){
	$cek = mysqli_query($conn, "SELECT username from customer where username = '$username'");;
	$jml = mysqli_num_rows($cek);

	if($jml == 1){
		echo "
		<script>
		alert('Username Has Been Used');
		window.location = '../register.php';
		</script>
		";
		die;
	}

	$result = mysqli_query($conn, "INSERT INTO customer VALUES(null ,'$nama', '$email', '$username', '$hash')");
	if($result){
		echo "
		<script>
		alert('Register Success!');
		window.location = '../login.php';
		</script>
		";
	}

}else{
	echo "
	<script>
	alert('Confirm Password Not Same');
	window.location = '../register.php';
	</script>
	";
}


?>