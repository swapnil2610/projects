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
		<title> Log In | SES </title>
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
			<center><h3> Teacher Log In </h3><br/></center>

			<?php
			// this chunk of code shows an error box for wrong email / password combo.
			if($isError)
			{
				echo "<div id = 'errorBox' class = 'alert alert-danger'>";
				echo "<center><strong>Wrong Credentials!</strong> The username/password combination entered was incorrect.</center>";
				echo "</div>";
			}
			?>

			<form action = "doLogin.php" method = "POST" style = "margin-left:20%;" class="form-horizontal">
  				<div class="control-group">
    					<label class="control-label" for="inputEmail"><b>Email Id</b></label>
	    				<div class="controls">
      					<input type="email" required="required" name = "email" class="input-xlarge" id="inputEmail" placeholder="Your Email">
    					</div>
  				</div>
  				<div class="control-group">
    					<label class="control-label" for="inputPassword"><b>Password</b></label>
    					<div class="controls">
      					<input type="password" required="required" name = "pass" class="input-xlarge" id="inputPassword" placeholder="Password">
    					</div>
  				</div>
  				<div class="control-group">
    					<div class="controls"> 
      					<button type="submit" class="btn btn-success btn-large">Log In</button>
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
