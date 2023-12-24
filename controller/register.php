<?php 
include '../connection/connection.php';

$nama = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$konfirmasi = $_POST['konfirmasi'];


$hash = password_hash($password, PASSWORD_DEFAULT);

if($password == $konfirmasi){
	$cek = mysqli_query($conn, "SELECT username from customer where username = '$username'");
	$jml = mysqli_num_rows($cek);

	$cek_email = mysqli_query($conn, "SELECT email from customer where email = '$email'");
	$jml_email = mysqli_num_rows($cek_email);
	if($jml == 1){
		echo "
		<script>
		alert('Username Has Been Used');
		window.location.href = '../register.php';
		</script>
		";
		die;
	}

	if($jml_email == 1){
		echo "
		<script>
		alert('Email Has Been Used');
		window.location.href = '../register.php';
		</script>
		";
		die;
	}

	$result = mysqli_query($conn, "INSERT INTO customer VALUES(null ,'$username', '$email', '$nama', '$hash')");
	if($result){
		echo "
		<script>
		alert('Register Success!');
		window.location.href = '../login.php';
		</script>
		";
		die;
	}

}else{
	echo "
	<script>
	alert('Confirm Password Not Same');
	window.location.href = '../register.php';
	</script>
	";
	die;
}


?>