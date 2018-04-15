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
$subjectName = $_POST['subjectName'];
$streamID = $_POST['streamID'];

$check = mysqli_query($connection, "SELECT * FROM subject WHERE subjectID='$subjectID'"); // query for selected class
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database

$insert = mysqli_query($connection, "INSERT INTO subject (subjectID, subjectName, streamID) VALUES('$subjectID', '$subjectName', '$streamID')") or die(mysqli_error()); // query for adding data into database

if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new subject added.. <a href="admView_subject.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new subject! <a href="admView_subject.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>subject already exist..! <a href="admView_subject.php"><- Back</a></div>'; // display message session already exist..!'
}
}
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">

<div class="form-group">
<label class="col-sm-3 control-label">ID</label>
<div class="col-sm-2">
<input type="text" name="subjectID" class="form-control" placeholder="Subject" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Subject</label>
<div class="col-sm-2">
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
<label class="col-sm-3 control-label">Stream ID</label>
<div class="col-sm-2">
<input type="text" name="streamID" class="form-control" placeholder="Stream ID" required>
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