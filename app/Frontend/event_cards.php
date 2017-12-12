<div style = "background-color: #fafafa">
  <header style="padding-left: 15;"><h1>
    <?php
    if($valid){
      echo "Your Events";
    } else {
      echo "Popular Events";
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
        die("Connection failed: ".$conn->connect_error);
      }

      $sql = "SELECT DISTINCT event_title, event_description, event_location, event_start_date_time, event_end_date_time, event_start_time, event_end_time, event_tags FROM events WHERE event_is_hidden=0;";
      if($valid){
        $sql = "SELECT DISTINCT events.event_title, events.event_description, events.event_location, events.event_start_date_time, events.event_end_date_time, events.event_start_time, events.event_end_time, events.event_tags FROM events INNER JOIN event_guests WHERE events.event_host_account_id='$id' OR events.event_is_hidden=0 OR (event_guests.account_id='$id' AND event_guests.event_id=events.event_id);";
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

          date_default_timezone_set('America/Denver');
          $currentdate = date('m/d/Y', time()-86400);	//86400 is 24hrs so it will show events from previous day forward
          $time = strtotime($endDate);
          $eventend = date('m/d/Y',$time);
          if($eventend < $currentdate){
            continue;
          }

          if (empty($title) || $title==""){
            $title = "No Title";
          }
          if(($i % 4)==0 && $i!=0){
            echo "</div><div class='w3-row' style='margin: auto;'>";
          }
          echo "<div class='w3-center w3-col w3-card w3-blue-grey event_card' style='margin: 10px; padding: 10px; height: 45%; width: 23%;'>
          <div style='width: 100%; height: 30%;' class='card_title'><span>".$title."</span></div>
          <div style='height: 53%; overflow: hidden;'>
          <p>".$row["event_location"]."</p>
          <p>".$startTime;
          if($startTime!=$endTime){
            echo " - ".$endTime;
          }
          echo  "</p>
          <p>".$startDate;
          if($startDate!=$endDate){
            echo " - ".$endDate;
          }
          echo "</p>
          <p>".$row["event_tags"];
          echo "</p>
          <p>".$row["event_description"]."</p>
          </div>
          <button style='width: 40%; margin: 5%;' class='w3-btn w3-red'>View</button><button style='width: 40%; margin: 5%;' class='w3-btn w3-red'>Join</button></div>";

          // echo "<div class='w3-center w3-col w3-card w3-blue-grey' style='margin: 10px; padding: 10px; height: 45%; width: 23%;'><header><h1>" . $title. "</h1></header><p>" . $row["event_location"]. "</p><p>" . $startTime;
          // if($startTime!=$endTime){
          //   echo " - " . $endTime;
          // }
          // echo  "</p><p>" . $startDate;
          // if($startDate!=$endDate){
          //   echo " - " . $endDate;
          // }
          // echo "</p><p>" . $row["event_tags"];
          // echo "</p><p>" . $row["event_description"]. "</p><button>Contact</button></div>";
          $i++;
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </div>
  </div>
  <script src="jquery.min.js"></script>
  <script src="jquery.textfill.min.js"></script>
  <script>
  var elements = document.getElementsByClassName('typewrite');
	for (var i=0; i<elements.length; i++) {
		elements[i].textfill({ maxFontPixels: 36 });
	}
  </script>
