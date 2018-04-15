<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="panel panel-default container" style="margin-top:100px">
<div class="panel-heading">
<h1 style="text-align: center;">- Add Stream -</h1>
<hr/>
<?php
if(isset($_POST['add'])){ // if button Add clicked
$streamID = $_POST['streamID'];
$streamName = $_POST['streamName'];

$check = mysqli_query($connection, "SELECT * FROM stream WHERE streamID='$streamID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database

$insert = mysqli_query($connection, "INSERT INTO stream (streamID, streamName) VALUES('$streamID', '$streamName')") or die(mysqli_error()); // query for adding data into database

if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new stream added.. <a href="admView_stream.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new stream! <a href="admView_stream.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Stream already exist..! <a href="admView_stream.php"><- Back</a></div>'; // display message session already exist..!'
}
}
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">

<div class="form-group">
<label class="col-sm-3 control-label">ID</label>
<div class="col-sm-2">
<input type="text" name="streamID" class="form-control" placeholder="Stream" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Stream Name</label>
<div class="col-sm-2">
<select name="streamName" class="form-control" required>
<option value=""> - Select Stream - </option>
<option value="sains">Aliran Science</option>
<option value="akaun">Aliran Akaun</option>
<option value="perniagaan">Aliran Perniagaan</option>
<option value="sastera">Aliran Sastera</option>
<option value="rekacipta">Aliran Rekacipta</option>
<option value="lain">Lain-lain</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="add" class="btn btn-sm btn-primary" value="Add" data-toggle="tooltip" title="Add New Stream">
<a href="admView_stream.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
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