<?php 
	Session_start();
	require("db_connect.php");
	$username=$_POST['email'];
	$password=$_POST['password'];
	$account=$_POST['account'];
	echo $username;

	$query="SELECT * FROM login_table where email='$username' AND password='$password' AND type='$account'";	
	$result=mysqli_query($connect,$query);
	$row=mysqli_fetch_assoc($result);
	print_r($row);
	

	if (isset($row)) {		
		$_SESSION['email']=$username;
		$_SESSION['password']=$password;
		$_SESSION['type']=$account;
		header("Location: $account.php");
		exit();
	}
	elseif($username=='admin@admin.com' and $password=='admin' and $account='admin'){
		$_SESSION['email']=$username;
		$_SESSION['password']=$password;
		$_SESSION['type']=$account;
		echo $_SESSION['type'];
		header("Location: admin.php");
		
	}
	else{
		header('Location: login.php?a=invalid_credentials');
	}
?>