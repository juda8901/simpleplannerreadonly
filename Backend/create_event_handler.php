<?php
	//Get entries to form from simpleplannerv2.php
	$EventTitle = $_REQUEST['EventTitle'];
	$StartTime = $_REQUEST['Start Time'];
	$EndTime = $_REQUEST['End Time'];
	$Location = $_REQUEST['Location'];
	$Host = $_REQUEST['Host'];
	$Description = $_REQUEST['Description'];

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	$conn = @mysqli_connect($server, $username, $password, $db);
	if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
	}
	$insert="INSERT INTO events (event_title,event_start_date_time,event_end_date_time,event_location,event_host_account_id,event_description) VALUES ('$EventTitle','$StartTime','$EndTime','$Location',(SELECT account_id FROM accounts WHERE account_name='$Host'),'$Description');";
	if($conn->query($insert)==TRUE){
		echo "Event created successfully";
		include_once '/Frontend/simpleplannerv2.php';
	} else {
		echo "Error: ".$insert."<br>".$conn->error;
	}
	$conn->close();
?>
