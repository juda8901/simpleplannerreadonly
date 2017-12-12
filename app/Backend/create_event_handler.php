<?php
if(!isset($_SESSION)) session_start();
$EventTitle = $_REQUEST['EventTitle'];
$StartDate = $_REQUEST['StartDate'];
$StartTime = $_REQUEST['StartTime'];
$EndDate = $_REQUEST['EndDate'];
$EndTime = $_REQUEST['EndTime'];
$Location = $_REQUEST['Location'];
$Host = $_SESSION['id'];
$Description = $_REQUEST['Description'];
$PrivPub = $_REQUEST['PrivPub'];
$Tags = $_REQUEST['Tags'];
if($PrivPub == '1'){
	$priv = 1;
}
else{
	$priv = 0;
}
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$insert="INSERT INTO events (event_host_account_id,event_title,event_start_date_time,event_end_date_time,event_location,event_description,event_is_hidden,event_start_time,event_end_time,event_tags) VALUES ('$Host','$EventTitle','$StartDate','$EndDate','$Location','$Description',$priv,'$StartTime','$EndTime','$Tags');";
if($conn->query($insert)==TRUE){
	echo "Event created successfully";
	header('Location: https://simpleplanner.herokuapp.com');
} else {
	echo "Error: ".$insert."<br>".$conn->error;
}
$conn->close();
?>
