<?php
	session_start();
	if(!(isset($_SESSION["teacherLoggedIn"]) && $_SESSION["teacherLoggedIn"]))
	{
		header("Location: login.php");
		die();
	}

	if(!isset($_POST["subject"]) or strlen(trim($_POST["subject"])) == 0)
	{
		header("Location: home.php");
		die();
	}

	$x = mysql_connect("localhost" , "root" , "") or die("Host is dead!");
	mysql_select_db("swappy" , $x) or die("Database is dead!");
	// database connected

	$subject = mysql_real_escape_string(trim($_POST["subject"])); // the subject entered by the teacher.
	$teacherID = $_SESSION["teacherLoggedIn"]; // kaun logged in hai

	$query = mysql_query("SELECT * FROM `teacher` WHERE `teacherID` = '$teacherID' AND `subject` IS NULL");
	if(mysql_num_rows($query) == 0)
	{
		header("Location: home.php");
		die();
	}
	//reaching here safely

	$query = mysql_query("UPDATE `teacher` SET `subject` = '$subject' WHERE `teacherID` = '$teacherID' ");
	// teacher database mei update ho gaya.
	$subject = trim($_POST["subject"]);
	// create a database with subject name.

	$query = "CREATE TABLE IF NOT EXISTS `$subject` (";
	$query = $query."`usn` int(11) NOT NULL AUTO_INCREMENT,";
	$query = $query."`internalOne` int(2) DEFAULT NULL,";
	$query = $query."`internalTwo` int(2) DEFAULT NULL,";
	$query = $query."`internalThree` int(2) DEFAULT NULL,";
	$query = $query."PRIMARY KEY(`usn`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
	mysql_query($query) or die(mysql_error());

	header("Location: home.php");
	die();
?>