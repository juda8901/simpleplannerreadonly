<html>
	<head>
		<title>Create an Event</title>
	</head>
<body>
<?php
	// Obtain a connection object by connecting to the db
	$connection = @mysqli_connect (localhost,root,???,simple_planner);
	if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
	}
	else {
	     echo "<h4>Successfully connected to MySQL: </h4>";
	}
	echo "<h1>Create an Event</h1>";
?>
<h3>Create an Event</h3>
<form enctype="multipart/form-data" action="create_event_handler.php">
      <p>EventName:&nbsp <input type="text" name="Event Name" size="10" maxlength="20" /></p>
	  <p>Host:&nbsp <input type="text" name="Host" size="10" maxlength="20" /></p>
	  <p>Time:&nbsp <input type="text" name="Time" size="10" maxlength="20" /></p>
	  <p>Description:&nbsp <input type="text" name="Description" size="10" maxlength="200" /></p>
      <p>Attendees:&nbsp <input type="text" name="Attendees" size="10" maxlength="20" /></p>
	  <!-- Should add more fields - location, maybe specifically time start and time end, maybe different column for main host (the current user) and
	   cohosts, tags, etc. -->
	  <br>
      <input type="submit" value="Create Event" /> &nbsp <input type="Reset" />
</form>
</body>
</html>