<?php
	$uname=$_REQUEST['uname'];
	$psw=$_REQUEST['psw'];

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	$conn = @mysqli_connect($server, $username, $password, $db);
	if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
	}

	$query="SELECT * FROM accounts WHERE account_email='$uname' AND account_password='$psw';";
	if($conn->query($query)==TRUE){
		echo "Account found";
<<<<<<< HEAD
		include_once '/Frontend/simpleplannerv2';
=======
		include_once '/frontend/home.html';
>>>>>>> e2a7d944d5916d137f0a91d7b95e8a0c5f4d71e5
	} else {
		echo "Error: ".$query."<br>".$conn->error;
	}
	$conn->close();
?>
