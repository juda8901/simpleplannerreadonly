<?php
        $name=$_REQUEST['Name'];
        $email=$_REQUEST['Email'];
        $pass=$_REQUEST['Password'];


        $hostname='sql3.freemysqlhosting.net';
        $username='sql3203668';
        $password='663hN84yLR';
        $db='sql3203668';
        $conn=@mysqli_connect($hostname,$username,$password,$db);
        if(mysqli_connect_errno()){
            echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
        }

        $insert="INSERT INTO accounts (account_name,account_email,account_password) VALUES ('$name','$email','$pass');";
        if($conn->query($insert)==TRUE){
            echo "Account created successfully";
            include 'simpleplannerv2.php';
        } else {
            echo "Error: ".$insert."<br>".$conn->error;
        }
        $conn->close(); 

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	$conn = @mysqli_connect($server, $username, $password, $db);
	if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to MySQL: </h4>".mysqli_connect_error();
	}

	$insert="INSERT INTO accounts (account_name,account_email,account_password) VALUES ('$name','$email','$pass');";
	if($conn->query($insert)==TRUE){
		echo "Account created successfully";
		include_once '/Frontend/simpleplannerv2.php';
	} else {
		echo "Error: ".$insert."<br>".$conn->error;
	}
	$conn->close();
>>>>>>> c6b90060a142b093f5889598e882daa39569b87b
?>
