<div class="w3-bar w3-blue-grey w3-top">
  <a href="https://simpleplanner.herokuapp.com" class="w3-bar-item w3-left w3-button w3-hover-blue-grey"><img src="https://simpleplanner.herokuapp.com/Frontend/images/treeLogo.png" style="width: 20px; height: 20px;">   Simpleplanner</a>
  <!--
  <div id="search_bar" class="w3-bar-item" style="padding: 5px; margin-left: 25%; text-align: center;">
    <input type="text" placeholder="  Search..." name="search" style="width: 500px; border-radius: 15px;">
    <button type="submit" class="w3-button w3-hover-blue-grey" style="width:25px;padding:0px;margin:0px;"><i class="fa fa-search"></i></button>
  </div>-->
  <a href="Frontend/login.php" class="w3-bar-item w3-right w3-button w3-hover-white" id="login">Log In</a>
  <a href="<?php session_unset();session_destroy(); ?>" class="w3-bar-item w3-right w3-button w3-hover-white" id="logout">Log Out</a>
  <a onclick="document.getElementById('sign_up').style.display='block'" class=" w3-bar-item w3-right w3-button w3-hover-white" id="reg">Sign Up</a>
  <a onclick="document.getElementById('create_group').style.display='block'" class=" w3-bar-item w3-right w3-button w3-hover-white" style="color: red;" id="group">Create a Group</a>
</div>

<?php
if($_SESSION['user_id'] != NULL){
  echo "<script>document.getElementById('login').style.display='none'; document.getElementById('logout').style.display='block';document.getElementById('reg').style.display='block';</script>";
} else {
  echo "<script>document.getElementById('login').style.display='block'; document.getElementById('logout').style.display='none';</script>";
}

require 'sign_up.html';
require 'create_group.html';
?>