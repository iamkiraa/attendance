<?php
include('header.php');
?>
<!-- Content start here -->
<div class="container" style="margin-top:50px">
<h2>Welcome to Sekolah Menengah Kebangsaan Dato' Sheikh Ahmad</h2>
<p>This is index page of Arau High School Computer Club</p>
<br>

<html lang="en">
<head>
	<title>jQuery Slideshow</title>
	<script>
	
	$("#slideshow > div:gt(0)").hide();

	setInterval(function() {
		$('#slideshow > div:first')
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo('#slideshow');
	}, 3000);
	
	</script>
	<style type="text/css">
	#slideshow {
		margin: 0px auto;
		position: relative;
		width: 100%;
		height: 450px;
	}

	#slideshow > div {
		position: absolute;
		top: 10px;
		left: 0px;
		right: 0px;
		bottom: 10px;
	}
	</style> 
</head>
<body>

<div id="slideshow">
	<div><img src="assets/img/attendance1.jpg" width="100%" height="400px"></div>
	<div><img src="assets/img/attendance2.jpg" width="100%" height="400px"></div>
	<div><img src="assets/img/attendance3.jpg" width="100%" height="400px"></div>
	<div><img src="assets/img/attendance4.jpg" width="100%" height="400px"></div>
	<div><img src="assets/img/attendance5.jpg" width="100%" height="400px"></div>
</div>

<div id="container">
	<img src="assets/img/cclub.png"><p><p><p>
		<p>Click <a href="login.php">Login</a> to enter the system</p>
		<p><p>
		<p>Click <a href="signup.php">here</a> to to sign up as a new member</p>
	</div>
</div>
<br>

</body>
</html>
