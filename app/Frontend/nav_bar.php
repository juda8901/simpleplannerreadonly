<div class="w3-bar w3-white w3-top" style= " box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.11);">
  <a href="https://simpleplanner.herokuapp.com" class="w3-bar-item w3-left w3-button "><img src="https://simpleplanner.herokuapp.com/Frontend/images/treeLogo.png" style="width: 30px; height: 30px;"></a>
<div class="w3-bar w3-white w3-top">
  <a href="https://simpleplanner.herokuapp.com" class="w3-bar-item w3-left w3-button w3-hover-blue-grey"><img src="https://simpleplanner.herokuapp.com/Frontend/images/treeLogo.png" style="width: 20px; height: 20px;"><span id="nav_title" style="display: none;">  Simpleplanner</span></a>
  <a href="Frontend/login.php" class="w3-bar-item w3-right w3-button w3-hover-white" id="login">Log In</a>
  <a href="https://simpleplanner.herokuapp.com/Backend/logout.php" class="w3-bar-item w3-right w3-button w3-hover-white" id="logout">Log Out</a>
  <a onclick="document.getElementById('sign_up').style.display='block'" class=" w3-bar-item w3-right w3-button w3-hover-white" id="reg">Sign Up</a>
  <a onclick="<?php if($valid){	echo "document.getElementById('create_group').style.display='block'";} else {	echo "alert('You must log in first');window.location = 'https://simpleplanner.herokuapp.com/Frontend/login.php';";} ?>" class=" w3-bar-item w3-right w3-button w3-hover-red" style="color: red;" id="group">Create a Group</a>
</div>


<?php
if($valid){
  echo "<script>document.getElementById('login').style.display='none'; document.getElementById('logout').style.display='block'; document.getElementById('reg').style.display='none';</script>";
} else {
  echo "<script>document.getElementById('login').style.display='block'; document.getElementById('logout').style.display='none'; document.getElementById('reg').style.display='block';</script>";
}

require 'sign_up.html';
require 'create_group.html';
?>
