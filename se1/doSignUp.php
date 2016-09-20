<?php
	session_start();
	if(isset($_SESSION["teacherLoggedIn"]) && $_SESSION["teacherLoggedIn"])
	{
		header("Location: home.php");
		die();
	}

	$x = mysql_connect("localhost" , "root" , "") or die("Host is dead!");
	mysql_select_db("swappy" , $x) or die("Database is dead!");
	// database connected

	$name = mysql_real_escape_string($_POST["name"]); // the name entered by user.
	$email = mysql_real_escape_string($_POST["email"]); // the email entered by user.
	$pass = mysql_real_escape_string($_POST["pass"]); // the password entered by user.
	$pass = md5($pass); // encryption of password.

	$checkIfAlreadyRegistered = mysql_query("SELECT * FROM `teacher` WHERE `teacherID` = '$email'");

	if(mysql_num_rows($checkIfAlreadyRegistered) == 1)
	{
		// user already exists. Notify to login instead.
		header("Location: signup.php?error=1");
		die();
	}
	else
	{
		// new user. lets sign him/her up.
		$storeData = mysql_query("INSERT INTO `teacher`(`teacherID`,`password`,`teacherName`) VALUES('$email' , '$pass' , '$name')");
		$_SESSION["teacherLoggedIn"] = $email;
		header("Location: home.php");
		die();
	}
?>