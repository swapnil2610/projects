<?php
	session_start();
	if(!isset($_SESSION["teacherLoggedIn"]) || !$_SESSION["teacherLoggedIn"])
	{
		header("Location: login.php");
		die();
	}

  if(!isset($_GET["usn1"]) or !isset($_GET["usn2"]))
  {
    header("Location: login.php");
    die(); 
  }

  $usn1 = $_GET["usn1"];
  $usn2 = $_GET["usn2"];

	$x = mysql_connect("localhost" , "root" , "") or die("Host is dead!");
	mysql_select_db("swappy" , $x) or die("Database is dead!");
	$teacherId = $_SESSION["teacherLoggedIn"];
	$subject = mysql_query("SELECT `subject` FROM `teacher` WHERE `teacherId` = '$teacherId' ");
	$getQuery = mysql_fetch_array($subject);
	if($getQuery["subject"] == NULL)
	{
		header("Location: login.php");
		die();
	}
	$subject = $getQuery["subject"];
  $q1 = mysql_query("SELECT * FROM `$subject` WHERE usn = $usn1 ");
  $q2 = mysql_query("SELECT * FROM `$subject` WHERE usn = $usn2 ");
  if(mysql_num_rows($q1) + mysql_num_rows($q2) != 2)
  {
    header("Location: login.php");
    die();
  }
  $marks1 = mysql_fetch_array($q1);
  $marks2 = mysql_fetch_array($q2);

?>

<!DOCTYPE html>
<html>
	<header>
		<link rel = "stylesheet" href = "bootstrap/css/bootstrap.css" />
		<script src = "js/jquery.js"></script>
		<script src = "js/modal.js"></script>
		<script src = "js/canvas.js"></script>
		<title> Student Compare Chart | SES </title>

		<script type="text/javascript">
  		window.onload = function () {
    var chart = new CanvasJS.Chart("chartWala",
    {      
      theme:"theme2",
      title:{
        text: "Marks Comparison"
      },
      animationEnabled: true,
      axisY :{
        includeZero: false,
        // suffix: " k",
        valueFormatString: "#",
        suffix: " "
        
      },
      toolTip: {
        shared: "true"
      },
      data: [
      {        
        type: "spline", 
        showInLegend: true,
        name: "USN 2",
        // markerSize: 0,        
        // color: "rgba(54,158,173,.6)",
        dataPoints: [
        {label: "Internal One", y: <?php echo $marks1["internalOne"];?>},
        {label: "Internal Two", y: <?php echo $marks1["internalTwo"];?>},        
        {label: "Internal Three", y: <?php echo $marks1["internalThree"];?>}

        ]
      },
      {        
        type: "spline", 
        showInLegend: true,
        // markerSize: 0,
        name: "USN 1",
        dataPoints: [
        {label: "Internal One", y: <?php echo $marks2["internalOne"];?>},
        {label: "Internal Two", y: <?php echo $marks2["internalTwo"];?>},        
        {label: "Internal Three", y: <?php echo $marks2["internalThree"];?>}

        ]
      } 
      

      ],
      legend:{
        cursor:"pointer",
        itemclick : function(e) {
          if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
            e.dataSeries.visible = false;
          }
          else {
            e.dataSeries.visible = true;
          }
          chart.render();
        }
        
      },
    });

chart.render();
}
  		
  	</script>

		<meta charset="UTF-8">
	</header>

	<body>
		<div class = "container">
			<img src = "bootstrap/img/logo.png" style = "margin-top:10px; height : 100px; width : 1500px" />
			<div class="navbar" style = "margin-top : 20px;">
  				<div class="navbar-inner">
    				<a class="brand" href="index.php">Student Examination System</a>
      				<a style = "float:right;" class="btn btn-danger" href="logout.php">Logout</a>
  			</div>
		</div>

		<div id = "chartArea" style = "display : block;" class = "well">
			 <div id = "chartWala" name = "chartWala" style = "height : 400px; display:block;">
			 </div>
		</div>


		<div id = "footer">
			<hr/>
			<center>&copy; 2015 : Satish Kumar , Swapnil Jain and Himanshu Jaju.</center>
		</div>
	</body>
</html>
