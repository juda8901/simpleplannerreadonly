<?php
$name=$_REQUEST['Name'];
$email=$_REQUEST['Email'];
$pass=$_REQUEST['Password'];

$hostname='sql3.freemysqlhosting.net';
$username='sql3203668';
$password='663hN84yLR';
$db='sql3203668';
$conn=@mysqli_connect($host,$username,$password,$db);
if(mysqli_connect_errno()){
echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
}

$insert="INSERT INTO accounts (name,email,password) VALUES ('$name','$email','$pass');";
if($conn->query($insert)==TRUE){
	echo "Account created successfully";
} else {
	echo "Error: ".$insert."<br>".$conn->error;
}
$conn->close();
?>