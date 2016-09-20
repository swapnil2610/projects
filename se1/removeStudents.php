<?php
	session_start();
	if(!(isset($_SESSION["teacherLoggedIn"]) && $_SESSION["teacherLoggedIn"]))
	{
		header("Location: login.php");
		die();
	}

	if(!isset($_POST["start"]) or strlen(trim($_POST["start"])) == 0 or !isset($_POST["end"]) or strlen(trim($_POST["end"])) == 0)
	{
		header("Location: home.php");
		die();
	}

	$x = mysql_connect("localhost" , "root" , "") or die("Host is dead!");
	mysql_select_db("swappy" , $x) or die("Database is dead!");
	// database connected

	$teacherID = $_SESSION["teacherLoggedIn"]; // kaun logged in hai

	$subjectQ = mysql_query("SELECT `subject` FROM `teacher` WHERE `teacherID` = '$teacherID' ");
	$subjectQ = mysql_fetch_array($subjectQ);
	$subject = $subjectQ["subject"];

	$startRange = $_POST["start"];
	$endRange = $_POST["end"];

	for($i = $startRange; $i <= $endRange; $i++)
	{
		$query = "DELETE FROM `" .$subject. "` WHERE `usn` = '$i'";
		mysql_query($query);
	}

	header("Location: home.php");
	die();
?>