<html>
  <head>
    <title>ADMIN</title>
    <link rel = "stylesheet" type = "text/css" href="election.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css"/>

   <link rel="stylesheet" type="text/css" href="main.css"/>
  <link rel="stylesheet" type="text/css" href="animate.css"/>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="wow.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

 

  </head><?php session_start();
 if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
$user = $_SESSION['user'];
  ?>
  <body>
	<header><img src="msr.jpeg"></header>
	<nav><marquee><h1>ELECTION FOR CLASS REPRESENTATIVE OF CSE</h1></marquee>

	</nav>
	<section id ="admin">
		<br>
		<h2>THE DETAILS ARE :</h2><br>
       
<?php


	$username = mysql_real_escape_string($_POST['name/id']);
	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("select * from users "); //Query the users table if there are matching rows equal to $username
	//$exists = mysql_num_rows($query); //Checks if username exists
	$k=0;
//if($exists > 0)
   // {
     while($row = mysql_fetch_array($query)) //display all rows from query
		{   $c=$row['count'];
		    $table_name = $row['name'];
			$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
		if($table_name==$username)
		{$k=1;
		echo "NAME:  ".$table_name;
		echo "\t  USERNAME:  ".$table_users;
		echo " \t PASSWORD:  ".$table_password;
		echo " \t COUNT:  ".$c;
		
	    }
		else if($username==$table_users)
		{$k=1;
		echo "NAME:  ".$table_name;
		echo "\t  USERNAME:  ".$table_users;
		echo " \t PASSWORD:  ".$table_password;
		echo " \t COUNT:  ".$c;
	    }
		
    }//}
if($k==0)
	{
        echo"NO SUCH CANDIDATE!";
		Print '<script>alert("NO SUCH CANDIDATE!");</script>'; //Prompts the user
		Print '<script>window.location.assign("admin.php");</script>';
	}

	?>

      
</section>

<footer><br> <p><a href="edit.php"><h1>CLICK HERE TO EDIT</h1></a></p>
	<br><p><a href="admin.php"><h1>BACK</h1></a></p></a></p>
     <?php echo "COPYRIGHT&copy SWAPNIL JAIN"; ?></footer></body></html>
    