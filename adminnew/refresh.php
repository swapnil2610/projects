<?php
sleep(5);
	session_start();
	 if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
	//$username = $_POST['username'];
	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("first_db") or die("Cannot connect to database");
	 $query = mysql_query("SELECT * from users ");
	 	$c= "";
	 while($row = mysql_fetch_assoc($query)) 
	 {
	 	$username = $row['username'];
	     $c=0;
	 	 mysql_query("UPDATE users SET count='$c',choice='$c' WHERE username='$username'") ;	
	 }
	  header("location: out.php"); 
	 ?>