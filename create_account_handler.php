<?php
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$conn=@mysqli_connect(localhost, root, JustClay, simple_planner);
if(mysqli_connect_errno()){
echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
}

$insert="INSERT INTO accounts (name,email,password) VALUES ($name,$email,$password);";
if($conn->query($insert)==TRUE){
	echo "Account created successfully";
} else {
	echo "Error: ".$insert."<br>".$conn->error;
}
$conn->close();
?>