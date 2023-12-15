<?php 
include '../../connection/connection.php';

$id = $_POST['id'];
$name = $_POST['category_name'];

$edit = mysqli_query($conn, "UPDATE category SET category_name = '$name' WHERE id = '$id' ");

if($edit){
    echo "
    <script>
    alert('Data Successfully Added!');
    window.location = '../category.php';
    </script>
    ";
}







?>