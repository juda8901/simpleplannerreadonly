<?php
	$uname=$_REQUEST['uname'];
	$psw=$_REQUEST['psw'];

	$hostname='sql3.freemysqlhosting.net';
	$username='sql3203668';
	$password='arbhcojdmnFA17';
	$db='sql3203668';
	$conn=@mysqli_connect($hostname,$username,$password,$db);
	if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
	}

	$query="SELECT * FROM accounts WHERE account_email='$uname' AND account_password='$psw';";
	if($conn->query($query)==TRUE){
		echo "Account found";
		include 'simpleplannerv2.php';
	} else {
		echo "Error: ".$query."<br>".$conn->error;
	}
	$conn->close();
?>