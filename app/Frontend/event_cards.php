<div class='w3-center w3-col w3-card w3-blue-grey' style='margin: 10px; padding: 10px; height: 45%; width: 23%;'>
  <div style='width: 100%; height: 30%;' id='card_title'>
    <span>Public Event</span>
  </div>
  <div style='height: 50%; overflow: hidden;'>
    <p>None</p><p>12:00 AM</p><p>12/12/2017 - 12/15/2017</p>
    <p>Test</p>
    <p>Test of features</p>
  </div>
  <button style='width: 40%; margin-right: 7.5%; margin-top: 5%;' class='w3-btn w3-red'>View</button><button style='width: 40%;' class='w3-btn w3-red'>Join</button>
</div>
<script src='jquery.min.js'></script>
<script src='jquery.textfill.min.js'></script>
<script>$('#card_title').textfill({});</script>



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