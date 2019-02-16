<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background-color: #ededed;">		
	<div style="margin-left: 30%;margin-top: 6%">
		<h1 style="margin-left: 3%;margin-bottom: 2%">Teacher Registeration Form</h1>
			
  			
		<form style="margin-left: 100px;" action="teacher_db_insert.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				
			    <label for="name">Full Name</label>
			    <input type="Text" class="form-control"  name="name" placeholder="Enter your name" style="width: 30%" required>			    
			</div>
			<div class="form-group">
			    <label for="course">Department</label>
			    <input type="text" class="form-control"  name="department" placeholder="Department" style="width: 30%" required>
			</div>

			<div class="form-group">
			    <label for="address">Address</label>
			    <input type="text" class="form-control"  name="address" placeholder="Address" style="width: 30%" required>
			</div>

			<div class="form-group">
			    <label for="address">Salary</label>
			    <input type="text" class="form-control"  name="salary" placeholder="Salary" style="width: 30%" required>
			</div>

			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control"  name="email" placeholder="Address" style="width: 30%" required>
			</div>

			<div class="form-group">
			    <label for="password">Password</label>
			    <input type="text" class="form-control"  name="password" placeholder="Address" style="width: 30%" required>
			</div>

			<input type="hidden" name="type" value="teacher">

			<label for="photo">Upload your photo</label>
			<input type="file" name="upload" required/><br><br>			
		    <button type="submit" name="submit" value="uploadImage" class="btn btn-lg btn-primary btn-block" style="width: 20%;">Submit</button><br>
		</form>
		
</body>
</html>