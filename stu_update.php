<?php
require("db_connect.php");

$name=$_POST['name'];
$address=$_POST['address'];
$course=$_POST['course'];
$email=$_GET['email'];
echo $email;
$sql="update student_reg set name='$name',address='$address', course='$course' where email='$email'";
if(mysqli_query($connect,$sql))
{
	header('location:Admin.php');
}
else{
	echo "Not updated";
	mysqli_error($connectivity);
	}
?>
