<?php
include('check_teacher.php');
include('header_teacher.php');
?>
<!-- Content start here -->
<div class="panel panel-default container" style="margin-top:100px">
<div class="panel-heading">
<h1 style="text-align: center;">- Please select all the requirements -</h1>
<hr/>
<?php
if(isset($_POST['add'])){ // if button Add clicked
$session = $_POST['session'];
$className = $_POST['className'];
$subjectName = $_POST['subjectName'];


$check = mysqli_query($connection, "SELECT * FROM teacher WHERE teacherID='$teacherID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database

$insert = mysqli_query($connection, "INSERT INTO teacher (session, className, subjectName) VALUES('$session', '$className', '$subjectName')") or die(mysqli_error()); // query for adding data into database

if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for the requirements added.. <a href="teacher.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for all the requirements <a href="teacher.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>All the requirements already exist..! <a href="teacher.php"><- Back</a></div>'; // display message ic number already exist..!'
}
}
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">

<div class="form-group" >
<label class="col-sm-3 control-label">Session</label>
<div class="col-sm-2">
<select id="se" name="session" class="form-control" required>
<option value=""> - Select Session - </option>
<option id="se1" value="2018" onclick="check()">2018</option>
<option id="se2" value="2019" onclick="check()">2019</option>
<option id="se3" value="2020">2020</option>
<option id="se4" value="2021">2021</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Class</label>
<div class="col-sm-2">
<select name="className" class="form-control" required>
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
<label class="col-sm-3 control-label">Subject</label>
<div class="col-sm-2">
<select id="s" name="subjectName" class="form-control" required>
<option value=""> - Select Subject - </option>
<div id="s1">
<option value="BM">BM</option>
</div>
<option id="s3" value="BI">BI</option>
<option id="s4" value="MATEMATIK">MATEMATIK</option>
<option id="s5" value="SAINS">SAINS</option>
<option id="s6" value="PENDIDIKAN ISLAM">PENDIDIKAN ISLAM</option>
<option id="s7" value="SEJARAH">SEJARAH</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="add" href="attendance.php" class="btn btn-sm btn-primary" value="Submit" data-toggle="tooltip" title="The Requirements Added">

</div>
</div>
</form> <!-- /form -->
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})

function check(){

		var x = document.getElementById("s").option[2].disabled = true;
	}


</script>
</body></html>