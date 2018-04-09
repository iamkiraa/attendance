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
$session = $_POST['session'];
$teacherID = $_POST['teacherID'];
$name = $_POST['name'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$class = $_POST['class'];
$subject = $_POST['subject'];
$salary = $_POST['salary'];
$c=$_REQUEST["subject"];
$d=implode(",",$c);


$check = mysqli_query($connection, "SELECT * FROM teacher WHERE teacherID='$teacherID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database
$a=$row["subject"];
$b=explode(",",$a);
$insert = mysqli_query($connection, "INSERT INTO teacher (session, teacherID, name, gender, dob, address, phone, email, class, subject, salary) VALUES('$session','$teacherID','$name', '$gender', '$dob', '$address', '$phone', '$email','$class','$d', '$salary')") or die(mysqli_error()); // query for adding data into database
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
<label class="col-sm-3 control-label">Username</label>
<div class="col-sm-4">
<input type="text" name="username" class="form-control" placeholder="Username" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">IC No</label>
<div class="col-sm-2">
<input type="text" name="teacherID" class="form-control" placeholder="IC No" required>
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
<label class="col-sm-3 control-label">Class</label>
<div class="col-sm-2">
<select name="class" class="form-control" required>
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
<label class="col-sm-3 control-label">Class</label>
<div class="col-sm-2">
<input type="checkbox" name="subject" value="BM">I have a bike<br>
<input type="checkbox" name="subject" value="BI">I have a car<br>
<input type="checkbox" name="subject" value="KHB">I have a bike<br>
<input type="checkbox" name="subject" value="Sejarah">I have a car<br>
<input type="checkbox" name="subject" value="Geografi">I have a bike<br>
<input type="checkbox" name="subject" value="Matematik">I have a car<br>
<input type="checkbox" name="subject" value="Sains"><br>
<input type="checkbox" name="subject" value="PI">Pendidikan Islam<br>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Salary</label>
<div class="col-sm-4">
<input type="text" name="salary" class="form-control" placeholder="Salary" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
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