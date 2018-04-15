<?php
include('check_teacher.php'); //check if user if an teacher
include('header_teacher.php'); //load header content for teacher page
include("connection.php"); // connection to database
?>
<!DOCTYPE html>
<html>
<head>
	<tittle>Student Registration</tittle>
	
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/jquery.min.js"></script>
		
</head>
<body>

	<div class="panel panel-default container" style="margin-top:100px">
	<div class="panel-heading">
	<h1 style="text-align: center;">&ndash; Student Registration &ndash;</h1>
	</div>
	<span> <p align = "right"><?php date_default_timezone_set("Asia/Kuala_Lumpur");
		echo "Today is " . date("d/m/Y") . " ";?></p></span>
	
	<hr/>
 
<?php
if(isset($_POST['add'])){ // if button Add clicked

$sessionID = $_POST['sessionID'];
$studentID = $_POST['studentID'];
$name = $_POST['name'];
$classID = $_POST['classID'];
$className = $_POST['className'];
$parentID = $_POST['parentID'];
$parentName = $_POST['parentName'];

$check = mysqli_query($connection, "SELECT * FROM reg_studclass WHERE studentID='$studentID'"); // query for selected ic number

if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database

$insert = mysqli_query($connection, "INSERT INTO reg_studclass(sessionID, studentID, name, classID, className, parentID, parentName) VALUES('$sessionID','$studentID','$name', '$classID', '$className', '$parentID','$parentName')") or die(mysqli_error()); // query for adding data into database
if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new student added.. <a href="teaReg_student.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new student! <a href=""><teaReg_student.php- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>IC Number already exist..! <a href="teaReg_student.php"><- Back</a></div>'; // display message ic number already exist..!'
}
} 
?>
<!-- Form for collecting student data -->
<form class="form-horizontal" action="" method="post">

<div class="form-group">
<label class="col-sm-4 control-label">Session</label>
<div class="col-sm-4">
<input type="text" name="sessionID" class="form-control" placeholder="Session" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-4 control-label">Student ID</label>
<div class="col-sm-4">
<input type="text" name="studentID" class="form-control" placeholder="ID No" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Student Name</label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" placeholder="Student Name" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Class ID</label>
<div class="col-sm-4">
<input type="text" name="classID" class="form-control" placeholder="Class ID" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Class</label>
<div class="col-sm-4">
<select name="className" class="form-control" required>
<option value=""> - Select Class - </option>
<option value=""> - Form 1 - </option>
<option value="1 KRK">1 KRK</option>
<option value="1 Bestari">1 Bestari</option>
<option value="1 Cekal">1 Cekal</option>
<option value="1 Dinamik">1 Dinamik</option>
<option value="1 Fitrah">1 Fitrah</option>
<option value="1 Gigih">1 Gigih</option>
<option value=""> - Form 2 - </option>
<option value="2 KRK">2 KRK</option>
<option value="2 Bestari">2 Bestari</option>
<option value="2 Cekal">2 Cekal</option>
<option value="2 Dinamik">2 Dinamik</option>
<option value="2 Fitrah">2 Fitrah</option>
<option value="2 Gigih">2 Gigih</option>
<option value=""> - Form 3 - </option>
<option value="3 KRK">3 KRK</option>
<option value="3 Bestari">3 Bestari</option>
<option value="3 Cekal">3 Cekal</option>
<option value="3 Dinamik">3 Dinamik</option>
<option value="3 Fitrah">3 Fitrah</option>
<option value="3 Gigih">3 Gigih</option>
<option value=""> - Form 4 - </option>
<option value="4 Sains">4 Sains</option>
<option value="4 Arif">4 Arif</option>
<option value="4 Bestari">4 Bestari</option>
<option value="4 Cekal">4 Cekal</option>
<option value="4 Dinamik">4 Dinamik</option>
<option value="4 Fitrah">4 Fitrah</option>
<option value=""> - Form 5 - </option>
<option value="5 Sains">5 Sains</option>
<option value="5 Arif">5 Arif</option>
<option value="5 Bestari">5 Bestari</option>
<option value="5 Cekal">5 Cekal</option>
<option value="5 Dinamik">5 Dinamik</option>
<option value="5 Fitrah">5 Fitrah</option>
</select>
</div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Parent ID</label>
    <div class="col-sm-4">
    <input type="text" name="parentID" class="form-control" placeholder="Parent ID" required>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 control-label">Parent Name</label>
    <div class="col-sm-4">
    <input type="text" name="parentName" class="form-control" placeholder="Parent Name" required>
    </div>
</div>

          <div class="form-group">
            <label class="col-sm-5 control-label">&nbsp;</label>
            <div class="col-sm-4">
              <input type="submit" name="add" class="btn btn-sm btn-primary" value="Add" data-toggle="tooltip" title="Add New Student">
              <a href="teaReg_view.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
            </div>
          </div>
		  <hr/>
        </form> <!-- /form -->
      </div> <!-- /.content -->
    </div> <!-- /.container -->
<script>
  $('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
  })
</script>
  	
	
	
</div>


</body>
</html>