<?php
include('check_teacher.php');
include('header_teacher.php');
?>
<!-- Content start here -->
<div class="panel panel-default container" style="margin-top:100px">
<div class="panel-heading">
<h1 style="text-align: center;">- Please select all the requirements -</h1>
</div>
</div>
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

<div class="form-group">
<label class="col-sm-4 control-label">Session</label>
<div class="col-sm-4">
<input type="text" name="sessionID" class="form-control" placeholder="Session" required>
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
<label class="col-sm-4 control-label">Subject</label>
<div class="col-sm-4">
<select name="subjectName" class="form-control" required>
<option value=""> - Select Subject - </option>
<option value="Bahasa Melayu">Bahasa Melayu</option>
<option value="Bahasa Inggeris">Bahasa Inggeris</option>
<option value="Matematik">Matematik</option>
<option value="Sains">Sains</option>
<option value="Pendidikan Islam">Pendidikan Islam</option>
<option value="Matematik Tambahan">Matematik Tambahan</option>
<option value="Kimia">Kimia</option>
<option value="Fizik">Fizik</option>
<option value="Biologi">Biologi</option>
<option value="Ekonomi">Ekonomi</option>
<option value="Perkaunan">Perakaunan</option>
<option value="Perniagaan">Perniagaan</option>
<option value="Sastera">Sastera</option>
<option value="Rekacipta">Rekacipta</option>
<option value="Perdagangan">Perdagangan</option>
<option value="KHB">KHB</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-5 control-label">&nbsp;</label>
<div class="col-sm-4">
<input type="submit" name="add" href="attendance.php" class="btn btn-sm btn-primary" value="Submit" data-toggle="tooltip" title="The Requirements Added">
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

function check(){

		var x = document.getElementById("s").option[2].disabled = true;
	}


</script>
</body></html>