<?php
	//Get entries to form from simpleplannerv2.html
	$EventTitle = $_REQUEST['Event Title'];
	$StartTime = $_REQUEST['Start Time'];
	$EndTime = $_REQUEST['End Time'];
	$Location = $_REQUEST['Location'];
	$Host = $_REQUEST['Host'];
	$Description = $_REQUEST['Description'];

	$hostname='sql3.freemysqlhosting.net';
	$username='sql3203668';
	$password='663hN84yLR';
	$db='sql3203668';
	$conn=@mysqli_connect($hostname,$username,$password,$db);
	if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
	}
	$insert="INSERT INTO events (event_id,event_title,event_start_date_time,event_end_date_time,event_location,event_host_account_id,
	event_description,event_is_hidden) VALUES ( ((select max(id) from events)+1),'$EventTitle','$StartTime','$EndTime',
	'$Location','$Host','$Description',0);";
	if($conn->query($insert)==TRUE){
		echo "Event created successfully";
		include 'simpleplannerv2.php';
	} else {
		echo "Error: ".$insert."<br>".$conn->error;
	}
	$conn->close();
?>