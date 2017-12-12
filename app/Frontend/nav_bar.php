<div class="w3-bar w3-white w3-top" style =" top:0; left:0; z-index:1;">
  <a href="https://simpleplanner.herokuapp.com" class="w3-left"><img src="https://simpleplanner.herokuapp.com/Frontend/images/treeLogo.png" style="margin-top: 5px; margin-left: 5px; width: 30px; height: 30px;"/></a>
  <a href="https://simpleplanner.herokuapp.com/Frontend/login.php" class="w3-bar-item w3-right w3-button w3-hover-ligth-gray" style="height: 40px;" id="login">Log In</a>
  <a href="https://simpleplanner.herokuapp.com/Backend/logout.php" class="w3-bar-item w3-right w3-button w3-hover-light-gray" style="height: 40px;" id="logout">Log Out</a>
  <a onclick="document.getElementById('sign_up').style.display='block'" class=" w3-bar-item w3-right w3-button w3-hover-light-gray" style="height: 40px;" id="reg">Sign Up</a>
  <a onclick="<?php if($valid){	echo "document.getElementById('create_group').style.display='block'";} else {	echo "alert('You must log in first');window.location = 'https://simpleplanner.herokuapp.com/Frontend/login.php';";} ?>" class=" w3-bar-item w3-right w3-button w3-hover-red" style="color: #F64060; height: 40px;" id="group">Create a Group</a>
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
