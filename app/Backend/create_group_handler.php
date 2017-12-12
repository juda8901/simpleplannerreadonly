<?php
if(!isset($_SESSION)) session_start();
$GroupName = $_REQUEST['GroupName'];
$Host = $_SESSION['id'];
$Description = $_REQUEST['Descrip'];
$PrivPub = $_REQUEST['PrivatePub'];
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

$insert="INSERT INTO groups (group_name,group_description,group_is_private,group_leader_account_id) VALUES ('$GroupName','$Description',$priv,$Host);";
if($conn->query($insert)==TRUE){
	echo "Event created successfully";
	header('Location: https://simpleplanner.herokuapp.com');
} else {
	echo "Error: ".$insert."<br>".$conn->error;
}
$conn->close();
?>
