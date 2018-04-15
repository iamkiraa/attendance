<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="panel panel-default container" style="margin-top:100px">
<div class="panel-heading">
<h1 style="text-align: center;">- Add Class -</h1>
<hr/>
<?php
if(isset($_POST['add'])){ // if button Add clicked
$classID = $_POST['classID'];
$className = $_POST['className'];
$streamID = $_POST['streamID'];
$subjectID = $_POST['subjectID'];

$check = mysqli_query($connection, "SELECT * FROM class WHERE classID='$classID'"); // query for selected class
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database

$insert = mysqli_query($connection, "INSERT INTO class (classID, className, streamID, subjectID) VALUES('$classID', '$className', '$streamID' , '$subjectID')") or die(mysqli_error()); // query for adding data into database

if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new class added.. <a href="admView_class.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new class! <a href="admView_class.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>class already exist..! <a href="admView_class.php"><- Back</a></div>'; // display message session already exist..!'
}
}
?>
<!-- Form for collecting member data -->
<form  class="form-horizontal" action="" method="post">

<div class="form-group">
<label class="col-sm-4 control-label">ID</label>
<div class="col-sm-4">
<input type="text" name="classID" class="form-control" placeholder="Class" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Class Name</label>
<div class="col-sm-4">
<input type="text" name="className" class="form-control" placeholder="Class Name" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Stream ID</label>
<div class="col-sm-4">
<input type="text" name="streamID" class="form-control" placeholder="Stream ID" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Subject ID</label>
<div class="col-sm-4">
<input type="text" name="subjectID" class="form-control" placeholder="Subject ID" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-5 control-label">&nbsp;</label>
<div class="col-sm-4">
<input type="submit" name="add" class="btn btn-sm btn-primary" value="Add" data-toggle="tooltip" title="Add New Class">
<a href="admView_class.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
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