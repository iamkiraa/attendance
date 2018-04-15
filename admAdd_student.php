<?php
include('check_admin.php'); //check if user is Administrator
include('header_admin.php'); //load header content for Admin page
include("connection.php"); // connection to database
?>



&nbsp;


<div class="container" style="margin-top:50px">
<div class="content">
<h2>Add New Student &raquo;</h2>
<hr />
<?php
if(isset($_POST['add'])){ // if button Add clicked

$studentID = $_POST['studentID'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$birthCer = $_POST['birthCer'];
$race = $_POST['race'];
$address = $_POST['address'];
$parentName = $_POST['parentName'];


$check = mysqli_query($connection, "SELECT * FROM student WHERE studentID='$studentID'"); // query for selected ic number

if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database

$insert = mysqli_query($connection, "INSERT INTO student(studentID, name, gender, dob, birthCer, race, address, parentName) VALUES('$studentID','$name', '$gender', '$dob','$birthCer','$race', '$address', '$parentName')") or die(mysqli_error()); // query for adding data into database

if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new student added.. <a href="admView_student.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new student! <a href="admView_student.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>IC Number already exist..! <a href="admView_student.php"><- Back</a></div>'; // display message ic number already exist..!'
}
} 
?>

<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">



<div class="form-group">
<label class="col-sm-4 control-label">IC No</label>
<div class="col-sm-4">
<input type="text" name="studentID" class="form-control" placeholder="IC No" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Student Name</label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" placeholder=" Student Name" required>
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
<label class="col-sm-4 control-label">Birth Certificate</label>
<div class="col-sm-4">
<input type="text" name="birthCer" class="form-control" placeholder="Birth Certificate" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Race</label>
<div class="col-sm-4">
<select name="race" class="form-control" required>
<option value=""> - Select Race - </option>
<option value="Malay">Malay</option>
<option value="Chinese">Chinese</option>
<option value="Chinese">Indian</option>
<option value="Chinese">BumiPutera</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-4 control-label">Address</label>
<div class="col-sm-4">
<textarea name="address" class="form-control" placeholder="Address"></textarea>
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
              <input type="submit" name="add" class="btn btn-sm btn-primary" value="Add" data-toggle="tooltip" title="Add member data">
              <a href="admView_student.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
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