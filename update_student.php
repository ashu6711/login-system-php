<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background-color: #ededed;">		
	<div style="margin-left: 30%;margin-top: 6%">

<?php
require("db_connect.php");
$email=$_GET['email'];

$sql="select name,course,address from student_reg where email='$email'";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);
?>

<form action="stu_update.php?email=<?=$email?>" method="post">
	<div class="form-group">				
		<label for="email">Email</label>
		<input required type="Text" class="form-control"  name="email" value=<?=$email;?> style="width: 30%" disabled>			    
	</div>
	<div class="form-group">				
		<label for="name">Name</label>
		<input required type="Text" class="form-control"  name="name" value=<?=$row['name'];?> style="width: 30%">			    
	</div>
	<div class="form-group">				
		<label for="address">Address</label>
		<input required type="Text" class="form-control"  name="address" value=<?=$row['address'];?> style="width: 30%">		    
	</div>
	<div class="form-group">				
		<label for="course">Course</label>
		<input required type="Text" class="form-control"  name="course" value=<?=$row['course'];?> style="width: 30%">		    
	</div>
	<button type="submit" name="submit" value="UPDATE" class="btn btn-lg btn-primary btn-block" style="width: 20%;">
		Submit
	</button>	
</form>
</div>
</body>
</html>


