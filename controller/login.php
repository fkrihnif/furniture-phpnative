<?php 
session_start();
include '../connection/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM customer where email = '$email'");
$jml = mysqli_num_rows($cek);
$row = mysqli_fetch_assoc($cek);

if($jml ==1){
	if(password_verify($password, $row['password'])){
		$_SESSION['user'] = $row['name'];
		$_SESSION['id_cs'] = $row['id'];
		header('location:../index.php');
	}else{
		echo "
		<script>
		alert('Email/Password Incorrect');
		window.location = '../login.php';
		</script>
		";
		die;
	}
}else{
	echo "
	<script>
	alert('Email/Password Incorrect');
	window.location = '../login.php';
	</script>
	";
	die;
}

?>
