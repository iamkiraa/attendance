<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>Add New Teacher &raquo;</h2>
<hr />
<?php
if(isset($_POST['add'])){ // if button Add clicked
$teacherID = $_POST['teacherID'];
$name = $_POST['name'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$salary = $_POST['salary'];

$check = mysqli_query($connection, "SELECT * FROM teacher WHERE teacherID='$teacherID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database
$a=$row["subject"];
$b=explode(",",$a);
$insert = mysqli_query($connection, "INSERT INTO teacher (teacherID, name, gender, dob, address, phone, email, salary) VALUES('$teacherID','$name', '$gender', '$dob', '$address', '$phone', '$email', '$salary')") or die(mysqli_error()); // query for adding data into database
$insert2= mysqli_query($connection, "INSERT INTO user(username, password, level, ID) VALUES('$username','$teacherID','Teacher','$teacherID')")or die(mysqli_error());
if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new parent added.. <a href="admView_teacher.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new parent! <a href="admView_teacher.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>IC Number already exist..! <a href="admView_teacher.php"><- Back</a></div>'; // display message ic number already exist..!'
}
}
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">

<div class="form-group">
<label class="col-sm-4 control-label">Username</label>
<div class="col-sm-4">
<input type="text" name="username" class="form-control" placeholder="Username" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">IC No</label>
<div class="col-sm-4">
<input type="text" name="teacherID" class="form-control" placeholder="IC No" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Name</label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" placeholder="Name" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Gender</label>
<div class="col-sm-4">
<select name="gender" class="form-control" required>
<option value=""> - Select Gender - </option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Date of Birth</label>
<div class="col-sm-4">
<input type="text" name="dob" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Address</label>
<div class="col-sm-4">
<textarea name="address" class="form-control" placeholder="Address"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Telephone No</label>
<div class="col-sm-4">
<input type="text" name="phone" class="form-control" placeholder="Telephone No" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Email</label>
<div class="col-sm-4">
<input type="email" name="email" class="form-control" placeholder="Email" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Salary</label>
<div class="col-sm-4">
<input type="text" name="salary" class="form-control" placeholder="Salary" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-5 control-label">&nbsp;</label>
<div class="col-sm-4">
<input type="submit" name="add" class="btn btn-sm btn-primary" value="Add" data-toggle="tooltip" title="Add member data">
<a href="admView_teacher.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
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