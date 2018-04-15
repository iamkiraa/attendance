<?php
include('header.php');
?>
<!-- Content start here -->
<div class="container" style="margin-top:50px">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
  <style>
  div.a {
    text-align: center;
	}
  </style>
  <div class="a">
  <h1> SEMSIRA </h1>
    <h4>Welcome to SMK SYED SIRAJUDDIN Portal</h4>
  </header>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <img src="assets/img/arau1.png" alt="boat" style="width:300%;min-height:200px;max-height:200px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    
  </div>
</div>
<p align = "left"><?php date_default_timezone_set("Asia/Kuala_Lumpur");
echo "Today is " . date("d/m/Y") . " ";?></p></span>


<div id="container">
	<img src="assets/img/cclub.png"><p><p><p>
		<p>Click <a href="login.php">Login</a> to enter the system</p>
		<p><p>
		<p>Click <a href="signup.php">here</a> to to sign up as a new member</p>
	</div>
</div>
<br>















	<div class="copyright text-center">
	<p align="center" valign = "bottom">© 2018 | All Rights Reserved</p>
	</div>
</body>
</html>
