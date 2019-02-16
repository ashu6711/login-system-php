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
		if (isset($account) and $account=='admin'){
		require("db_connect.php");
		echo "<h1 style='text-align: center;'>Welcome to Admin Page</h1>";		
		$query='SELECT * FROM student_reg';
		$result=mysqli_query($connect,$query);
?>
<h2 style="margin-left: 5%">Student Data</h2>
<table border="1px" class="table table-striped" style="margin-left: 5%;width: 90%;margin-top: 2%;">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Course</th>
		<th>Address</th>
		<th>Email</th>
		<th>Update</th>
		<th>Delete</th>		
	</tr>
	<?php
	while ($row=mysqli_fetch_assoc($result)){
	?>
	<tr>
		<td><?php echo $row['student_id']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['course']; ?></td>		
		<td><?php echo $row['address']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><a href="delete.php?email=<?=$row['email']?>&type=student">DELETE</a></td>
		<td><a href="update_student.php?email=<?=$row['email']?>">UPDATE</a></td>		
	</tr>
	<?php } ?>
</table><br><br>
	<?php 
		$query='SELECT * FROM teacher_reg';
		$result=mysqli_query($connect,$query);
	?>
<h2 style="margin-left: 5%">Teacher Data</h2>
<table border="1px" class="table table-striped" style="margin-left: 5%;width: 90%;margin-top:2%;">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Department</th>
		<th>Address</th>
		<th>Salary</th>
		<th>Email</th>
		<th>Update</th>
		<th>Delete</th>		
	</tr>
	<?php
	while ($row=mysqli_fetch_assoc($result)){?>
	<tr>
		<td><?php echo $row['teacher_id']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['department']; ?></td>
		<td><?php echo $row['address']; ?></td>
		<td><?php echo $row['salary']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><a href="delete.php?email=<?=$row['email']?>&type=teacher">DELETE</a></td>
		<td><a href="update_teacher.php?email=<?=$row['email']?>">UPDATE</a></td>		
	</tr>
	<?php } }?>
</table>		
<form action="#" method="post">		
<input type="submit" name="submit" value="logout" class="btn btn-lg btn-primary btn-block" style="width:10%;margin-left: 40%"></button></form>
</div>
</body>
</html>