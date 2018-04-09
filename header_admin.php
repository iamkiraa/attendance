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
<img src="assets/img/logos.png" style="width:10%">
<a class="navbar-brand hidden-xs hidden-sm" href="index.php" target="_blank">SMK SYED SIRAJUDDIN</a>

</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav navbar-right">
<li class="active"><a href="admin.php"><span class="glyphicon glyphicon-home"></span> Admin Home</a></li>

<li class="dropdown"><a type="button" data-toggle="dropdown" />
	<span class="glyphicon glyphicon-list"></span> View List
	<ul class="dropdown-menu">
	  <li><a href="admView_teacher.php">Teacher</a></li>
      <li><a href="admView_student.php">Student</a></li>
      <li><a href="admView_parent.php">Parent</a></li>
    </ul>
</li>
<li class="dropdown"><a type="button" data-toggle="dropdown" />
	<span class="glyphicon glyphicon-user"></span> Add Member
	<ul class="dropdown-menu">
      <li><a href="admAdd_student.php">Student</a></li>
      <li><a href="admAdd_parent.php">Parent</a></li>
	  <li><a href="admAdd_teacher.php">Teacher</a></li>
    </ul>
</li>
<li class="dropdown"><a type="button" data-toggle="dropdown" />
	<span class="glyphicon glyphicon-user"></span> Equipment
	<ul class="dropdown-menu">
      <li><a href="admView_subject.php">Subject</a></li>
      <li><a href="admView_class.php">Class</a></li>
	  <li><a href="admView_session.php">Session</a></li>
	  <li><a href="admView_stream.php">Stream</a></li>
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