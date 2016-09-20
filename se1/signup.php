<?php
	session_start();
	if(isset($_SESSION["teacherLoggedIn"]) && $_SESSION["teacherLoggedIn"])
	{
		header("Location: home.php");
		die();
	}

	$isError = 0;
	if(isset($_GET["error"]))
		$isError = $_GET["error"];
?>


<!DOCTYPE html>
<html>
	<header>
		<link rel = "stylesheet" href = "bootstrap/css/bootstrap.css" />
		<title> SignUp | SES </title>
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

		<div id = "aboutUs" class = "well-lg well">
			<center><h3> Teacher Sign Up </h3><br/></center>

			<?php
			// this chunk of code shows an error box for already registered user.
			if($isError)
			{
				echo "<div id = 'errorBox' class = 'alert alert-danger'>";
				echo "<center><strong>Account already exists!</strong> The email you provided is already linked to an active account.</center>";
				echo "</div>";
			}
			?>

			<form action = "doSignUp.php" method = "POST" style = "margin-left:20%;" class="form-horizontal">
				<div class="control-group">
    					<label class="control-label" for="inputName"><b>Name</b></label>
	    				<div class="controls">
      					<input type="text" required = "required" name = "name" class="input-xlarge" id="inputName" placeholder="Your Name">
    					</div>
  				</div>
  				<div class="control-group">
    					<label class="control-label" for="inputEmail"><b>Email Id</b></label>
	    				<div class="controls">
      					<input type="email" required = "required" name = "email" class="input-xlarge" id="inputEmail" placeholder="Your Email">
    					</div>
  				</div>
  				<div class="control-group">
    					<label class="control-label" for="inputPassword"><b>Password</b></label>
    					<div class="controls">
      					<input type="password" required = "required" name = "pass" class="input-xlarge" id="inputPassword" placeholder="Password">
    					</div>
  				</div>
  				<div class="control-group">
    					<div class="controls"> 
      					<button type="submit" class="btn btn-danger btn-large">Sign Up</button>
    					</div>
  				</div>
			</form>
		</div>

		<div id = "footer">
			<hr/>
			<center>&copy; 2015 : Satish Kumar , Swapnil Jain and Himanshu Jaju.</center>
		</div>
	</body>
</html>
