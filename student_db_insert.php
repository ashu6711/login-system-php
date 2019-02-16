<?php 
require("db_connect.php");
$tablename="student_reg";


$table= "CREATE TABLE IF NOT EXISTS $tablename(
			student_id int(4) PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(52) NOT NULL,
			course VARCHAR(40) NOT NULL,
			address VARCHAR(52) NOT NULL,
			email VARCHAR(80) NOT NULL,
			photo longblob NOT NULL
		);";
mysqli_query($connect,$table);



$name=mysqli_real_escape_string($connect,$_POST['name']);
$course=mysqli_real_escape_string($connect,$_POST['course']);
$address=mysqli_real_escape_string($connect,$_POST['address']);
$email=mysqli_real_escape_string($connect,$_POST['email']);
$pw=mysqli_real_escape_string($connect,$_POST['password']);
$type=mysqli_real_escape_string($connect,$_POST['type']);

$query2="select email from login_table where email='$email'";
$result2=mysqli_query($connect,$query2);
$row2=mysqli_fetch_assoc($result2);
if(isset($row2)){
	header('location: student_reg.php?message=Account_already_exists');
}

$currentDirectory=getcwd(); // it wii give the working current directory


$uploadDirectory="/Image_student/"; // folder where images are stored
$error=[];
$fileExtensionArray=['jpeg','png','jpg'];
$fileName=$_FILES['upload']['name'];
$fileSize=$_FILES['upload']['size'];
$fileTempName=$_FILES['upload']['tmp_name'];
 
$fileType=$_FILES['upload']['type'];
$extension=explode('.',$fileName);
$fileExtension=strtolower(end($extension));
$uploadPath=$currentDirectory.$uploadDirectory.basename($fileName);
 
if(isset($_POST['submit']))
{
	if(!in_array($fileExtension,$fileExtensionArray))
	{
		$error[]="you can upload only jpeg,jpg,png image";
	}
	
	
	if(empty($error))
	{
		
		 if(move_uploaded_file($fileTempName,$uploadPath)) // upload the image to destination folder
		{
			echo "Image has been uploaded to the floder"."<br>";
		}
		else
		echo "image has not been uploded to the folder";	 
	}
}

$insert="INSERT INTO student_reg(name,course,address,email,photo) VALUES ('$name','$course','$address','$email','$fileName')"; 

$insert_login="INSERT INTO login_table(email,password,type) VALUES ('$email','$pw','$type');";
if(mysqli_query($connect,$insert_login))// store the image in dattabse
{
	echo "login data stored";
}
else
{
	echo mysqli_error($connect);
}
if(mysqli_query($connect,$insert))// store the image in dattabse
{
	echo "image is stored in database";
	header('location: login.php?message=accout_registered');
}
else
{
	echo "image is not stored in database";
}
?>



