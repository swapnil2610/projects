<?php
	session_start();
	if(isset($_SESSION["teacherLoggedIn"]) && $_SESSION["teacherLoggedIn"])
	{
		header("Location: home.php");
		die();
	}
?>


<!DOCTYPE html>
<html>
	<header>
		<link rel = "stylesheet" href = "bootstrap/css/bootstrap.css" />
		<title> Welcome To SES </title>
		<script src = "js/jquery.js"></script>
		<script src = "js/bootstrap.js"></script>
		<meta charset="UTF-8">
	</header>

	<body>
		<div class = "container">
			<img src = "bootstrap/img/logo.png" style = "margin-top:10px; height : 100px; width : 1500px" />
			<div class="navbar" style = "margin-top : 20px;">
  				<div class="navbar-inner">
    				<a class="brand" href="index.php">Student Examination System</a>
      				<a style = "float:right;" class="btn btn-success" href="login.php">Login</a>
      				<a style = "margin-right:8px;float:right;" class="btn btn-danger" href="signup.php">Sign Up</a>
  			</div>
		</div>


		<div id = "footer">
			<hr/>
			<center>&copy; 2015 : Satish Kumar , Swapnil Jain and Himanshu Jaju.</center>
		</div>
	</body>
</html>
