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



  </head>

<?php  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value?>
  <body>
    <header><img src="msr.jpeg"></header>
  <nav><marquee><h1>ELECTION FOR CLASS REPRESENTATIVE OF CSE</h1></marquee>
    
  </nav>
  
  <section id="reg2" class="animated wow bounceInLeft" data-wow-delay="0s">
    <br><br><h2>CANDIDATES LIST</h2><br><br>
  <a href="http://localhost/phpmyadmin/sql.php?db=first_db&table=counting&printview=1&sql_query=SELECT+%2A+FROM+%60counting%60&pftext=F&token=0ef3a974e178d86ff070d32eed4d8047"><img src="list.jpeg" width="100px" height="50px"></a><br><br></section>

  <section id= "reg2" class="animated wow bounceInLeft" data-wow-delay="8s"><br><br><h2>VOTERS LIST</h2><br><br>
  <a href="http://localhost/phpmyadmin/sql.php?db=first_db&table=users&printview=1&sql_query=SELECT+%2A+FROM+%60users%60&pftext=F&token=f86a8a83341738b40106427a6ba6b99e"><img src="list.jpeg" width="100px" height="50px"></a>
<br><br><br><br><a href="password.php">CHANGE PASSWORD</a></section>
 
  <section id ="reg3" class="animated wow bounceInDown" data-wow-delay="0s">
<h2>REGISTRATION OF CANDIDATES</h2><br><br>
<form action="admin.php" method="post">
      ENTER NAME : <input type="text" name="name"  placeholder="firstname" required="required" style="border-radius:20px;"/> <br><br>
      ENTER USN : <input type="text" name="usn" placeholder="1ms13cs121" required="required" style="border-radius:20px;"/> <br><br>
       <input type="image" src="submit.jpeg" alt="Submit" width="100px" height="50px" style="border-radius:20px;">
    </form><br><br>
    <h2>SEARCH BY USERNAME/NAME</h2><br><br>
    <form action="search1.php" method="post">
      ENTER : <input type="text" name="name/id"  placeholder="firstname" required="required" style="border-radius:20px;"/> <br><br>
  <input type="image" src="submit.jpeg" alt="Submit" width="100px" height="50px" style="border-radius:20px;"></form>
  </section>

  <section id="reg2" class="animated wow bounceInRight" data-wow-delay="8s"><br><br><h2>REFRESH</h2><br><br>
<form action="refresh.php" method="post">
 <input type="image" src="refresh.jpeg" alt="Submit" width="100px" height="50px" style="border-radius:20px; ">
</form><br><p>

</section>

<section id="reg2" class="animated wow bounceInRight" data-wow-delay="0s"><br><br><h2>RESULT</h2><br><br>
<form action="result.php" method="post">
<input type="image" src="result.jpeg" alt="Submit" width="100px" height="50px" style="border-radius:20px; ">
</form>
</section>
<footer>
  <br><p><a href="out.php"><h1>BACK</h1></a></p></a></p>
     <?php echo "COPYRIGHT&copy SWAPNIL JAIN"; ?></footer>
</body>
  <?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = mysql_real_escape_string($_POST['name']);
  $username = mysql_real_escape_string($_POST['usn']);
 
  
    $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("Select * from counting"); //Query the users table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("YOU ALREADY REGISTERED");</script>'; //Prompts the user
      Print '<script>window.location.assign("admin.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysql_query("INSERT INTO counting (name,username) VALUES ('$name','$username')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("admin.php");</script>'; // redirects to register.php
  }
}
?>
