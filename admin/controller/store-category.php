<?php 
include '../../connection/connection.php';

$name = $_POST['category_name'];

$result = mysqli_query($conn, "INSERT INTO category VALUES(null,'$name')");

if($result){
    echo "
    <script>
    alert('Data Successfully Added!');
    window.location = '../category.php';
    </script>
    ";
}







?>