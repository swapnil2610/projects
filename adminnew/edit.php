<html>
  <head>
    <title>REGISTER</title>
    <link rel = "stylesheet" type = "text/css" href="election.css">
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
    <p><a href="admin.php"><img src="back.jpeg" width="50px" height="50px"></a></p></nav>
  <section id="reg">
   <BR> <br><h2>ENTER YOUR DETAIL BELOW</h2>
   
    <form action="edit.php" method="post">
      ENTER OLD USERNAME: <input type="text" name="cse" placeholder="" id="cse" width="100px" height="50px" style="border-radius:20px; "><br><br>
      ENTER NAME :   <input type="text" name="name"  placeholder="firstname" required="required" style="border-radius:20px;"/> <br><br>
      ENTER USN :    <input type="text" name="usn" placeholder="1ms13cs121" required="required" style="border-radius:20px;"/> <br><br>
      

      <input type="image" src="submit.jpeg" alt="Submit" width="100px" height="50px" style="border-radius:20px;" class="animated wow bounceInDown">
    </form>

  </section>
  <footer><br>
     <?php echo "COPYRIGHT&copy SWAPNIL JAIN"; ?></footer>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $name = mysql_real_escape_string($_POST['name']);
  $username = mysql_real_escape_string($_POST['usn']);
  $oldusername = mysql_real_escape_string($_POST['cse']);
   //$c = mysql_real_escape_string($_POST['c']);
  $password=rand(100000,999999);
  

    $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("Select * from users WHERE username='$oldusername'"); //Query the users table
  if($oldusername==$username)
  {
    mysql_query("UPDATE users SET name='$name',username='$username',password='$password' WHERE username='$oldusername'") ;
    echo "YOUR USERNAME:".$username;
    echo "\n your password:".$password; 
    Print '<script>alert("Successfully updated!");</script>'; // Prompts the user
    Print '<script>window.location.assign("admin.php");</script>'; 
  }
  else{ $query = mysql_query("Select * from users");
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['username']; 
     if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("edit.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysql_query("UPDATE users SET name='$name',username='$username',password='$password' WHERE username='$oldusername'") ;
//Inserts the value to table users
    echo "YOUR USERNAME:".$username;
    echo "\n your password:".$password; 
    Print '<script>alert("Successfully updated!");</script>'; // Prompts the user
    Print '<script>window.location.assign("admin.php");</script>'; // redirects to register.php
  }
}}
?>