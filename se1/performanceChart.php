<?php
	session_start();
	if(!isset($_SESSION["teacherLoggedIn"]) || !$_SESSION["teacherLoggedIn"])
	{
		header("Location: login.php");
		die();
	}

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
	$one = array(0,0,0,0,0,0);
	$internalOne = mysql_query("SELECT internalOne FROM ".$subject." ");
	while($r = mysql_fetch_array($internalOne))
	{
		$val = $r["internalOne"];
		if($val >= 0 && $val <= 5)
			$one[0] += 1;
		else if($val >= 6 && $val <= 10)
			$one[1] += 1;
		else if($val >= 11 && $val <= 15)
			$one[2] += 1;
		else if($val >= 16 && $val <= 20)
			$one[3] += 1;
		else if($val >= 21 && $val <= 25)
			$one[4] += 1;
		else
			$one[5] += 1;
	}

	$two = array(0,0,0,0,0,0);
	$internalTwo = mysql_query("SELECT internalTwo FROM ".$subject." ");
	while($r = mysql_fetch_array($internalTwo))
	{
		$val = $r["internalTwo"];
		if($val >= 0 && $val <= 5)
			$two[0] += 1;
		else if($val >= 6 && $val <= 10)
			$two[1] += 1;
		else if($val >= 11 && $val <= 15)
			$two[2] += 1;
		else if($val >= 16 && $val <= 20)
			$two[3] += 1;
		else if($val >= 21 && $val <= 25)
			$two[4] += 1;
		else
			$two[5] += 1;
	}

	$three = array(0,0,0,0,0,0);
	$internalThree = mysql_query("SELECT internalThree FROM ".$subject." ");
	while($r = mysql_fetch_array($internalThree))
	{
		$val = $r["internalThree"];
		if($val >= 0 && $val <= 5)
			$three[0] += 1;
		else if($val >= 6 && $val <= 10)
			$three[1] += 1;
		else if($val >= 11 && $val <= 15)
			$three[2] += 1;
		else if($val >= 16 && $val <= 20)
			$three[3] += 1;
		else if($val >= 21 && $val <= 25)
			$three[4] += 1;
		else
			$three[5] += 1;
	}
?>

<!DOCTYPE html>
<html>
	<header>
		<link rel = "stylesheet" href = "bootstrap/css/bootstrap.css" />
		<script src = "js/jquery.js"></script>
		<script src = "js/modal.js"></script>
		<script src = "js/canvas.js"></script>
		<title> Class Performance Chart | SES </title>

		<script type="text/javascript">
  		window.onload = function () {
    		var chart1 = new CanvasJS.Chart("internalOne",
    		{
      		title:{
        		text: "Marks Obtained in First Internal"    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Students"
      	},
      	legend: {
        		verticalAlign: "bottom",
        		horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [

      	{        
        		type: "column",  
        		showInLegend: true, 
        		legendMarkerColor: "grey",
        		legendText: "No. of students",
        		dataPoints: [      
        		{y: <?php echo $one[0];?>, label: "0-5"},
        		{y: <?php echo $one[1];?>,  label: "6-10" },
        		{y: <?php echo $one[2];?>,  label: "11-15"},
        		{y: <?php echo $one[3];?>,  label: "16-20"},
        		{y: <?php echo $one[4];?>,  label: "21-25"},
        		{y: <?php echo $one[5];?>, label: "26-30"}
        		]
      	}   
      	]
    		});

    		chart1.render();

    		var chart2 = new CanvasJS.Chart("internalTwo",
    		{
      		title:{
        		text: "Marks Obtained in Second Internal"    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Students"
      	},
      	legend: {
        		verticalAlign: "bottom",
        		horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [

      	{        
        		type: "column",  
        		showInLegend: true, 
        		legendMarkerColor: "grey",
        		legendText: "No. of students",
        		dataPoints: [      
        		{y: <?php echo $two[0];?>, label: "0-5"},
        		{y: <?php echo $two[1];?>,  label: "6-10" },
        		{y: <?php echo $two[2];?>,  label: "11-15"},
        		{y: <?php echo $two[3];?>,  label: "16-20"},
        		{y: <?php echo $two[4];?>,  label: "21-25"},
        		{y: <?php echo $two[5];?>, label: "26-30"}
        		]
      	}   
      	]
    		});

    		chart2.render();


    		var chart3 = new CanvasJS.Chart("internalThree",
    		{
      		title:{
        		text: "Marks Obtained in Third Internal"    
      	},
      	animationEnabled: true,
      	axisY: {
        	title: "Students"
      	},
      	legend: {
        		verticalAlign: "bottom",
        		horizontalAlign: "center"
      	},
      	theme: "theme2",
      	data: [

      	{        
        		type: "column",  
        		showInLegend: true, 
        		legendMarkerColor: "grey",
        		legendText: "No. of students",
        		dataPoints: [      
        		{y: <?php echo $three[0];?>, label: "0-5"},
        		{y: <?php echo $three[1];?>,  label: "6-10" },
        		{y: <?php echo $three[2];?>,  label: "11-15"},
        		{y: <?php echo $three[3];?>,  label: "16-20"},
        		{y: <?php echo $three[4];?>,  label: "21-25"},
        		{y: <?php echo $three[5];?>, label: "26-30"}
        		]
      	}   
      	]
    		});

    		chart3.render();

    		A();

  		}

  		function A()
  		{
  			document.getElementById("internalOne").style.display = "none";
  			document.getElementById("internalTwo").style.display = "none";
  			document.getElementById("internalThree").style.display = "none";
  			document.getElementById("internalOne").style.display = "block";
  		}

  		function B()
  		{
  			document.getElementById("internalOne").style.display = "none";
  			document.getElementById("internalTwo").style.display = "none";
  			document.getElementById("internalThree").style.display = "none";
  			document.getElementById("internalTwo").style.display = "block";
  		}

  		function C()
  		{
  			document.getElementById("internalOne").style.display = "none";
  			document.getElementById("internalTwo").style.display = "none";
  			document.getElementById("internalThree").style.display = "none";
  			document.getElementById("internalThree").style.display = "block";
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

		<div id = "buttonswala"><center>
			<a href = "#one" onclick = "A();" class = "btn btn-success">Internal One</a>&nbsp;&nbsp;&nbsp;
			<a href = "#two" onclick = "B();" class = "btn btn-success">Internal Two</a>&nbsp;&nbsp;&nbsp;
			<a href = "#three" onclick = "C();" class = "btn btn-success">Internal Three</a></center><br/><br/>
		</div>

		<div id = "chartArea" style = "display : block;" class = "well">
			<div id = "internalOne" name = "internalOne" style = "height : 300px; display:block;">
			</div>

			<div id = "internalTwo" name = "internalTwo" style = "height : 300px; display:block;">
			</div>

			<div id = "internalThree" name = "internalThree" style = "height : 300px; display:block;">
			</div>
		</div>


		<div id = "footer">
			<hr/>
			<center>&copy; 2015 : Satish Kumar , Swapnil Jain and Himanshu Jaju.</center>
		</div>
	</body>
</html>
