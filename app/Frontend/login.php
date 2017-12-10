<?php session_start(); ?>

<html>
<head>
	<title>Simpleplanner - Login</title>
	<?php require 'header.html'; ?>
	<style>
	button:hover {
		opacity: 0.8;
	}
	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}
	.container {
		padding: 16px;
	}
	span.psw {
		float: right;
		padding-top: 16px;
	}
	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
		span.psw {
			display: block;
			float: none;
		}
		.cancelbtn {
			width: 100%;
		}
	}
	</style>
</head>
<body>
	<!-- Top Buttons -->
	<?php require 'nav_bar.php'; ?>

	<script>document.getElementById('login').style.display='none';</script>
	<br>
	<br>
	<?php
	require 'login_form.html';

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
		exit(0);
	} else {
		while($row=$result->fetch_assoc()) {
			$_SESSION['user_id']=(int)$row['account_id'];
			echo "<p>Session User ID: ".$_SESSION['user_id']."</p>";
		}
		// header('Location: https://simpleplanner.herokuapp.com');
	}
	$conn->close();
	?>
	<br>


	<?php require 'footer.html'; ?>
</body>
</html>
