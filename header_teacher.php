<!DOCTYPE html>
<html>
<head>
<title>Administrator Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css" >
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/tooltip.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>
<!-- AJAX -->
<script>
function showResult(str) {
if (str.length==0) {
document.getElementById("livesearch").innerHTML="";
document.getElementById("livesearch").style.background="transparent";
document.getElementById("livesearch").style.border="0px";
return;
}
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
} else { // code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
if (this.readyState==4 && this.status==200) {
document.getElementById("livesearch").innerHTML=this.responseText;
document.getElementById("livesearch").style.border="1px solid #A5ACB2";
document.getElementById("livesearch").style.background="#FFFFFF";
document.getElementById("livesearch").style.padding="5px 10px 5px 10px"; }
}
xmlhttp.open("GET","livesearch.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>
<body>
<!-- top navigation-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand hidden-xs hidden-sm" href="index.php" target="_blank">SMK SYED SIRAJUDDIN</a>
</div>

<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav navbar-right">
<li class="active"><a href="teacher.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
<li>
  <a href="add_teacher_data.php" data-toggle="tooltip" data-placement="bottom" title="Teacher Information"><span class="glyphicon glyphicon-pencil"></span> Add Teacher Data</a>
</li>
<li>
  <a href="teaProfile_teacher.php" data-toggle="tooltip" data-placement="bottom" title="Teacher Details"><span class="glyphicon glyphicon-list"></span>Teacher Profile</a>
</li>
<li class="dropdown"><a type="button" data-toggle="dropdown" />
	 Register Student	 <span class="caret"></span>
	<ul class="dropdown-menu">
      <li><a href="teaReg_student.php">Student Registration</a></li>
      <li><a href="teaReg_view.php">View Student</a></li>
    </ul>
</li>
<li class="dropdown"><a type="button" data-toggle="dropdown" />
	 View List <span class="caret"></span>
	<ul class="dropdown-menu">
      <li><a href="teaView_student.php">Student</a></li>
      <li><a href="teaView_parent.php">Parent</a></li>
    </ul>
</li>
<li class="dropdown"><a type="button" data-toggle="dropdown" />
	 Add Member <span class="caret"></span>
	<ul class="dropdown-menu">
      <li><a href="teaAdd_student.php">Student</a></li>
      <li><a href="teaAdd_parent.php">Parent</a></li>
    </ul>
</li>
<li class="dropdown"><a type="button" data-toggle="dropdown"/>
	 Equipment <span class="caret"></span>
	<ul class="dropdown-menu">
      <li><a href="attendance.php">Attendance</a></li>
      <li><a href="">Report</a></li>
	  

    </ul>
</li>

</ul>
</div>
</div>
<div class="container">
<div class="pull-left">
Welcome, <i><?php echo $_SESSION['username']; ?></i>
</div>
<div class="pull-right">
<a class="navbar-link" href="logout.php">Logout</a>
</div>
</div>
</nav>