<?php
include('check_teacher.php'); //check if user if an administrator
include('header_teacher.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/attendance.css">
		<link rel="stylesheet" href="assets/form-basic.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<style type="text/css">
	.dd {
	font-size: 14px;
}
    .gk {
	font-size: 24px;
}
    .back {
	font-size: medium;
}
    </style>
</head>
<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] == "Teacher"){
?>

<html>
<title>SEARCH PEMOHON</title>
<body>
<br>
<br>
<br>

<p align="center"><b> <span class="gk">Masukkan Nombor Kad Pengenalan Pemohon</span>
<form name="form" method="post" action="search0.php">
  <p align="center"><input name="number" type="text" size="45">
<font color=black size='4pt'><input type="submit" name="Submit" value="CARI">
  <p align="center">  
<p>&nbsp;</p>
<p align="center"><font color=black size='4pt'><button class="back" onclick="goBack()">KEMBALI</button></font></p>
<script>
function goBack() {
    window.history.back();
}
</script>
</form> 
</body>
</html>
</html>
