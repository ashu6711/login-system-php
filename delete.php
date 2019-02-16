<?php
require("db_connect.php");

$email=$_GET['email'];
$type=$_GET['type'];



if($type=='student')
{
	$sql="DELETE FROM student_reg where email='$email'";
	mysqli_query($connect,$sql);
	$sql1="DELETE FROM login_table WHERE email='$email'";
	mysqli_query($connect,$sql1);
	header('location:admin.php');

}
elseif($type=='teacher'){
	$sql="DELETE FROM teacher_reg where email='$email'";
	mysqli_query($connect,$sql);
	$sql1="DELETE FROM login_table WHERE email='$email'";
	mysqli_query($connect,$sql1);
	header('location:admin.php');
}
else{
	echo "Not deleted";
	mysqli_error($connect);
	}
?>
