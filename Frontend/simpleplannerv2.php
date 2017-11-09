<!DOCTYPE html>
<html>
<title>Simpler planner Home Page</title>
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
  <a href="#" style="margin: 15px 15px 15px 15px;">
  	<img src="treeLogo.png" style="width:40px;height:40px;"></a>
  <a href="login.php" class=" w3-right w3-button w3-hover-white" >Log in</a>
  <a onclick="document.getElementById('id01').style.display='block'" class=" w3-right w3-button w3-hover-white" >Sign up</a>
  <a href="" class=" w3-right w3-button w3-hover-white" style="color:#f13a59;">Create a group</a>
</div>

<br>
<br>

<!-- Header -->
<header class="w3-row-padding w3-container w3-theme" id="Header">
  <h1 >Simpleplanner</h1>
	<h2>
	  <a href="" class="typewrite" style="text-decoration: none; font-size: 25px; color:#2e3e48; "data data-type='[ "Planning made simple.", "Change the world.", "Flawlessly connect with others." ]'>
	    <span class="wrap"></span>
	  </a>
	</h2>

</header>

<br>
<hr style=" margin-bottom: 0em;">


<!-- Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-1 w3-animate-top">
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

<div id="cards" style="background:#f2f2f2;">
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
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDKE8pn4aOs2nsQ8pkn9vxxLJQu6KYI90&callback=initMap">
  </script>
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