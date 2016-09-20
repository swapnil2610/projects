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
    <body>
    <header><img src="msr.jpeg"></header>
    <nav><marquee><h1>ELECTION FOR CLASS REPRESENTATIVE</h1></marquee></nav>
     <section id="admin" class="animated wow bounceInDown" data-wow-delay="0s">
        <h2>ADMIN LOGIN</h2><br>
    <form action="index.php" method="post">

        <br>USER NAME:
        <input type="password" name="name" placeholder="name" id="usr" required="required" style="border-radius:20px;">
        <br><br>PASSWORD:
        <input type="password" name="password" placeholder="password" id="pw" required="required" style="border-radius:20px;">
<br><br><br>
<input type="image" src="login.jpeg" alt="Submit" width="100px" height="50px" style="border-radius:20px;" class="animated wow bounceInUp">
    </form> </section>
<footer><br>  CONTACT: 9035493798<BR>
     <?php echo "COPYRIGHT&copy SWAPNIL JAIN"; ?></footer>
</body>
    </html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $name = mysql_real_escape_string($_POST['name']);
    $password = mysql_real_escape_string($_POST['password']);
    if($name=="swapnil jain" && $password=="1ms13cs121")
    { $_SESSION['user'] = $name;
          Print '<script>alert("LOGIN SUCCESS!");</script>'; // Prompts the user
    Print '<script>window.location.assign("admin.php");</script>'; // redirects to 
    }
    else
    {
          Print '<script>alert("login failed!");</script>'; // Prompts the user
    Print '<script>window.location.assign("index.php");</script>'; // redirects to 
    } 
}?>