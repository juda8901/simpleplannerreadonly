<?php
	//Get entries to form from simpleplannerv2.php
	$EventTitle = $_REQUEST['EventTitle'];
	$StartTime = $_REQUEST['Start Time'];
	$EndTime = $_REQUEST['End Time'];
	$Location = $_REQUEST['Location'];
	$Host = $_REQUEST['Host'];
	$Description = $_REQUEST['Description'];

	$hostname='sql3.freemysqlhosting.net';
	$username='sql3203668';
	$password='arbhcojdmnFA17';
	$db='sql3203668';
	$conn=@mysqli_connect($hostname,$username,$password,$db);
	if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
	}
	$insert="INSERT INTO events (event_title,event_start_date_time,event_end_date_time,event_location,event_host_account_id,event_description) VALUES ('$EventTitle','$StartTime','$EndTime','$Location',(SELECT account_id FROM accounts WHERE account_name='$Host'),'$Description');";
	if($conn->query($insert)==TRUE){
		echo "Event created successfully";
		include 'simpleplannerv2.php';
	} else {
		echo "Error: ".$insert."<br>".$conn->error;
	}
	$conn->close();
?>