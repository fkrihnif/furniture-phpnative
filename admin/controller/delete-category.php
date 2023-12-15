<?php 
include '../../connection/connection.php';

$id = $_GET['id'];

$del = mysqli_query($conn, "DELETE FROM category WHERE id = '$id'");

if($del){
	echo "
	<script>
	alert('Data Deleted Successfully!');
	window.location = '../category.php';
	</script>
	";
}

?>