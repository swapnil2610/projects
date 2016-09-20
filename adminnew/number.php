


<?php  
 $number = mysql_real_escape_string($_POST['number']);

 mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
   mysql_query("INSERT INTO admin (number) VALUES ('$number')"); 
 header("location: admin.php"); 
?>