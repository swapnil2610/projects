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

	$email = mysql_real_escape_string($_POST["email"]); // the email entered by user.
	$pass = mysql_real_escape_string($_POST["pass"]); // the password entered by user.
	$pass = md5($pass); // encryption of password.

	$query = mysql_query("SELECT * FROM `teacher` WHERE `teacherID` = '$email' AND `password` = '$pass'");

	if(mysql_num_rows($query) == 0)
	{
		// we didnt find the user. Redirect to login page with error.
		header("Location: login.php?error=1");
		die();
	}
	else
	{
		// we found the user. Log him in and redirect to home page.
		$_SESSION["teacherLoggedIn"] = $email;
		header("Location: home.php");
		die();
	}
?>