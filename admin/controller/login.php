<?php 
session_start();
include '../../connection/connection.php';
$username = $_POST['username'];
$pass = $_POST['password'];

// cek user
$result = mysqli_query($conn, "SELECT * FROM admin where username = '$username'");
$row = mysqli_fetch_assoc($result);
$user = $row['username'];
$ps = $row['password'];
if($username == $user){
	if(password_verify($pass, $ps)){
		$_SESSION["admin"] = true;
		$_SESSION['username'] = $row['username'];
		header('location:../index.php');
	}
	else{
		echo "
		<script>
		alert('Username/Password Incorrect');
		window.location = '../login.php';
		</script>
		";
		die;
	}
}
else{
	echo "
	<script>
	alert('Username/Password Incorrect');
	window.location = '../login.php';
	</script>
	";
	die;
}

?>