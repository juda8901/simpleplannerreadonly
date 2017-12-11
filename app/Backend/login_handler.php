<?php
session_start();

$uname=$_POST['uname'];
$psw=$_POST['psw'];

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$query="SELECT * FROM accounts WHERE account_email='$uname' AND account_password='$psw';";
$result=$conn->query($query);
if(!$result){
	echo "<p>Error: ".$query."<br>".$conn->error."</p>";
} elseif ($result->num_rows <= 0) {
	echo "<script>document.getElementById('error').style.display='block';</script>";
} else {
	while($row=$result->fetch_assoc()) {
		$_SESSION['user_id']=(int)$row['account_id'];
		echo "<p>Session User ID: ".$_SESSION['user_id']."</p>";
	}
	header('Location: https://simpleplanner.herokuapp.com');
}
$conn->close();
?>
