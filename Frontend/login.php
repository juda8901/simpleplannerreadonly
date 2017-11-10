<!DOCTYPE html>
<html>
<meta charset="UTF-8" lang="en" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="simpleplannerv2.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
	<title>Simpleplanner login page</title>
</head>

<style>

body{
	background:#f2f2f2;
}

form {
	margin: 20px 0px 20px 0px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width:20em;
    height:25em;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 12px;
}

button {
    background-color: #25CB68;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

<body>

<!-- Top Buttons -->
<div id="LogInButtons" >
  <a href="simpleplannerv2.html" class="w3-button w3-hover-white" style="color:#f13a59;">Home</a>
  <a href="login.html" class=" w3-right w3-button w3-hover-white" >Log in</a>
  <a onclick="document.getElementById('id01').style.display='block'" class=" w3-right w3-button w3-hover-white" >Sign up</a>
  <a href="" class=" w3-right w3-button w3-hover-white" style="color:#f13a59;">Create a group</a>
</div>

<br>

<center>

<form action="/action_page.php">
  <h1 style="float:left; margin:10px 10px 10px 20px;"> Login </h1>
  <br>
  <br>

  <div class="container">
    <input type="text" placeholder="Email" name="uname" required>

    <input type="password" placeholder="Password" name="psw" required>
        
    <button type="submit">Login</button>
    <input type="checkbox" checked="checked" style="float:left">
    <p style="font-size:12px; float:left; margin"> Remember me </p>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</center>

<br>

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





</body>
</html>
