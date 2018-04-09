<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="panel panel-default container" style="margin-top:100px">
<div class="panel-heading">
<h1 style="text-align: center;">- Add Subject -</h1>
<hr/>
<?php
if(isset($_POST['add'])){ // if button Add clicked
$subjectID = $_POST['subjectID'];
$className = $_POST['className'];
$teacherID  = $_POST['teacherID '];
$teacherName = $_POST['teacherName'];
$subjectName = $_POST['subjectName'];
$session = $_POST['session'];

$check = mysqli_query($connection, "SELECT * FROM teacher WHERE teacherID='$teacherID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database

$insert = mysqli_query($connection, "INSERT INTO teacher (teacherID, teacherName, subjectID, className, subjectName, session) VALUES('$teacherID', '$teacherName', '$subjectID', '$className', '$subjectName', '$session')") or die(mysqli_error()); // query for adding data into database

if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new subject added.. <a href="admView_subject.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new subject! <a href="admView_subject.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Subject already exist..! <a href="admView_subject.php"><- Back</a></div>'; // display message ic number already exist..!'
}
}
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">

<div class="form-group">
<label class="col-sm-3 control-label">ID</label>
<div class="col-sm-2">
<input type="text" name="subjectID" class="form-control" placeholder="ID" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Subject</label>
<div class="col-sm-2">
<select name="subjectName" class="form-control" required>
<option value=""> - Select Subject - </option>
<option value="BM">BM</option>
<option value="BI">BI</option>
<option value="MATEMATIK">MATEMATIK</option>
<option value="SAINS">SAINS</option>
<option value="PENDIDIKAN ISLAM">PENDIDIKAN ISLAM</option>
<option value="SEJARAH">SEJARAH</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">IC No</label>
<div class="col-sm-2">
<input type="text" name="teacherID" class="form-control" placeholder="IC No" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Teacher Name</label>
<div class="col-sm-2">
<select name="teacherName" class="form-control" required>
<option value=""> - Select Teacher - </option>
<option value="SITI MAISARAH">SITI MAISARAH</option>
<option value="NIK ZAITON">NIK ZAITON</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Class</label>
<div class="col-sm-2">
<select name="classID" class="form-control" required>
<option value=""> - Select Class - </option>
<option value="Form 1">Form 1</option>
<option value="Form 2">Form 2</option>
<option value="Form 3">Form 3</option>
<option value="Form 4">Form 4</option>
<option value="Form 5">Form 5</option>
<option value="Form 6">Form 6</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Session</label>
<div class="col-sm-2">
<select name="session" class="form-control" required>
<option value=""> - Select Session - </option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="add" class="btn btn-sm btn-primary" value="Add" data-toggle="tooltip" title="Add New Subject">
<a href="admView_subject.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
</div>
</div>
</form> <!-- /form -->
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body></html>