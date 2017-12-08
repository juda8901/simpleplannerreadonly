<?php
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
	echo "Account created successfully";
	header('Location: https://simpleplanner.herokuapp.com');
} else {
	echo "Error: ".$insert."<br>".$conn->error;
}
$conn->close();
?>
