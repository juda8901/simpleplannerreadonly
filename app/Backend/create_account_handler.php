<?php
if(!isset($_SESSION)) session_start();
$name=$_REQUEST['Name'];
$email=$_REQUEST['Email'];
$pass=$_REQUEST['Password'];

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$insert="INSERT INTO accounts (account_name,account_email,account_password) VALUES ('$name','$email','$pass');";
if($conn->query($insert)==TRUE){
	$_SESSION['id']=(int)$row['account_id'];
	$_SESSION['logged_in']=true;
	$conn->close();
	header('Location: https://simpleplanner.herokuapp.com');die();
} else {
	echo "Error: ".$insert."<br>".$conn->error;
}

$query="SELECT * FROM accounts WHERE account_email='$name' AND account_password='$pass';";
$result=$conn->query($query);
if(!$result || $result->num_rows <= 0){
	$error="<p>Error: ".$query."<br>".$conn->error."</p>";
} else {
	while($row=$result->fetch_assoc()) {
		$_SESSION['id']=(int)$row['account_id'];
		$_SESSION['logged_in']=true;
	}
}
$conn->close();
if($_SESSION['logged_in']){
	header('Location: https://simpleplanner.herokuapp.com');
	die();
}
?>
