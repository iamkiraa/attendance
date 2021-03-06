<?php
//check if user has login
include('check_parent.php'); //check if parent logged in
include('header_parent.php'); //load header content for parent page
include("connection.php"); // connction to database
session_start();
$parentID = $_SESSION['parentID'];
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>Parent Details &raquo;</h2>
<hr />
<?php
if(isset($_POST['add'])){ // if button Add clicked
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$occu = $_POST['occu'];
$childName = $_POST['childName'];
$check = mysqli_query($connection, "SELECT * FROM parent WHERE parentID='$parentID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database
$insert = mysqli_query($connection, "INSERT INTO parent(parentID, name, gender, dob, address, phone, email, occu,
 childName) VALUES('$parentID','$name', '$gender', '$dob', '$address', '$phone', '$email', '$occu', '$childName')")
 or die(mysqli_error()); // query for adding data into database
 
 if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new member added.. <a href="parent.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessfull
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new member! <a href="parent.php"><- Back</a></div>'; // display message data unsuccessfull added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>IC Number already exist! You are registered member<a href="parent.php"><- Back</a></div>'; // display message ic number already exist..!'
}
}
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-sm-3 control-label">IC No</label>
<div class="col-sm-2">
<input type="text" name="parentID" class="form-control" placeholder="<?php echo $parentID; ?>" disabled>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" placeholder="Name" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Gender</label>
<div class="col-sm-2">
<select name="gender" class="form-control" required>
<option value=""> - Select Gender - </option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Date of Birth</label>
<div class="col-sm-3">
<input type="text" name="dob" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Address</label>
<div class="col-sm-3">
<textarea name="address" class="form-control" placeholder="Address"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Telephone No</label>
<div class="col-sm-3">
<input type="text" name="phone" class="form-control" placeholder="Telephone No" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-3">
<input type="email" name="email" class="form-control" placeholder="Email" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Occupation</label>
<div class="col-sm-2">
<select name="occu" class="form-control" required>
<option value=""> - Select Occupation - </option>
<option value="Retired">Retired</option>
<option value="Government">Government</option>
<option value="Private Sector">Private Sector</option>
<option value="Teacher">Teacher</option>
<option value="General Business">General Business</option>
<option value="Other">Other</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Child Name</label>
<div class="col-sm-3">
<input type="childName" name="childName" class="form-control" placeholder="Child Name" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="add" class="btn btn-sm btn-primary" value="Save" data-toggle="tooltip" title="Save member data">
<a href="parent.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
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
</body>
</html>
