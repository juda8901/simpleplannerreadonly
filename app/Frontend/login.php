<?php
if(!isset($_SESSION)) session_start();

$error="";
// $valid=$_SESSION['logged_in']===true;
if(isset($_POST['submit'])){
	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server=$url["host"];
	$username=$url["user"];
	$password=$url["pass"];
	$db=substr($url["path"], 1);
	$conn=new mysqli($server, $username, $password, $db);
	if ($conn->connect_error) {
		$error=die("<p>Connection failed: " . $conn->connect_error."</p>");
	}
	$uname=$_POST['uname'];
	$psw=$_POST['psw'];
	$query="SELECT * FROM accounts WHERE account_email='$uname' AND account_password='$psw';";
	$result=$conn->query($query);
	if(!$result){
		$error="<p>Error: ".$query."<br>".$conn->error."</p>";
	} elseif ($result->num_rows <= 0) {
		$error="<script>document.getElementById('error').style.display='block';</script>";
	} else {
		while($row=$result->fetch_assoc()) {
			$_SESSION['id']=(int)$row['account_id'];
			$_SESSION['logged_in']=true;
		}
	}
	$conn->close();
}
if($_SESSION['logged_in']){
	header('Location: https://simpleplanner.herokuapp.com');
	die();
}
?>

<html>
<head>
	<title>Simpleplanner - Login</title>
	<?php require 'header.html'; ?>

	<style>
	button:hover {
		opacity: 0.8;
		color: red;
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
<body style= "background-color:#fafafa;">
	<!-- Top Buttons -->
	<?php require 'nav_bar.php'; ?>
	<script>document.getElementById('nav_title').style.display='unset';</script>
	<br>
	<br>


	<center style="margin-top: 7.5%; ">
		<form action="" method="post" style="margin: 20px 0px 20px 0px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); width: 20em; height: 25em;">
			<h1 style="float:left; margin:10px 10px 10px 20px;"> Login </h1>
			<br>
			<br>
			<div class="container" style="background-color:white;">
				<p style="color: red; display: none;" id="error">Incorrect username or password. If you don't have an account click <u><a onclick="document.getElementById('sign_up').style.display='block'">here</a></u>.</p>

				<input type="text" placeholder="Email" name="uname" style="width: 100%; padding: 8px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; border-radius: 12px;" required>

				<input type="password" placeholder="Password" name="psw" style="width: 100%; padding: 8px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; border-radius: 12px;" required>

				<input type="submit" name="submit" class="w3-btn w3-round-xxlarge w3-xlarge w3-hover-red" style="width :40%; font-weight: 650; color: red; margin: 20px;  box-shadow: 5px 5px 5px 0px rgba(0,0,0,.2);" value="Login"/>

				<div style="display: none;"><input id="remember" type="checkbox" checked="checked" style="float: left;"><span><a onclick="document.getElementById('remember').checked=!document.getElementById('remember').checked" class="w3-left w3-hover-light-grey"> Remember me </a></span></div>
				<br>
				<br>
				<br>
				<span class="psw" style="display: none;"><a href="#">Forgot password?</a></span>
			</div>
		</form>
		<?php echo $error; ?>
	</center>
	<br>


	<?php require 'footer.html'; ?>
</body>
</html>
