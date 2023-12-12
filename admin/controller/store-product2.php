<?php 
//Databse Connection file
include '../../connection/connection.php';

  	//getting the post values
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
   $ppic=$_FILES["files"]["name"];
// get the image extension
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$imgnewfile);
// Query for data insertion
$query=mysqli_query($con, "insert into product(id,category_id, name, price, stock, description, image) value(null,'$category_id','$name', '$price', '$stock', '$description','$imgnewfile' )");
if ($query) {
echo "<script>alert('You have successfully inserted the data');</script>";
echo "<script type='text/javascript'> document.location ='../product.php'; </script>";
} else{
echo "<script>alert('Something Went Wrong. Please try again');</script>";
}}

?>