<?php
include('check_admin.php'); //check if user is Administrator
include('header_admin.php'); //load header content for Admin page
include("connection.php"); // connection to database
?>

<style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}
</style>

&nbsp;


<div class="container" style="margin-top:50px">
<div class="content">
<h2>Add New Student &raquo;</h2>
<hr />
<?php
if(isset($_POST['add'])){ // if button Add clicked
$icno = $_POST['icno'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$teacher = $_POST['teacher'];
$class = $_POST['class'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$parentName = $_POST['parentName'];

$check = mysqli_query($connection, "SELECT * FROM student WHERE icno='$icno"); // query for selected ic number
$student_icno = $_POST['icno'];
$student_name = $_POST['name'];
$student_subject = $_POST['subject'];
$student_teacher = $_POST['teacher'];
$student_class = $_POST['class'];
$student_gender = $_POST['gender'];
$student_dob = $_POST['dob'];
$student_address = $_POST['address'];
$student_telephone = $_POST['telephone'];

$check = mysqli_query($connection, "SELECT * FROM student WHERE student_icno='$student_icno'"); // query for selected ic number

if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database

$insert = mysqli_query($connection, "INSERT INTO student(icno, name, subject, teacher, class, gender, dob, address, parentName) VALUES('$icno','$name', '$subject', '$teacher', '$class','$gender', '$dob', '$address', '$parentName')") or die(mysqli_error()); // query for adding data into database
if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new student added.. <a href="view_list_student.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new student! <a href="view_list_student.php"><- Back</a></div>'; // display message data unsuccessful added!'
}
}else{ // if ic number exist in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>IC Number already exist..! <a href="view_list_student.php"><- Back</a></div>'; // display message ic number already exist..!'
}
} 
?>

<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-sm-3 control-label">IC No</label>
<div class="col-sm-2">
<input type="text" name="icno" class="form-control" placeholder="IC No" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Student Name</label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" placeholder=" Student Name" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Subject</label>
<div class="col-sm-2">
<select name="subject" class="form-control" required>
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
<label class="col-sm-3 control-label">Teacher' Subject</label>
<div class="col-sm-4">
<input type="text" name="teacher" class="form-control" placeholder=" Teacher's Subject" required>
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
            <label class="col-sm-3 control-label">Parent Name</label>
            <div class="col-sm-3">
              <input type="text" name="parentName" class="form-control" placeholder="Parent Name" required>
            </div>
          </div>

		  

          <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
              <input type="submit" name="add" class="btn btn-sm btn-primary" value="Add" data-toggle="tooltip" title="Add member data">
              <a href="view_users.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
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