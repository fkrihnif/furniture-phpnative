<?php 
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['id_cs']);

	session_destroy();
	header('location:../login.php');
 ?>