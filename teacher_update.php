<?php
require("db_connect.php");

$name=$_POST['name'];
$address=$_POST['address'];
$dept=$_POST['department'];
$email=$_GET['email'];
$salary=$_POST['salary'];
$sql="update teacher_reg set name='$name',address='$address', department='$dept', salary=$salary where email='$email'";
if(mysqli_query($connect,$sql))
{
	header('location:Admin.php');
}
else{
	echo "Not updated";
	mysqli_error($connectivity);
	}
?>
