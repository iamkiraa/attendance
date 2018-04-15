<?php
include('check_admin.php');
include('header_admin.php');
?>
<!-- Content start here -->
<!DOCTYPE html>
<html>
<head>
	<tittle></tittle>
	
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/jquery.min.js"></script>
		
</head>
<body>

	<div class="panel panel-default container" style="margin-top:100px">
	<div class="panel-heading">
	<h1 style="text-align: center;">- VIEW DETAILS -</h1>
	</div>
		<span> <p align = "right"><?php date_default_timezone_set("Asia/Kuala_Lumpur");
		echo "Today is " . date("d/m/Y") . " ";?></p></span>
<div class="panel-body"> 
	
	<a href="admAdd_subject.php" class="btn btn-primary">Insert New Subject</a>
	














