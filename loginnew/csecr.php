<!DOCTYPE html>
<head>
	<title>election</title>

<link rel = "stylesheet" type = "text/css" href="election.css">
          <link rel="stylesheet" type="text/css" href="bootstrap.css"/>

   <link rel="stylesheet" type="text/css" href="main.css"/>
  <link rel="stylesheet" type="text/css" href="animate.css"/>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="wow.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



</head>
 <?php session_start();
 if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
$user = $_SESSION['user'];
  ?>
<body>
	<header><img src="msr.jpeg"></header>
	<nav><marquee><h1>ELECTION FOR CLASS REPRESENTATIVE OF CSE</h1></marquee></nav>

	<section id="can1"><br><br>
<h2><?php echo"CAST YOUR VOTE:".$user;?></h2>
		<br><h2>CANDIDATES:</h2><br>
			<form action="csecr.php" method="post">
<input type="radio" name="id" value="1"><img src="can1.jpeg"  width="150px" height="150px"  style="border-radius:200px;"  class="imb">
<input type="radio" name="id" value="2"><img src="can2.jpeg" width="150px" height="150px"  style="border-radius:300px;"  class="imb"><br>

<br><br><br>
<input type="image" src="submit.jpeg" alt="Submit" width="100px" height="50px" style="border-radius:300px;" class="animated wow bounceInDown">
</form>
		</section>
		<footer><br>
     <?php echo "COPYRIGHT&copy SWAPNIL JAIN"; ?></footer>
</body>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	$id = $_POST['id'];
	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("SELECT * from counting WHERE id='$id'"); //Query the users table if there are matching rows equal to $username
	$exists = mysql_num_rows($query); //Checks if username exists
    $v="";
if($exists > 0)
{
	while($row = mysql_fetch_assoc($query)) //display all rows from query
		{   $v=$row['vote'];
			$table_users = $row['name']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['username']; // the first password row is passed on to $table_users, and so on until the query is finished
		    $id_c=$row['id'];
		}

		$v=$v+1;
	//	$_SESSION['user'] = $username; 
	    mysql_query("UPDATE counting SET vote='$v' WHERE id='$id_c'") ;
	    mysql_query("UPDATE users SET choice=' $id_c'WHERE username='$user'");
       
       Print '<script>alert("YOUR CHOICE IS LOCKED");</script>'; //Prompts the user
		// header("location:index.php");
		//Print '<script>window.location.assign("logout.php");</script>';
 header("location: out.php"); 

}}?>