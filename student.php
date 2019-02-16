<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background-color: #ededed;">
<div>
	<?php		
		session_start();	
		$user=$_SESSION['email'];
		$pass=$_SESSION['password'];
		$account=$_SESSION['type'];
		
		if(isset($_POST['submit']))
			{
				session_destroy();
				header('location:login.php');
			}
			if (isset($account) and $account=='student'){
			require("db_connect.php");
			$user=$_SESSION['email'];
			$pass=$_SESSION['password'];
			$account=$_SESSION['type'];
			$query="SELECT * FROM student_reg WHERE email='$user'";		
			$result=mysqli_query($connect,$query);		
			$row=mysqli_fetch_assoc($result);

			$uploadDirectory="/Image_student/"; // folder where images are stored
			 


			$query1="select photo from student_reg where email='$user'";

			$result1=mysqli_query($connect,$query1); // retive the image name from dattabse2  
			$row1=mysqli_fetch_row($result1);
			$baseurl="http://localhost/Project";
	?>
			<img src="<?=$baseurl.$uploadDirectory.$row1[0];?>" style="width: 200px;height: auto;margin-left: 40%" ><br><br>
			<p style="margin-left: 40%">	<?php echo "Name: ".$row['name']; ?></p>
			<p style="margin-left: 40%">	<?php echo "Course: ".$row['course']; ?></p>
			<p style="margin-left: 40%">	<?php echo "Address: ".$row['address']; ?> </p>
			<p style="margin-left: 40%">	<?php echo "Email: ".$row['email']; ?></p>
			<p style="margin-left: 40%">	<?php echo "Password: ".$pass; ?></p>
	<?php 
		} 
		else{
			header("Location: login.php");
		}
	?>
		
	<form action="#" method="post">		
	<input type="submit" name="submit" value="logout" class="btn btn-lg btn-primary btn-block" style="width:10%;margin-left: 40%"></button>			
	</form>
</div>
</body>
</html>