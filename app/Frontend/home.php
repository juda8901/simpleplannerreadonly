<?php
if(!isset($_SESSION)) session_start();

$valid=$_SESSION['logged_in']===true;
if($valid) $id=$_SESSION['id'];
?>

<html>
<head>
	<title>Simpleplanner - Home</title>
	<?php require 'header.html'; ?>
	<!-- <style>
	input[type=text] {
	width: 130px;
	box-sizing: border-box;
	border: 2px solid #ccc;
	border-radius: 4px;
	font-size: 16px;
	background-color: white;
	background-image: url('searchicon.png');
	background-position: 10px 10px;
	background-repeat: no-repeat;
	padding: 12px 20px 12px 40px;
	-webkit-transition: width 0.4s ease-in-out;
	transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
width: 100%;
}
</style> -->
</head>
<body>
	<!-- Navigation Bar -->
	<?php require 'nav_bar.php'; ?>
	<br><br>


	<!-- Header -->
	<header class="w3-theme" id="Header">
		<h1>Simpleplanner</h1>
		<h2>
			<a href="" class="typewrite" style="text-decoration: none; font-size: 25px; color:#2e3e48;" data-type='[ "Planning made simple.", "Change the world.", "Flawlessly connect with others." ]'>
				<span class="wrap"></span>
			</a>
		</h2>
	</header>

	<!-- Scripts for Header -->
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
	<hr>

	<!-- search bar -->
	<div id="search_bar" style="width: 100%; text-align: center;">
		<input type="text" placeholder="  Search for an event..." name="search-criteria" id="search-criteria" style="width: 40%; border-radius: 30px; font-size: x-large; padding: 0; margin: 0;"/>
		<button type="submit" class="w3-button w3-hover-blue-grey" style="width: 30px; height: 30px; padding: 0; margin:0px;" id="search" value="search"><img src="https://simpleplanner.herokuapp.com/Frontend/images/searchIcon2.png" style="width: 30px; height: 30px;"><i class="fa fa-search" style="zoom: 1.75; padding: 0; margin: 0;"></i></button>
		<header><h2>
			<!-- Create Event Button -->
			<button class="w3-btn w3-round-xxlarge w3-xlarge w3-hover-light-grey w3-blue-grey" onclick="<?php if($valid){	echo "document.getElementById('create_event').style.display='block'";} else {	echo "alert('You must log in first');window.location = 'https://simpleplanner.herokuapp.com/Frontend/login.php';";} ?>" style="margin: 15px; padding-left: 20px; padding-right: 20px;">+ Create Event</button></h2></header>
			</div>

			<!-- search script -->
			<script type="text/javascript">
			$('.w3-row').hide();
			$('#search').click(function(){
				$('.w3-row').hide();
				var s = $('#search-criteria').val();
				$('.w3-row').each(function(){
					if($(this).text().toUpperCase().indexOf(s.toUpperCase()) != -1){
						$(this).show();
					}
				});
			});
			</script>
			<hr no shade>


			<!-- Modal for Create Event -->
			<div id="create_event" class="w3-modal">
				<div class="w3-modal-content w3-card-1 w3-animate-top">
					<header class="w3-container w3-card w3-round w3-theme-l1">
						<span onclick="document.getElementById('create_event').style.display='none'"
						class="w3-button w3-display-topright">×</span>
						<div class="w3-center">
							<form class="w3-center w3-container w3-card-1" enctype="multipart/form-data" action="/Backend/create_event_handler.php">
								<h2>Create an Event!</h2>
								<div class="w3-section">
									<input class="w3-input" name="EventTitle" type="text" required>
									<label>Event Title</label>
								</div>
								<div class="w3-section">
									<select class="w3-input" name="PrivPub">
										<option value="0">Public</option>
										<option value="1">Private</option>
									</select>
								</div>
								<div class="w3-section">
									<input class="w3-input" id="datepicker1" name="StartDate" type="text" required>
									<label>Start Date </label>
								</div>
								<div class="w3-section">
									<select class="w3-input" name="StartTime" type="text" required>
										<option value="12:00 AM">12:00 AM</option>
										<option value="12:30 AM">12:30 AM</option>
										<option value="01:00 AM">01:00 AM</option>
										<option value="01:30 AM">01:30 AM</option>
										<option value="02:00 AM">02:00 AM</option>
										<option value="02:30 AM">02:30 AM</option>
										<option value="03:00 AM">03:00 AM</option>
										<option value="03:30 AM">03:30 AM</option>
										<option value="04:00 AM">04:00 AM</option>
										<option value="04:30 AM">04:30 AM</option>
										<option value="05:00 AM">05:00 AM</option>
										<option value="05:30 AM">05:30 AM</option>
										<option value="06:00 AM">06:00 AM</option>
										<option value="06:30 AM">06:30 AM</option>
										<option value="07:00 AM">07:00 AM</option>
										<option value="07:30 AM">07:30 AM</option>
										<option value="08:00 AM">08:00 AM</option>
										<option value="08:30 AM">08:30 AM</option>
										<option value="09:00 AM">09:00 AM</option>
										<option value="09:30 AM">09:30 AM</option>
										<option value="10:00 AM">10:00 AM</option>
										<option value="10:30 AM">10:30 AM</option>
										<option value="11:00 AM">11:00 AM</option>
										<option value="11:30 AM">11:30 AM</option>
										<option value="12:00 PM">12:00 PM</option>
										<option value="12:30 PM">12:30 PM</option>
										<option value="01:00 PM">01:00 PM</option>
										<option value="01:30 PM">01:30 PM</option>
										<option value="02:00 PM">02:00 PM</option>
										<option value="02:30 PM">02:30 PM</option>
										<option value="03:00 PM">03:00 PM</option>
										<option value="03:30 PM">03:30 PM</option>
										<option value="04:00 PM">04:00 PM</option>
										<option value="04:30 PM">04:30 PM</option>
										<option value="05:00 PM">05:00 PM</option>
										<option value="05:30 PM">05:30 PM</option>
										<option value="06:00 PM">06:00 PM</option>
										<option value="06:30 PM">06:30 PM</option>
										<option value="07:00 PM">07:00 PM</option>
										<option value="07:30 PM">07:30 PM</option>
										<option value="08:00 PM">08:00 PM</option>
										<option value="08:30 PM">08:30 PM</option>
										<option value="09:00 PM">09:00 PM</option>
										<option value="09:30 PM">09:30 PM</option>
										<option value="10:00 PM">10:00 PM</option>
										<option value="10:30 PM">10:30 PM</option>
										<option value="11:00 PM">11:00 PM</option>
										<option value="11:30 PM">11:30 PM</option>
									</select>
									<label>Start Time </label>
								</div>
								<div class="w3-section">
									<input class="w3-input" id="datepicker2" name="EndDate" type="text" required>
									<label>End Date </label>
								</div>
								<div class="w3-section">
									<select class="w3-input" name="EndTime" type="text" required>
										<option value="12:00 AM">12:00 AM</option>
										<option value="12:30 AM">12:30 AM</option>
										<option value="01:00 AM">01:00 AM</option>
										<option value="01:30 AM">01:30 AM</option>
										<option value="02:00 AM">02:00 AM</option>
										<option value="02:30 AM">02:30 AM</option>
										<option value="03:00 AM">03:00 AM</option>
										<option value="03:30 AM">03:30 AM</option>
										<option value="04:00 AM">04:00 AM</option>
										<option value="04:30 AM">04:30 AM</option>
										<option value="05:00 AM">05:00 AM</option>
										<option value="05:30 AM">05:30 AM</option>
										<option value="06:00 AM">06:00 AM</option>
										<option value="06:30 AM">06:30 AM</option>
										<option value="07:00 AM">07:00 AM</option>
										<option value="07:30 AM">07:30 AM</option>
										<option value="08:00 AM">08:00 AM</option>
										<option value="08:30 AM">08:30 AM</option>
										<option value="09:00 AM">09:00 AM</option>
										<option value="09:30 AM">09:30 AM</option>
										<option value="10:00 AM">10:00 AM</option>
										<option value="10:30 AM">10:30 AM</option>
										<option value="11:00 AM">11:00 AM</option>
										<option value="11:30 AM">11:30 AM</option>
										<option value="12:00 PM">12:00 PM</option>
										<option value="12:30 PM">12:30 PM</option>
										<option value="01:00 PM">01:00 PM</option>
										<option value="01:30 PM">01:30 PM</option>
										<option value="02:00 PM">02:00 PM</option>
										<option value="02:30 PM">02:30 PM</option>
										<option value="03:00 PM">03:00 PM</option>
										<option value="03:30 PM">03:30 PM</option>
										<option value="04:00 PM">04:00 PM</option>
										<option value="04:30 PM">04:30 PM</option>
										<option value="05:00 PM">05:00 PM</option>
										<option value="05:30 PM">05:30 PM</option>
										<option value="06:00 PM">06:00 PM</option>
										<option value="06:30 PM">06:30 PM</option>
										<option value="07:00 PM">07:00 PM</option>
										<option value="07:30 PM">07:30 PM</option>
										<option value="08:00 PM">08:00 PM</option>
										<option value="08:30 PM">08:30 PM</option>
										<option value="09:00 PM">09:00 PM</option>
										<option value="09:30 PM">09:30 PM</option>
										<option value="10:00 PM">10:00 PM</option>
										<option value="10:30 PM">10:30 PM</option>
										<option value="11:00 PM">11:00 PM</option>
										<option value="11:30 PM">11:30 PM</option>
									</select>
									<label>End Time </label>
								</div>
								<div class="w3-section" id="locationField">
									<input class="w3-input" name="Location" id="autocomplete" placeholder="Enter the address" onFocus="geolocate()" type="text" required>
									<label>Location </label>
								</div>
								<div class="w3-section">
									<input class="w3-input" name="Description" type="text" required>
									<label>Description </label>
								</div>
								<div class="w3-section">
									<input class="w3-input" name="Tags" type="text" required>
									<label>Tags </label>
								</div>
								<input type="submit" class="w3-center w3-btn w3-xlarge w3-hover-white w3-blue-grey" value="Create Event" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;"/>
							</form>
						</div>
					</header>
				</div>
			</div>

				<!-- Event Cards -->
				<div style = "background-color: #fafafa"> 
				<header><h1>
					<?php
					if($valid){
						echo "Your Events";
					} else {
						echo "All Events";
					}
					?>
				</h1></header>
				<div class="w3-container" style="width: 85%; margin: auto;">
					<div class='w3-row' style='margin: auto;'>
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

						$sql = "SELECT event_title, event_description, event_location, event_start_date_time, event_end_date_time, event_start_time, event_end_time, event_tags FROM events;";
						if($valid){
							$sql = "SELECT event_title, event_description, event_location, event_start_date_time, event_end_date_time, event_start_time, event_end_time, event_tags FROM events WHERE event_host_account_id='$id';";
						}
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							$i=0;
							while($row = $result->fetch_assoc()) {
								$startDate = $row['event_start_date_time'];
								$startTime = $row['event_start_time'];
								$endDate = $row['event_end_date_time'];
								$endTime = $row['event_end_time'];

								$title = $row["event_title"];
								if (empty($title) || $title==""){
									$title = "No Title";
								}
								if(($i % 4)==0 && $i!=0){
									echo "</div><div class='w3-row' style='margin: auto;'>";
								}
								echo "<div class='w3-center w3-col w3-card w3-blue-grey' style='margin: 10px; padding: 10px; height: 45%; width: 23%;'><header><h1>" . $title. "</h1></header><p>" . $row["event_location"]. "</p><p>" . $startTime;
								if($startTime!=$endTime){
									echo " - " . $endTime;
								}
								echo  "</p><p>" . $startDate;
								if($startDate!=$endDate){
									echo " - " . $endDate;
								}
								echo "</p><p>" . $row["event_tags"];
								echo "</p><p>" . $row["event_description"]. "</p><button>Contact</button></div>";
								$i++;
							}
						} else {
							echo "0 results";
						}
						echo "</div>";
						$conn->close();
						?>
					</div>
				</div>

					<hr>


					<!-- Google Map -->
					<h1>Events Happening Nearby</h1>
					<div id="map"></div>

					<!-- Scripts for Google Map -->
					<script>
					function initialize() {
						initMap();
						initAutoComplete();
					}
					function initMap() {
						var Boulder = {lat: 40.027443, lng: -105.25174};
						var map = new google.maps.Map(document.getElementById('map'), {
							zoom: 13,
							center: Boulder
						});
						var marker = new google.maps.Marker({
							position: Boulder,
							map: map
						});
					}
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
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLsFEUG5AKf3-PEgQryg5RxPsQdD89dsI&signed_in=true&libraries=places&callback=initialize" async defer></script>


					<!-- Footer -->
					<?php require 'footer.html'; ?>
				</body>
				</html>
