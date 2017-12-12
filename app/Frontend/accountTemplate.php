<?php
if(!isset($_SESSION)) session_start();

$valid=$_SESSION['logged_in']===true;
if($valid) $id=$_SESSION['id'];
?>

<html>
<head>
  <title>Simpleplanner - Home</title>
  <?php require 'header.html'; ?>
  <style>
    * {box-sizing: border-box}

    /* Set height of body and the document to 100% */
    body, html {
        height: 100%;
        margin: 0;
    }

    /* Style tab links */
    .tablink {
        background-color: #555;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }
    footer{
      bottom:0;
    }
</style>
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
  <header class="w3-theme" id="Header" style="width: 33%;">
    <h1 style="color: #F64060;">Simpleplanner</h1>
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
    <input type="text" placeholder="  Search for an event..." name="search-criteria" id="search-criteria" style="width: 40%; border-radius: 30px; font-size: large; padding: 0; margin: 0;"/>
    <button type="submit" class="w3-button w3-hover-blue-grey" style="width: 30px; height: 30px; padding: 0; margin:0px; margin-bottom: 10px;" id="search" value="search"><img src="https://simpleplanner.herokuapp.com/Frontend/images/searchIconRed.png" style="width: 30px; height: 30px;"><i class="fa fa-search" style="zoom: 1.75;padding: 0; margin: 0;"></i></button>
    <header><h2>
      <!-- Create Event Button -->
      <button class="w3-btn w3-round-xxlarge w3-xlarge w3-hover-red" onclick="<?php if($valid){ echo "document.getElementById('create_event').style.display='block'";} else { echo "alert('You must log in first');window.location = 'https://simpleplanner.herokuapp.com/Frontend/login.php';";} ?>" style="color: red;margin: 15px; padding-left: 20px; padding-right: 20px;">+ Create Event</button></h2></header>
      </div>

      <!-- search script -->
      <script type="text/javascript">
      $('.w3-card').hide();
      $('#search').click(function(){
        $('.w3-card').hide();
        var s = $('#search-criteria').val();
        $('.w3-card').each(function(){
          if($(this).text().toUpperCase().indexOf(s.toUpperCase()) != -1){
            $(this).show();
          }
        });
      });
      </script>
      <hr style= "clear: both;
            display: block;
            position: relative;
            z-index: 10;
            margin-top: -1px;">



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
                <div class="w3-section">
                  <input class="w3-input" name="Location" type="text" required>
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

       <button class="tablink" onclick="openTab('current_events', this, 'red')" id="defaultOpen">Current</button>
        <button class="tablink" onclick="opeTab('past_events', this, 'green')">Past</button>
        <button class="tablink" onclick="openTab('all_events', this, 'blue')">All</button>
        <button class="tablink" onclick="openTab('create_events', this, 'orange')">Yours</button>


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
        <div id="all_events" class="tabcontent">
           <div class="w3-container" style="width: 85%; margin: auto;">
            <div class='w3-row' style=' margin: auto;'>
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
            if(isset($_SESSION['user_id'])){
              $sessionID=$_SESSION['user_id'];
              $sql = "SELECT event_title, event_description, event_location, event_start_date_time, event_end_date_time FROM events WHERE event_id IN (SELECT event_id FROM events_guests WHERE account_id='$sessionID') as my_events";
            }
            else{
              $sql = "";
              // echo '<script type="text/javascript">
              // alert("You must log in first");
              // window.location = "login.php";
              // </script>';
            }
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
        </div>
      </div>
      <hr>
      <div id="current_events" class="tabcontent">

      </div>

      <div id="past_events" class="tabcontent">

      </div>

      <div id="create_events" class="tabcontent">

      </div>

          <hr>


          <!-- Google Map -->
          <h1>Events Happening Nearby</h1>
          <div id="map"></div>
          <hr>
          <!-- Scripts for Google Map -->
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
          <script>
                function openTab(pageName,elmnt,color) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].style.backgroundColor = "";
                    }
                    document.getElementById(pageName).style.display = "block";
                    elmnt.style.backgroundColor = color;

                }
                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
              </script>

          <!-- Footer -->
          <?php require 'footer.html'; ?>
        </body>
        </html>

