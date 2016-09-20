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
		<title> Home | SES </title>
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
				if($getQuery["subject"] == NULL)
				{
					// enter nahi kiya hai.
					echo "<center><h3>You have not entered the subject you teach.</h3>";
					echo "<a href='#addSubjectModal' role='button' class='btn btn-large btn-primary' data-toggle='modal'>Enter Your Subject</a></center>";
				}
				else
				{
					// enter kar diya hai.
					echo "<center><h3> Your Subject : " .$getQuery["subject"] . "</h3></center><br/><center>";
					echo "<a href='#addStudentsModal' role='button' class='btn btn-large btn-primary' data-toggle='modal'>Add Students</a>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<a href='#deleteStudentsModal' role='button' class='btn btn-large btn-danger' data-toggle='modal'>Remove Students</a>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<a href='editMarks.php' role='button' class='btn btn-large btn-success'>Add / Edit Marks</a>";
					echo "</center>";
				}
			?>

			<!-- Modal : Add Subject -->
			<div id="addSubjectModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    					<h3 id="myModalLabel">Add Your Subject</h3>
  				</div>
  				<div class="modal-body">
    					<form action = "addSubject.php" id="form1" method = "POST">
    						<center><div class="control-group">
	    						<div class = "controls">
      						<input type = "text" required="required" name = "subject" class="input-xlarge" id="inputSubject" placeholder="The Subject You Teach">
    							</div>
  						</div></center>
    					</form>
  				</div>
  				<div class="modal-footer">
    					<button class = "btn btn-danger" data-dismiss = "modal" aria-hidden = "true">Close</button>
    					<button class = "btn btn-success" form = "form1" type = "Submit">Add Subject</button>
  				</div>
			</div>
			<!-- End of modal -->

			<!-- Modal : Add Students -->
			<div id="addStudentsModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    					<h3 id="myModalLabel">Add Students</h3>
  				</div>
  				<div class="modal-body">
    					<form action = "addStudents.php" id="form2" method = "POST">
    						<center><div class="control-group">
	    						<div class = "controls">
	    							<input type="number" required = "required" name="start" min="1" max="200" step="1" placeholder = "Starting USN">
	    							<input type="number" required = "required" name="end" min="1" max="200" step="1" placeholder = "Ending USN"><br/>
	    							<p>All USN between start and end are added , inclusive of both. Duplicate entries are automatically taken care of!</p>
    							</div>
  						</div></center>
    					</form>
  				</div>
  				<div class="modal-footer">
    					<button class = "btn btn-danger" data-dismiss = "modal" aria-hidden = "true">Close</button>
    					<button class = "btn btn-success" form = "form2" type = "Submit">Add Students</button>
  				</div>
			</div>
			<!-- End of modal -->

			<!-- Modal : Remove Students -->
			<div id="deleteStudentsModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    					<h3 id="myModalLabel">Remove Students</h3>
  				</div>
  				<div class="modal-body">
    					<form action = "removeStudents.php" id="form3" method = "POST">
    						<center><div class="control-group">
	    						<div class = "controls">
	    							<input type="number" required = "required" name="start" min="1" max="200" step="1" placeholder = "Starting USN">
	    							<input type="number" required = "required" name="end" min="1" max="200" step="1" placeholder = "Ending USN">
	    							<p>All USN between start and end are removed , inclusive of both. Non existent entries are automatically taken care of!</p>
    							</div>
  						</div></center>
    					</form>
  				</div>
  				<div class="modal-footer">
    					<button class = "btn btn-danger" data-dismiss = "modal" aria-hidden = "true">Close</button>
    					<button class = "btn btn-success" form = "form3" type = "Submit">Remove Students</button>
  				</div>
			</div>
			<!-- End of modal -->

		</div>

		<div id = "chartingWala" class = "well">
			<center><h3>Charts</h3></center>
			<center>
				<a href='performanceChart.php' role='button' class='btn btn-large btn-primary'>Class Performance</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href='#compareStudentsModal' role='button' class='btn btn-large btn-warning' data-toggle='modal'>Compare Students</a>
			</center>
		</div>

		<!-- Modal : Remove Students -->
			<div id="compareStudentsModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    					<h3 id="myModalLabel">Compare Students</h3>
  				</div>
  				<div class="modal-body">
    					<form action = "compareStudents.php" id="form4" method = "GET">
    						<center><div class="control-group">
	    						<div class = "controls">
	    							<input type="number" required = "required" name="usn1" min="1" max="200" step="1" placeholder = "USN 1">
	    							<input type="number" required = "required" name="usn2" min="1" max="200" step="1" placeholder = "USN 2">
    							</div>
  						</div></center>
    					</form>
  				</div>
  				<div class="modal-footer">
    					<button class = "btn btn-danger" data-dismiss = "modal" aria-hidden = "true">Close</button>
    					<button class = "btn btn-success" form = "form4" type = "Submit">Compare Students</button>
  				</div>
			</div>
			<!-- End of modal -->


		<div id = "footer">
			<hr/>
			<center>&copy; 2015 : Satish Kumar , Swapnil Jain and Himanshu Jaju.</center>
		</div>
	</body>
</html>
