<html>
  <head>
    <title>REGISTER</title>
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
  <nav><marquee><h1>ELECTION FOR CLASS REPRESENTATIVE OF CSE</h1></marquee>
    </nav>
  <section id="reg" class="animated wow bounceInDown" data-wow-delay="0s">
    <br><br><h2>ENTER YOUR DETAIL BELOW</h2>
   
    <form action="register.php" method="post" enctype="multipart/form-data">
      
      ENTER NAME :   <input type="text" name="name1"  placeholder="firstname" required="required" style="border-radius:10px;" /> <br><br>
      ENTER USN :    <input type="text" name="usn" placeholder="1ms13cs121" required="required" style="border-radius:10px;"  /> <br><br>
      Select image to upload:<input type="file" name="image" id="image">

      <input type="image" src="submit.jpeg" name="Submit" width="100px" height="50px" style="border-radius:20px;" >
    </form>

  
</section>
  <footer><br><p><a href="index.php"><h1>BACK</h1></a></p>
     <?php echo "COPYRIGHT&copy SWAPNIL JAIN"; ?></footer>
  </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name1 = mysql_real_escape_string($_POST['name1']);
  $username = mysql_real_escape_string($_POST['usn']);
  
    
  $password=rand(100000,999999);
  
    $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("Select * from users"); //Query the users table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
  
  if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
  {
  echo "please select an image";
    }
    else
    {
    $image=addslashes($_FILES['image']['tmp_name']);
    $name=addslashes($_FILES['image']['name']); 
    $image=file_get_contents($image);
    $image=base64_encode($image); 

  }


    mysql_query("INSERT INTO users (name,username, password,path,imagename) VALUES ('$name1','$username','$password','$image','$name')"); //Inserts the value to table users
    echo "YOUR USERNAME:".$username;
    echo "\n your password:".$password; 
    //mail("$emailid","your username and password are",$password);
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
  }
}
?>
