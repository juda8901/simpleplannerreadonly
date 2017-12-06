<html>
	<head>
		<title>Simpler planner Home Page</title>
		<meta charset="UTF-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="Frontend/simpleplannerv2.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Styles for password validation box -->
		<style>
			.valid {
				color: green;
			}
			.valid:before {
				position: inherit;
				right: 15px;
				content: "✔";
			}
			.invalid {
				color: red;
			}
			.invalid:before {
				position: inherit;
				right: 15px;
				content: "✖";
			}
		</style>
	</head>
	<body>
		<!-- Top Buttons -->
		<div id="LogInButtons">
			<a href="#" style="margin: 15px 15px 15px 15px;"></a>
			<img src="Frontend/treeLogo.png" style="width:40px;height:40px;"/>
			<a href="Frontend/login.php" class=" w3-right w3-button w3-hover-white" >Log in</a>
			<a onclick="document.getElementById('sign_up').style.display='block'" class=" w3-right w3-button w3-hover-white" >Sign up</a>
			<a href="" class=" w3-right w3-button w3-hover-white" style="color:#f13a59;">Create a group</a>
		</div>
		<br>
		<br>

		<!-- Header -->
		<header class="w3-row-padding w3-container w3-theme" id="Header">
			<h1>Simpleplanner</h1>
			<h2>
				<a href="" class="typewrite" style="text-decoration: none; font-size: 25px; color:#2e3e48;" data-type='[ "Planning made simple.", "Change the world.", "Flawlessly connect with others." ]'>
					<span class="wrap"></span>
				</a>
			</h2>
		</header>
		<br>
		<hr style=" margin-bottom: 0em;">

		<!-- Sign Up Modal -->
		<div id="sign_up" class="w3-modal">
			<div class="w3-modal-content w3-card-1 w3-animate-right">
				<header class="w3-container w3-card w3-round w3-theme-l1"></header>
				<span onclick="document.getElementById('sign_up').style.display='none'" class="w3-button w3-display-topright">×</span>
				<div class="w3-center">
					<form class="w3-center w3-container w3-card-1" enctype="multipart/form-data" action="/Backend/create_account_handler.php">
						<h2>Join Simpleplanner Today</h2>
						<p>Full Name: <input class="w3-input w3-center" name="Name" type="text" required/></p>
						<p>Email: <input class="w3-input w3-center" name="Email" id="email" type="text" required/></p>
                        <div id="eRequirement" class="w3-card-4" style="display: none; margin: 0 auto; width: fit-content; text-align: justify; padding: 25px;">
                            <p id="eVerify" class="invalid" style="font-size: 12pt;margin: 0px;margin-left: 15px;padding: 0px;">Valid email address</p>
                        </div>
						<p>Password: <input class="w3-input w3-center" name="Password" id="Password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and 8 or more characters in length" required/></p>
						<p>Re-enter Password: <input class="w3-input w3-center" type="password" id="verify_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/></p>
						<div id="requirements" class="w3-card-4" style="display: none; margin: 0 auto; width: fit-content; text-align: justify; padding: 25px;">
							<label>Password must contain the following:</label>
							<p id="letter" class="invalid" style="font-size: 12pt;margin: 0px;margin-left: 15px;padding: 0px;">At least one lowercase letter</p>
							<p id="capital" class="invalid" style="font-size: 12pt;margin: 0px;margin-left: 15px;padding: 0px;">At least one uppercase letter</p>
							<p id="number" class="invalid" style="font-size: 12pt;margin: 0px;margin-left: 15px;padding: 0px;">At least one number</p>
							<p id="length" class="invalid" style="font-size: 12pt;margin: 0px;margin-left: 15px;padding: 0px;">Must be 8 or more characters</p>
							<p id="match" class="invalid" style="font-size: 12pt;m;margin: 0px;margin-left: 14px;padding: 0px;">Passwords must match</p>
						</div>
						<input type="submit" class="w3-center w3-btn w3-xlarge w3-hover-light-grey" value="Sign up" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;"/>
					</form>
					<!-- Script for password validation -->
					<script type="text/javascript">
						var pw = document.getElementById("Password");
						var v_pw = document.getElementById("verify_password");
						var letter = document.getElementById("letter");
						var capital = document.getElementById("capital");
						var number = document.getElementById("number");
						var length = document.getElementById("length");
						var match = document.getElementById("match");
                        var eVerify = document.getElementById("eVerify");
                        var em = document.getElementById("email");
							// When the user clicks on the password field, show the message box
							pw.onfocus = function() {
								document.getElementById("requirements").style.display = "block";
							}
							v_pw.onfocus = function() {
								document.getElementById("requirements").style.display = "block";
							}
						// When the user clicks outside of the password field, hide the message box
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
                        //display message box when user clicks on email field
                        em.onfocus = function() {
				            document.getElementById("eRequirement").style.display = "block";
                        }
                        //hide message box when user clicks away
                        em.onblur = function() {
                            document.getElementById("eRequirement").style.display = "none";
                        }
                        //Checks if correct email format
						em.onkeyup = function(){
							var validEmail = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/g;
							if(em.value.match(validEmail)){
								eVerify.classList.remove("invalid");
								eVerify.classList.add("valid");
							} else {
								eVerify.classList.remove("valid");
								eVerify.classList.add("invalid");
							}
						}
					</script>
				</div>
			</div>
		</div>
		<!-- Modal for Create Event -->
		<div id="create_event" class="w3-modal">
			<div class="w3-modal-content w3-card-1 w3-animate-right">
			<header class="w3-container w3-card w3-round w3-theme-l1"> 
			<span onclick="document.getElementById('create_event').style.display='none'"
			class="w3-button w3-display-topright">×</span>
			<div class="w3-center">
			<form class="w3-center w3-container w3-card-1" enctype="multipart/form-data" action="/Backend/create_event_handler.php">
			<h2>Create an Event!</h2>
			<div class="w3-section"> 
				<input class="w3-input" name="EventTitle" type="text" required>
				<label>Event Title&nbsp </label>
			</div>
			<div class="w3-section">
				<select class="w3-input" name="PrivPub">
					<option value="1">Private</option>
					<option value="0">Public</option>
				</select>
			</div>
			<div class="w3-section">      
				<input class="w3-input" name="StartTime" type="datetime-local" required>
				<label>Start Time&nbsp </label>
			</div>
			<div class="w3-section">      
				<input class="w3-input" name="EndTime" type="datetime-local" required>
				<label>End Time&nbsp </label>
			</div>
			<div class="w3-section" id="locationField">      
				<input class="w3-input" name="Location" id="autocomplete" placeholder="Enter the address" onFocus="geolocate()" type="text" required>
				<label>Location&nbsp </label>
			</div>
			<div class="w3-section">      
				<input class="w3-input" name="Description" type="text" required>
				<label>Description&nbsp </label>
			</div>
			<div class="w3-section">      
				<input class="w3-input" name="Tags" type="text" required>
				<label>Tags&nbsp </label>
			</div>
			<input class="w3-center w3-btn w3-xlarge w3-hover-light-grey" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;" type="submit" value="Create Event" /> &nbsp
			</header>
		</div>
		</form>
		</div>
		</div>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLsFEUG5AKf3-PEgQryg5RxPsQdD89dsI&libraries=places&callback=initAutocomplete"
        async defer></script>
		<script>
			var placeSearch, autocomplete;
			var componentForm = {
				street_number: 'short_name',
				route: 'long_name',
				locality: 'long_name',
				administrative_area_level_1: 'short_name',
				country: 'long_name',
				postal_code: 'short_name'
			};

			function initAutocomplete() {
				// Create the autocomplete object, restricting the search to geographical
				// location types.
				autocomplete = new google.maps.places.Autocomplete(
				/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
				{types: ['geocode']});

				// When the user selects an address from the dropdown, populate the address
				// fields in the form.
				autocomplete.addListener('place_changed', fillInAddress);
			}

			function fillInAddress() {
				// Get the place details from the autocomplete object.
				var place = autocomplete.getPlace();

				for (var component in componentForm) {
					document.getElementById(component).value = '';
					document.getElementById(component).disabled = false;
				}

				// Get each component of the address from the place details
				// and fill the corresponding field on the form.
				for (var i = 0; i < place.address_components.length; i++) {
					var addressType = place.address_components[i].types[0];
					if (componentForm[addressType]) {
						var val = place.address_components[i][componentForm[addressType]];
						document.getElementById(addressType).value = val;
					}
				}
			}

			// Bias the autocomplete object to the user's geographical location,
			// as supplied by the browser's 'navigator.geolocation' object.
			function geolocate() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function(position) {
						var geolocation = {
							lat: position.coords.latitude,
							lng: position.coords.longitude
						};
						var circle = new google.maps.Circle({
							center: geolocation,
							radius: position.coords.accuracy
						});
						autocomplete.setBounds(circle.getBounds());
					});
				}
			}
			//from Google: https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
		</script>
		<!-- Create Event Button -->
		<button class="w3-btn w3-round-xxlarge w3-xlarge w3-hover-light-grey w3-green" onclick="document.getElementById('create_event').style.display='block'" style="margin: 15px; padding-left: 20px; padding-right: 25px;">+ Create Event</button>

		<!-- Event Cards -->
		<div id="cards" style="background:#f2f2f2;">
			 <?php
				 $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
				 $server = $url["host"];
				 $username = $url["user"];
				 $password = $url["pass"];
				 $db = substr($url["path"], 1);
					// Create connection
					$conn = new mysqli($server, $username, $password, $db);
					// Check connection
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT event_title, event_description, event_location, event_start_date_time, event_end_date_time FROM events";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    	$tempStamp = strtotime($row['event_start_date_time']);
					    	$startTime = date('g:i A', $tempStamp);
					    	$startDate = date('m/d',$tempStamp);


					    	$tempStamp = strtotime($row['event_end_date_time']);
					    	$endTime = date('g:i A',$tempStamp);
					    	$endDate = date('m/d',$tempStamp);

					    	$title = $row["event_title"];
					    	if (empty($title)){
					    		$title = "No Title";
					    	}
					        echo "<div class='card' style='float:left; width: 300px; margin: 10px 10px 10px 20px;'><h1>" . $row["event_title"]. "</h1><p>" . $row["event_location"]. "</p><p>" . $startTime. "-" . $endTime. "</p><p>" . $startDate. "-" . $endDate. "</p><p>" . $row["event_description"]. "</p><p><button>Contact</button></p></div>";
					    }
					} else {
					    echo "0 results";
					}
					$conn->close();
				?>

		</div>
		<hr style="margin-top: 0em;">

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
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDKE8pn4aOs2nsQ8pkn9vxxLJQu6KYI90&callback=initMap"></script>
		<hr>

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

			var TxtType = function(el, toRotate, period) {
				this.toRotate = toRotate;
				this.el = el;
				this.loopNum = 0;
				this.period = parseInt(period, 10) || 3000;
				this.txt = '';
				this.tick();
				this.isDeleting = false;
			};

			TxtType.prototype.tick = function() {
				var i = this.loopNum % this.toRotate.length;
				var fullTxt = this.toRotate[i];
				if (this.isDeleting) {
					this.txt = fullTxt.substring(0, this.txt.length - 1);
				} else {
					this.txt = fullTxt.substring(0, this.txt.length + 1);
				}

				this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
				var that = this;
				var delta = 200 - Math.random() * 100;

				if (this.isDeleting) { delta /= 2; }

				if (!this.isDeleting && this.txt === fullTxt) {
					delta = this.period;
					this.isDeleting = true;
				} else if (this.isDeleting && this.txt === '') {
					this.isDeleting = false;
					this.loopNum++;
					delta = 500;
				}

				setTimeout(function() {
					that.tick();
				}, delta);
			};

			window.onload = function() {
				var elements = document.getElementsByClassName('typewrite');
				for (var i=0; i<elements.length; i++) {
					var toRotate = elements[i].getAttribute('data-type');
					var period = elements[i].getAttribute('data-period');
					if (toRotate) {
						new TxtType(elements[i], JSON.parse(toRotate), period);
					}
				}
		    	// INJECT CSS
		    	var css = document.createElement("style");
		    	css.type = "text/css";
		    	css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
		    	document.body.appendChild(css);
		    };
		</script>
	</body>
</html>
