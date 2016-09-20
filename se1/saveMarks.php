<?php
	session_start();
	if(!(isset($_SESSION["teacherLoggedIn"]) && $_SESSION["teacherLoggedIn"]))
	{
		header("Location: login.php");
		die();
	}

	$x = mysql_connect("localhost" , "root" , "") or die("Host is dead!");
	mysql_select_db("swappy" , $x) or die("Database is dead!");
	// database connected

	$teacherID = $_SESSION["teacherLoggedIn"]; // kaun logged in hai

	$subjectQ = mysql_query("SELECT `subject` FROM `teacher` WHERE `teacherID` = '$teacherID' ");
	$subjectQ = mysql_fetch_array($subjectQ);
	$subject = $subjectQ["subject"];

	$Q = mysql_query("SELECT `usn` FROM `".$subject."`");
	while($row = mysql_fetch_row($Q))
	{
		$usn = $row[0];
		$m1 = $_POST[$usn."ONE"];
		$m2 = $_POST[$usn."TWO"];
		$m3 = $_POST[$usn."THREE"];
		$ins = mysql_query("UPDATE `".$subject."` SET `internalOne` = ".$m1." , `internalTwo` = ".$m2." , `internalThree` = ".$m3." WHERE `usn` = '$usn' ");
	}

	header("Location: home.php");
	die();
?>