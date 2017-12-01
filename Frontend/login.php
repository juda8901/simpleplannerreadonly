<html>
	<head>
		<title>Simpleplanner login page</title>
		<meta charset="UTF-8" lang="en" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<<<<<<< HEAD
		<link rel="stylesheet" type="text/css" href="Frontend/simpleplannerv2.css"/>
=======
		<link rel="stylesheet" type="text/css" href="/Frontend/simpleplannerv2.css"/>
>>>>>>> e2a7d944d5916d137f0a91d7b95e8a0c5f4d71e5
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<style>
			body{
				background:#f2f2f2;
			}
			form {
				margin: 20px 0px 20px 0px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				width:20em;
				height:25em;
			}
			input[type=text], input[type=password] {
				width: 100%;
				padding: 8px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
				border-radius: 12px;
			}
			button {
				background-color: #25CB68;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				border-radius: 12px;
				cursor: pointer;
				width: 100%;
			}
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
		<div id="LogInButtons" >
<<<<<<< HEAD
			<a href="Frontend/simpleplannerv2.php" style="margin: 15px 15px 15px 15px;">
				<img src="Frontend/treeLogo.png" style="width:40px;height:40px;"></a>
=======
			<a href="/frontend/home.html" style="margin: 15px 15px 15px 15px;">
				<img src="/frontend/treeLogo.png" style="width:40px;height:40px;"></a>
>>>>>>> e2a7d944d5916d137f0a91d7b95e8a0c5f4d71e5
				<a onclick="document.getElementById('sign_up').style.display='block'" class=" w3-right w3-button w3-hover-white">Sign up</a>
				<a href="" class=" w3-right w3-button w3-hover-white" style="color:#f13a59;">Create a group</a>
			</div>
			<br>
			<center>
<<<<<<< HEAD
				<form action="/Backend/login_handler.php">
=======
				<form action="/backend/login_handler.php">
>>>>>>> e2a7d944d5916d137f0a91d7b95e8a0c5f4d71e5
					<h1 style="float:left; margin:10px 10px 10px 20px;"> Login </h1>
					<br>
					<br>
					<div class="container">
						<p style="color: red; display: none;">Incorrect username or password. If you don't have an account click <a onclick="document.getElementById('sign_up').style.display='block'">here</a>.</p>
						<input type="text" placeholder="Email" name="uname" required>
						<input type="password" placeholder="Password" name="psw" required>
						<button type="submit" onclick="check_account()">Login</button>
						<input id="remember" type="checkbox" checked="checked" style="float:left"><span><a onclick="document.getElementById('remember').checked=!document.getElementById('remember').checked" class="w3-left w3-hover-light-grey"> Remember me </a></span>
						<br>
						<br>
						<br>
						<span class="psw"><a href="#">Forgot password?</a></span>
					</div>
				</form>
			</center>
			<br>

			<!-- Footer -->
			<footer class="w3-center w3-padding-64">
				<div class="w3-xlarge w3-section">
					<i class="fa fa-facebook-official w3-hover-opacity"></i>
					<i class="fa fa-instagram w3-hover-opacity"></i>
					<i class="fa fa-snapchat w3-hover-opacity"></i>
					<i class="fa fa-pinterest-p w3-hover-opacity"></i>
					<i class="fa fa-twitter w3-hover-opacity"></i>
					<i class="fa fa-linkedin w3-hover-opacity"></i>
				</div>
				<p> footer stuff </p>
			</footer>
		</body>
</html>
