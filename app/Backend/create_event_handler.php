<?php
session_start();
//Get entries to form from simpleplannerv2.php
$EventTitle = $_REQUEST['EventTitle'];
$StartTime = $_REQUEST['Start Time'];
$EndTime = $_REQUEST['End Time'];
$Location = $_REQUEST['Location'];
$Host = $_SESSION['user_id'];
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
//$format = "%m/%d/%Y %h:%i %p"
//$format = "%Y-%m-%d %h:%i:%s"
//$start = strftime($format,$StartTime);
//$end = strftime($format,$EndTime);
$startformat = date_create_from_format("m/d/Y h:i p",$StartTime)
$start = date_format($startformat,"Y-m-d h:i:s")
$endformat = date_create_from_format("m/d/Y h:i p",$EndTime)
$end = date_format($startformat,"Y-m-d h:i:s")

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$insert="INSERT INTO events (event_title,event_start_date_time,event_end_date_time,event_location,event_host_account_id,event_description,event_is_hidden) VALUES ('$EventTitle',$start,$end,'$Location',$Host,'$Description',$priv);";
if($conn->query($insert)==TRUE){
	echo "Event created successfully";
	header('Location: https://simpleplanner.herokuapp.com');
} else {
	echo "Error: ".$insert."<br>".$conn->error;
}
$conn->close();





// //Get entries to form from simpleplannerv2.php
// 	$EventTitle = $_REQUEST['EventTitle'];
// 	$StartTime = $_REQUEST['Start Time'];
// 	$EndTime = $_REQUEST['End Time'];
// 	$Location = $_REQUEST['Location'];
// 	$Description = $_REQUEST['Description'];
// 	$PrivPub = $_REQUEST['PrivPub'];
// 	if($PrivPub == '1'){
// 		$priv = 1;
// 	}
// 	else{
// 		$priv = 0;
// 	}
// 	//$start = date(Y-m-d h:i:s,$StartTime);
// 	//$end = date(Y-m-d h:i:s,$EndTime);
// 	//$format = "%m/%d/%Y %h:%i %p"
// 	$format = "%Y-%m-%d %h:%i:%s"
// 	$start = strftime($format,$StartTime);
// 	$end = strftime($format,$EndTime);
//
//
// 	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// 	$server = $url["host"];
// 	$username = $url["user"];
// 	$password = $url["pass"];
// 	$db = substr($url["path"], 1);
// 	$conn = @mysqli_connect($server, $username, $password, $db);
//
// 	if(mysqli_connect_errno()){
// 		echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
// 	}
// 	//STR_TO_DATE('$StartTime','%m/%d/%Y %h:%i %p'),STR_TO_DATE('$EndTime','%m/%d/%Y %h:%i %p')
// 	$insert="INSERT INTO events (event_title,event_start_date_time,event_end_date_time,event_location,event_description,event_is_hidden) VALUES ('$EventTitle',$start,$end,'$Location','$Description',$priv);";
// 	if($conn->query($insert)==TRUE){
// 		echo "Event created successfully";
// 		include_once '/Frontend/simpleplannerv2.php';
// 	} else {
// 		echo "Error: ".$insert."<br>".$conn->error;
// 	}
// 	$conn->close();
?>
