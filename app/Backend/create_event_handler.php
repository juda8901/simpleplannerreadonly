<?php
//session_start();
//Get entries to form from simpleplannerv2.php
$EventTitle = $_REQUEST['EventTitle'];
$StartTime = $_REQUEST['Start Time'];
$EndTime = $_REQUEST['End Time'];
$Location = $_REQUEST['Location'];
//$Host = $_SESSION['user_id'];
$Description = $_REQUEST['Description'];
$PrivPub = $_REQUEST['PrivPub'];
if($PrivPub == '1'){
	$priv = 1;
}
else{
	$priv = 0;
}
//$start = date(Y-m-d h:i:s,$StartTime);
//$end = date(Y-m-d h:i:s,$EndTime);
$format = "%m/%d/%Y %h:%i %p"
//$format = "%Y-%m-%d %h:%i:%s"
//$start = strftime($format,$StartTime);
//$end = strftime($format,$EndTime);
//$startformat = date_create_from_format("m/d/Y h:i p",$StartTime)
//$start = date_format($startformat,"Y-m-d h:i:s")
//$endformat = date_create_from_format("m/d/Y h:i p",$EndTime)
//$end = date_format($endformat,"Y-m-d h:i:s")
//$start = date("Y-m-d h:i:s",strtotime($StartTime));
//$end = date("Y-m-d h:i:s",strtotime($EndTime));
$start = date("Y-m-d h:i:s",strptime(strftime($format,$StartTime),$format));
$end = date("Y-m-d h:i:s",strptime(strftime($format,$EndTime),$format));

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$insert="INSERT INTO events (event_title,event_start_date_time,event_end_date_time,event_location,event_description,event_is_hidden) VALUES ('$EventTitle',$start,$end,'$Location','$Description',$priv);";
if($conn->query($insert)==TRUE){
	echo "Event created successfully";
	header('Location: https://simpleplanner.herokuapp.com');
} else {
	echo "Error: ".$insert."<br>".$conn->error;
}
$conn->close();
?>
