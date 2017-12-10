<?php session_start(); ?>

<html>
<head>
	<title>Simpleplanner - Home</title>
	<?php require 'header.html'; ?>
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


	<!-- Create Event Button -->
	<button class="w3-btn w3-round-xxlarge w3-xlarge w3-hover-light-grey w3-blue-grey" onclick="document.getElementById('create_event').style.display='block'" style="margin: 15px; padding-left: 20px; padding-right: 25px;">+ Create Event</button>


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
								<option value="1">Private</option>
								<option value="0">Public</option>
							</select>
						</div>
						<div class="w3-section">
							<input id="datepicker" class="w3-input" name="StartTime" type="text" required>
							<label>Start Time </label>
						</div>
						<div class="w3-section">
							<input id="datepicker" class="w3-input" name="EndTime" type="text" required>
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
						<input class="w3-center w3-btn w3-xlarge w3-hover-light-grey" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;" type="submit" value="Create Event" />
					</form>
				</div>
           </header>
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




		<!-- Event Cards -->
		<div class="w3-container" style="background-color: rgba(0,0,0,.87); width: 85%; margin: auto;">
			<div class='w3-row' style=' margin: auto;'>
				<?php
				//$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
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
					$i=0;
					while($row = $result->fetch_assoc()) {
						$tempStamp = strtotime($row['event_start_date_time']);
						$startTime = date('g:i A', $tempStamp);
						$startDate = date('m/d',$tempStamp);


						$tempStamp = strtotime($row['event_end_date_time']);
						$endTime = date('g:i A',$tempStamp);
						$endDate = date('m/d',$tempStamp);

						$title = $row["event_title"];
						if (empty($title) || $title==""){
							$title = "No Title";
						}
						if(($i % 4)==0 && $i!=0){
							echo "</div><div class='w3-row' style='margin: auto;'>";
						}
						echo "<div class='w3-center w3-col w3-card w3-blue-grey' style='margin: 10px; padding: 10px; height: 45%; width: 23%;'><header><h1>" . $title. "</h1></header><p>" . $row["event_location"]. "</p><p>" . $startTime;
						if($startTime!=$endTime){
							echo "-" . $endTime;
						}
						echo  "</p><p>" . $startDate;
						if($startDate!=$endDate){
							echo "-" . $endDate;
						}
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
			
			<hr>


			<!-- Google Map -->
			<h1>Events Happening Nearby</h1>
			<div id="map"></div>
			<hr>
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
			<?php require 'footer.html'; ?>
		</body>
		</html>
