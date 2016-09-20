<html>
    <head>
        <title>LOGIN</title>
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
  <section id="reg" class="animated wow bounceInDown" data-wow-delay="0s">
    <br><br><h2>STUDENT LOGIN</h2><br>
      
        <form action="checklogin.php" method="POST">
           ENTER USERNAME: <input type="text" name="username" required="required" style="border-radius:10px;" height="40px" /> <br/><br/>
           ENTER PASSWORD: <input type="password" name="password" required="required" style="border-radius:10px;"  /> <br/><br/>
           
       <input type="image" src="login.jpeg" alt="Submit" width="100px" height="50px" style="border-radius:20px;">
        </form></section>
      
  <footer>
    <br><p><a href="index.php"><h1>BACK</h1></a></p>
     <?php echo "COPYRIGHT&copy SWAPNIL JAIN"; ?></footer>
  </body>
  
