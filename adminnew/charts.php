<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Results</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="bootstrap.css"/>

   <link rel="stylesheet" type="text/css" href="main.css"/>
  <link rel="stylesheet" type="text/css" href="animate.css"/>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="wow.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	session_start();
	//$username = $_POST['username'];
	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("first_db") or die("Cannot connect to database");
	 $query = mysql_query("SELECT * from counting ");
     $vote=array();
     $name=array();$i=0;
	while($row = mysql_fetch_assoc($query)) //display all rows from query
		{   $vote[$i]=$row['vote'];
			$name[$i] = $row['name'];$i=$i+1; // the first username row is passed on to $table_users, and so on until the query is finished
			}?>

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
                                        fillColor: "rgba(220,220,220,0.5)",
                                        strokeColor: "rgba(220,220,220,0.8)",
                                        highlightFill: "rgba(220,220,220,0.75)",
                                        highlightStroke: "rgba(220,220,220,1)",
                                        data: [ val[0],val[1] ]
                                    }
                                ]
                            };
                var pollingChart = new Chart(ctx).Bar(data);
            </script></body>