<!DOCTYPE html>
<html>
	<title>Simpleplanner</title>
	<meta charset="UTF-8" lang="en" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="simpleplannerv2.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Styles for password validation box -->
		<style>
			.valid {
			color: green;
			}
			.valid:before {
			position: relative;
			left: -35px;
			content: "✔";
			}
			.invalid {
			color: red;
			}
			.invalid:before {
			position: relative;
			left: -35px;
			content: "✖";
			}
		</style>
	</head>
	<body>
		<!-- Top Buttons -->
		<div id="LogInButtons" >
			<a href="#" class="w3-button w3-hover-white" style="color:#f13a59;">Home</a>
			<a href="" class=" w3-right w3-button" >Log in</a>
			<a onclick="document.getElementById('id01').style.display='block'" class=" w3-right w3-button" >Sign up</a>
			<a href="" class=" w3-right w3-button w3-hover-white" style="color:#f13a59;">Create a group</a>
		</div>
		<!-- Header -->
		<header class="w3-row-padding w3-container w3-theme" id="Header">
			<h1 >Simpleplanner</h1>
			<h2 class="quotes" style="display:none;">Planning made simple</h2>
			<h2 class="quotes" style="display:none;">Explore groups</h2>
		</header>
		<hr>
		<!-- Modal -->
		<div id="id01" class="w3-modal">
		<div class="w3-modal-content w3-card-1 w3-animate-right">
			<header class="w3-container w3-card w3-round w3-theme-l1">
				<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">×</span>
				<div class="w3-center">
					<form class="w3-center w3-container w3-card-1" enctype="multipart/form-data" action="http://localhost/Goup_Management_Project/create_account_handler.php">
						<h2>Join Simpleplanner Today</h2>
						<p>Full Name: <input class="w3-input" name="Name" type="text" required/></p>
						<p>Email: <input class="w3-input" name="Email" type="text" required/></p>
						<p>Password: <input class="w3-input" name="Password" id="Password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and 8 or more characters in length" required/></p>
						<p>Re-enter Password: <input class="w3-input" type="password" id="verify_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/></p>
						<div id="requirements" class="w3-container" style="display: none;">
							<label>Password must contain the following:</label>
							<p id="letter" class="invalid" style="font-size: 12pt; margin: 0px; padding: 0px;">At least one lowercase letter</p>
							<p id="capital" class="invalid" style="font-size: 12pt; margin: 0px; padding: 0px;">At least one uppercase letter</p>
							<p id="number" class="invalid" style="font-size: 12pt; margin: 0px; padding: 0px;">At least one number</p>
							<p id="length" class="invalid" style="font-size: 12pt; margin: 0px; padding: 0px;">Must be 8 or more characters</p>
							<p id="match" class="invalid" style="font-size: 12pt; margin: 0px; padding: 0px;">Passwords must match</p>
						</div>
						<input type="submit" class="w3-center w3-btn w3-xlarge w3-hover-light-grey" value="Sign up" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;"/>
						<!--<button class="w3-center w3-btn w3-xlarge w3-hover-light-grey" onclick="" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;">Sign up</button>-->

						<!-- Script for password validation -->
						<script type="text/javascript">
							var pw = document.getElementById("Password");
							var v_pw = document.getElementById("verify_password");
							var letter = document.getElementById("letter");
							var capital = document.getElementById("capital");
							var number = document.getElementById("number");
							var length = document.getElementById("length");
							var match = document.getElementById("match");
							// When the user clicks on the password field, show the message box
							pw.onfocus = function() {
							document.getElementById("requirements").style.display = "block";
							}
							v_pw.onfocus = function() {
							document.getElementById("requirements").style.display = "block";
							}// When the user clicks outside of the password field, hide the message box
							pw.onblur = function() {
							document.getElementById("requirements").style.display = "none";
							}
							// When the user starts to type something inside the password field
							pw.onkeyup = function() {
							// Validate lowercase letters
							var lowerCaseLetters = /[a-z]/g;
							if(pw.value.match(lowerCaseLetters)) {
							letter.classList.remove("invalid");
							letter.classList.add("valid");
							} else {
							letter.classList.remove("valid");
							letter.classList.add("invalid");
							}        
							// Validate capital letters
							var upperCaseLetters = /[A-Z]/g;
							if(pw.value.match(upperCaseLetters)) {
							capital.classList.remove("invalid");
							capital.classList.add("valid");
							} else {
							capital.classList.remove("valid");
							capital.classList.add("invalid");
							}
							// Validate numbers
							var numbers = /[0-9]/g;
							if(pw.value.match(numbers)) {
							number.classList.remove("invalid");
							number.classList.add("valid");
							} else {
							number.classList.remove("valid");
							number.classList.add("invalid");
							}
							// Validate length
							if(pw.value.length >= 8) {
							length.classList.remove("invalid");
							length.classList.add("valid");
							} else {
							length.classList.remove("valid");
							length.classList.add("invalid");
							}
							}
							v_pw.onkeyup = function(){
							//Check that passwords match
							if(v_pw.value==pw.value){
							match.classList.remove("invalid");
							match.classList.add("valid");
							} else {
							match.classList.remove("valid");
							match.classList.add("invalid");
							}
							}
						</script>
						<!--
						<input class="w3-center w3-btn w3-xlarge w3-hover-light-grey" value="Sign up" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;"/>
						<button class="w3-center w3-btn w3-xlarge w3-hover-light-grey" onclick="" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;">Sign up</button> -->
			</header>
			</div>
			</form>
		</div>
		<!-- Event Cards -->
		<div id="cards">
			<div class="card" style="float:left; width: 300px; margin: 10px 10px 20px 20px">
				<img src="img.jpg" alt="pic">
				<h1>Name of Event</h1>
				<p class="title">short descrption</p>
				<p>Event</p>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<p><button>Contact</button></p>
			</div>
			<div class="card" style="float:left; width: 300px; margin: 10px 10px 10px 20px">
				<img src="img.jpg" alt="pic">
				<h1>Name of Event</h1>
				<p class="title">short descrption</p>
				<p>Event</p>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<p ><button>Contact</button></p>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<hr>
		<!-- Google Map -->
		<h3 style="padding-left: 20px ">Groups organizing near you</h3>
		<div id="map"></div>
		<script>
			function initMap() {
				var Boulder = {lat: 40.027443, lng: -105.25174};
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 4,
					center: Boulder
				});
				var marker = new google.maps.Marker({
					position: Boulder,
					map: map
				});
			}
		</script>
		<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDKE8pn4aOs2nsQ8pkn9vxxLJQu6KYI90&callback=initMap"></script>
		<hr>
		<!-- Footer -->
		<footer class="w3-center w3-padding-64">
			<div class="w3-xlarge w3-section" style="color: #f13a59;">
				<i class="fa fa-facebook-official w3-hover-opacity"></i>
				<i class="fa fa-instagram w3-hover-opacity"></i>
				<i class="fa fa-snapchat w3-hover-opacity"></i>
				<i class="fa fa-pinterest-p w3-hover-opacity"></i>
				<i class="fa fa-twitter w3-hover-opacity"></i>
				<i class="fa fa-linkedin w3-hover-opacity"></i>
			</div>
			<p> footer stuff </p>
		</footer>
		<!-- Scripts -->
		<script type="text/javascript">
			// Rotating text
			(function() {
				var quotes = $(".quotes");
				var quoteIndex = -1;
				function showNextQuote() {
					++quoteIndex;
					quotes.eq(quoteIndex % quotes.length)
					.fadeIn(2000)
					.delay(2000)
					.fadeOut(2000, showNextQuote);
				}
				showNextQuote();
			})();
		</script>
	</body>
</html>