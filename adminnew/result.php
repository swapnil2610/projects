
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>RESULT</title>
    <link rel = "stylesheet" type = "text/css" href="election.css">
  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
  
  <body>
    <header id="h"><img src="msr.jpeg"></header>
  <nav><marquee><h3>ELECTION FOR CLASS REPRESENTATIVE OF CSE</h3></marquee>
    <p><a href="admin.php"><img src="back.jpeg" width="50px" height="50px"></a></p></nav>
 
  <section id="win">
  <br><br>	<h1><marquee>!!!!!!WINNER!!!!!!</marquee></h1><br><br><br>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
 if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
	$query = mysql_query("SELECT * from counting "); //Query the users table if there are matching rows equal to $username
	$vote=array();
	$name=array();
	$i=0;
    while($row = mysql_fetch_assoc($query))
    	{$vote[$i]=$row['vote'];$name[$i]=$row['name'];$i=$i+1;}?>
<canvas id="polling_chart" width="400" height="400" class = "center" style="color:#005A31"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

            <script type="text/javascript" >
         var val= <?php echo json_encode($vote) ?>;
         var nam=<?php echo json_encode($name) ?>;
                var ctx = document.getElementById("polling_chart").getContext("2d");
                var data =  {
                                labels: [nam[0],nam[1]],
                                datasets: [
                                    {
                                        label: "My First dataset",
                                     fillColor: "rgba(151,187,205,0.5)",
                                     strokeColor: "rgba(151,187,205,0.8)",
                                     highlightFill: "rgba(151,187,205,0.75)",
                                     highlightStroke: "rgba(151,187,205,1)",
                                        data: [ val[0],val[1] ]
                                    }
                                ]
                            };
                var pollingChart = new Chart(ctx).Bar(data);
            </script>

<br><br><br>
   <?php if($vote[0]>$vote[1])
    	{echo "THE WINNER IS : ";echo $name[0];echo" HE IS FAVOURED BY ";echo $vote[0]; echo " STUDENTS"; }
    else if($vote[0]==$vote[1])
    	{echo"BOTH CANDIDATE SECURED SAME VOTES THERE WILL BE RE ELECTION";
          
                  Print '<script>window.location.assign("refresh.php");</script>';                                }
                  else{echo "THE WINNER IS : ";echo $name[1];echo" HE IS FAVOURED BY ";echo $vote[1]; echo " STUDENTS";}

}?>
  </section>
  <footer><br>
     <?php echo "COPYRIGHT&copy SWAPNIL JAIN"; ?></footer>

</body>