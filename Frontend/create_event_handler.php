<?php
//Connect to the database
$connection = @mysqli_connect (localhost,root,???,simple_planner);
if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
	}
	
//Get entries to form from create_event.php
$EventName = $_REQUEST['EventName'];
$Time = $_REQUEST['Time'];
$Location = $_REQUEST['Location'];
$Host = $_REQUEST['Host'];
$Description = $_REQUEST['Description'];
$Attendees = $_REQUEST['Attendees'];

//Insert the values into the database
$query = "INSERT INTO events (id,name,event_time,location,host,description,attendees) VALUES ( ((select max(id) from events)+1),'$EventName','$Time','$Location','$Host','$Description','$Attendees');";
$resultset = mysqli_query($connection,$query);

echo "Successfully created event!";
include 'create_event.php';
?>