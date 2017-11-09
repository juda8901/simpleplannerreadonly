<!DOCTYPE html>
<html>
<title>Simpleplanner</title>
<meta charset="UTF-8" lang="en" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="simpleplannerv2.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>
</head>

<body>

<!-- Top Buttons -->
<div id="LogInButtons" >
  <a href="#" class="w3-button w3-hover-white" style="color:#f13a59;">Home</a>
  <a href="" class=" w3-right w3-button" >Log in</a>
  <a onclick="document.getElementById('id01').style.display='block'" class=" w3-right w3-button" >Sign up</a>
  <a onclick="document.getElementById('id02').style.display='block'" class=" w3-right w3-button w3-hover-white" style="color:#f13a59;">Create an Event</a>
</div>

<!-- Header -->
<header class="w3-row-padding w3-container w3-theme" id="Header">
  <h1 >Simpleplanner</h1>
  <h2 class="quotes" style="display:none;">Planning made simple</h2>
  <h2 class="quotes" style="display:none;">Explore groups</h2>​​

</header>

<hr>

<!-- Modal for Create Event -->
<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-1 w3-animate-right">
      <header class="w3-container w3-card w3-round w3-theme-l1"> 
        <span onclick="document.getElementById('id02').style.display='none'"
        class="w3-button w3-display-topright">×</span>
  <div class="w3-center">
  <form class="w3-center w3-container w3-card-1" enctype="multipart/form-data" action="create_event_handler.php">
  <?php
	// Obtain a connection object by connecting to the db
	$connection = @mysqli_connect ("sql3.freemysqlhosting.net","sql3203668","663hN84yLR","sql3203668");
	if(mysqli_connect_errno()){
		echo "<h4>Failed to connect to database:</h4>".mysqli_connect_error();
	}
	else{
	}
	?>
    <h2>Create an Event!</h2>
    <div class="w3-section"> 
      <input class="w3-input" type="text" required>
      <label>Event Name&nbsp </label>
    </div>
    <div class="w3-section">      
      <input class="w3-input" type="text" required>
      <label>Time&nbsp </label>
    </div>
    <div class="w3-section">      
      <input class="w3-input" type="text" required>
      <label>Location&nbsp </label>
    </div>
	<div class="w3-section">      
      <input class="w3-input" type="text" required>
      <label>Host&nbsp </label>
    </div>
	<div class="w3-section">      
      <input class="w3-input" type="text" required>
      <label>Description&nbsp </label>
    </div>
	<div class="w3-section">      
      <input class="w3-input" type="text" required>
      <label>Attendees&nbsp </label>
    </div>
	<input class="w3-center w3-btn w3-xlarge w3-hover-light-grey" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;" type="submit" value="Create Event" /> &nbsp
      </header>
    </div>
  </form>
</div>

<!-- Modal for Signup -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-1 w3-animate-right">
      <header class="w3-container w3-card w3-round w3-theme-l1"> 
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright">×</span>
  <div class="w3-center">
  <form class="w3-center w3-container w3-card-1">
    <h2>Join Simpleplanner today</h2>
    <div class="w3-section">      
      <input class="w3-input" type="text" required>
      <label>Full name</label>
    </div>
    <div class="w3-section">      
      <input class="w3-input" type="text" required>
      <label>Email</label>
    </div>
    <div class="w3-section">      
      <input class="w3-input" type="text" required>
      <label>Password</label>
    </div>
    <button class="w3-center w3-btn w3-xlarge w3-hover-light-grey" onclick="" style="color: #f13a59; margin: 20px 20px 20px 20px; width:40%; font-weight:650;">Sign up</button>
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
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDKE8pn4aOs2nsQ8pkn9vxxLJQu6KYI90&callback=initMap">
  </script>
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