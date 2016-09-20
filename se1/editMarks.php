<?php
	session_start();
	if(!isset($_SESSION["teacherLoggedIn"]) || !$_SESSION["teacherLoggedIn"])
	{
		header("Location: login.php");
		die();
	}
?>


<!DOCTYPE html>
<html>
	<header>
		<link rel = "stylesheet" href = "bootstrap/css/bootstrap.css" />
		<script src = "js/jquery.js"></script>
		<script src = "js/modal.js"></script>
		<title> Edit Marks | SES </title>
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

		<div id = "aboutUs" class = "well">
			<?php
				$x = mysql_connect("localhost" , "root" , "") or die("Host is dead!");
				mysql_select_db("swappy" , $x) or die("Database is dead!");
				$teacherId = $_SESSION["teacherLoggedIn"];
				$subject = mysql_query("SELECT `subject` FROM `teacher` WHERE `teacherId` = '$teacherId' ");
				$getQuery = mysql_fetch_array($subject);
				if(strlen($getQuery["subject"]) == 0)
				{
					header("Location: home.php");
					die();
				}
				else
				{
					$bache = mysql_query("SELECT * FROM `".$getQuery['subject']."`");
					echo "<form method = 'POST' action = 'saveMarks.php'>";
					echo "<table class='table table-bordered table-striped'>";
    					echo "<thead><tr><th>USN</th><th>First Internals</th><th>Second Internals</th><th>Third Internals</th></tr></thead><tbody>";
    					while($f = mysql_fetch_array($bache))
    					{
    						$usn = $f['usn'];
    						$one = ($f['internalOne'] == NULL)?0:$f['internalOne'];
    						$two = ($f['internalTwo'] == NULL)?0:$f['internalTwo'];
    						$three = ($f['internalThree'] == NULL)?0:$f['internalThree'];
    						
    						$nameOne = $usn."ONE";
    						$nameTwo = $usn."TWO";
    						$nameThree = $usn."THREE";

    						echo "<tr>";
    						echo "<td>".$usn."</td>";
    						echo "<td><input style='width:200px;' type='number' required = 'required' name='$nameOne' min='0' max='30' step='1' value = '$one'></td>";
    						echo "<td><input style='width:200px;' type='number' required = 'required' name='$nameTwo' min='0' max='30' step='1' value = '$two'></td>";
    						echo "<td><input style='width:200px;' type='number' required = 'required' name='$nameThree' min='0' max='30' step='1' value = '$three'></td>";
    						echo "</tr>";
    					}
  					echo "</tbody></table><br/>";
  					echo "<button class = 'btn btn-block btn-large btn-success' type = 'Submit'>Save Data</button>";
  					echo "</form>";
				}
			?>

		</div>

		<div id = "footer">
			<hr/>
			<center>&copy; 2015 : Satish Kumar , Swapnil Jain and Himanshu Jaju.</center>
		</div>
	</body>
</html>
