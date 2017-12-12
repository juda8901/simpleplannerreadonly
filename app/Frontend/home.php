<?php
if(!isset($_SESSION)) session_start();

$valid=$_SESSION['logged_in']===true;
if($valid) $id=$_SESSION['id'];
?>

<html>
<head>
	<title>Simpleplanner - Home</title>
	<?php require 'header.html'; ?>
</head>
<body>
	<!-- Navigation Bar -->
	<?php require 'nav_bar.php'; ?>


	<!-- Header -->
	<div class="homepage-hero-module" style="margin-top: 40px;">
		<div class="video-container" style="z-index: -1;">
			<div class="title-container" ></div>
			<div class="filter"></div>
			<header class="w3-theme" id="Header">
				<h1 style="color: #f13a59;">Simpleplanner</h1>
				<h2>
					<a class="typewrite" style="text-decoration: none; font-size: 25px; color:#212C33; background-color: rgba(FF,FF,FF,0.2);" data-type='[ "Planning made simple.", "Change the world.", "Flawlessly connect with others." ]'>
						<span class="wrap"></span>
					</a>
				</h2>
			</header>
			<video autoplay loop class="fillWidth">
				<source src="https://simpleplanner.herokuapp.com/Frontend/We-Work-We-Wait.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
				<source src="https://simpleplanner.herokuapp.com/Frontend/We-Work-We-Wait.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>
			<!--<div class="poster hidden">
			<img src="https://simpleplanner.herokuapp.com/Frontend/Up.jpg" alt="">
		</div> -->
	</div>
</div>
<br>
<!--
<script >
$( document ).ready(function() {

scaleVideoContainer();

initBannerVideoSize('.video-container .poster img');
initBannerVideoSize('.video-container .filter');
initBannerVideoSize('.video-container video');

$(window).on('resize', function() {
scaleVideoContainer();
scaleBannerVideoSize('.video-container .poster img');
scaleBannerVideoSize('.video-container .filter');
scaleBannerVideoSize('.video-container video');
});

});

function scaleVideoContainer() {

var height = $(window).height() + 5;
var unitHeight = parseInt(height) + 'px';
$('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

$(element).each(function(){
$(this).data('height', $(this).height());
$(this).data('width', $(this).width());
});

scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

var windowWidth = $(window).width(),
windowHeight = $(window).height() + 5,
videoWidth,
videoHeight;

// console.log(windowHeight);

$(element).each(function(){
var videoAspectRatio = $(this).data('height')/$(this).data('width');

$(this).width(windowWidth);

if(windowWidth < 1000){
videoHeight = windowHeight;
videoWidth = videoHeight / videoAspectRatio;
$(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

$(this).width(videoWidth).height(videoHeight);
}

$('.homepage-hero-module .video-container video').addClass('fadeIn animated');

});
}
</script>-->


<!-- Header
<header class="w3-theme" id="Header">
<h1 style="color: #F64060;">Simpleplanner</h1>
<h2>
<a href="" class="typewrite" style="text-decoration: none; font-size: 25px; color:#2e3e48;" data-type='[ "Planning made simple.", "Change the world.", "Flawlessly connect with others." ]'>
<span class="wrap"></span>
</a>
</h2>
</header> -->


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


<!-- search bar -->
<div style ="position: -webkit-sticky; position: sticky; top: 37px; background-color: white;">
	<form id="search_bar" style="width: 100%; text-align: center;" onsubmit="return false">
		<input type="search" placeholder="  Search for events or clubs" name="search-criteria" id="search-criteria" >
		<button type="submit" style="background: transparent; border: none !important; width: 30px; height: 30px; padding: 0; margin:0px; margin-bottom: 10px;" id="search" value="search"><img src="https://simpleplanner.herokuapp.com/Frontend/images/searchIconRed.png" style="width: 30px; height: 30px;"></button>
	</input>
</form>
</div>

<!-- search script -->
<script type="text/javascript">
$('.event_card').hide();
$('#search').click(function(){
	$('.event_card').hide();
	var s = $('#search-criteria').val();
	$('.event_card').each(function(){
		if($(this).text().toUpperCase().indexOf(s.toUpperCase()) != -1){
			$(this).show();
		}
	});
});
</script>


<!-- Create Event Button -->
<div>
	<button class="w3-btn w3-round-xxlarge w3-xlarge w3-hover-red" style="color: red; margin: 15px; padding-left: 20px; padding-right: 20px; box-shadow: 5px 5px 5px 0px rgba(0,0,0,.2);" onclick="<?php if($valid){	echo "document.getElementById('create_event').style.display='block'";} else {	echo "alert('You must log in first');window.location = 'https://simpleplanner.herokuapp.com/Frontend/login.php';";} ?>">+ Create Event</button>
	</div>
</div>
<hr style="display: block; height: 0px; border: 0; border-bottom: 1px solid #ccc; margin:0;padding: 0;" >
    


<!-- Modal for Create Event -->
<?php require 'create_event.html'; ?>


<!-- Event Cards -->
<?php require 'event_cards.php'; ?>
<hr style="display: block; height: 0px; border: 0; border-top: 1px solid #ccc; margin:0; padding: 0;" >

<br>
	<br>
	<br>
	<br>
	<br>
	
	
		<!-- Footer -->
		<?php require 'footer.html'; ?>
	</body>
	</html>
