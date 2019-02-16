<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background-color: #ededed;">
	<?php
		
		
		if(isset($_GET['a'])){
			echo "Login Failed. Please try again";
		}
		if(isset($_SESSION['type'])){			
			header("Location:".$_SESSION['type'].".php");
		}
	?>	
	<div style="margin-left: 30%;margin-top: 6%">
		<h1 style="margin-left: 17%;margin-bottom: 2%">Login</h1>
		<form style="margin-left: 100px;" action="check.php" method="post">
			<div class="form-group">
			    <label for="uname">Email</label>
			    <input type="email" class="form-control"  name="email" placeholder="Enter your email" style="width: 30%">			    
			</div>
			<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control"  name="password" placeholder="Password" style="width: 30%">
			</div>

			<div class="form-group">
		      <label for="loginType">Login Type</label>
		      <select name="account" class="form-control" style="width: 20%">
		        <option selected>Choose...</option>
		        <option value="admin">Admin</option>
				<option value="student">Student</option> 
				<option value="teacher">Teacher</option>			  
			  </select><br>
		    </div>			  
		    <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block" style="width: 20%;">Log In</button><br>
		</form>
		<div style="margin-left:10%;">
		    <h2 style="margin-left: 10%;margin-bottom: 2%">Register Here</h2><br>
		    <form action="teacher_reg.php" style="margin-bottom: 2%">		    	
		    	<button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block" style="width: 20%;">For Teacher</button>
			</form>
			<form action="student_reg.php">
		    	<button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block" style="width: 20%;">For Student</button><br>
			</form>		
		</div>
	</div>
</body>
</html>