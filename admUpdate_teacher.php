<?php
include('check_admin.php'); //check if user if an Administration
include('header_admin.php'); //load header content for member page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>Update Teacher Data &raquo;</h2>
<hr />
<?php
$teacherID = $_GET['teacherID']; // get ic number
$sql = mysqli_query($connection, "SELECT * FROM teacher WHERE teacherID='$teacherID'"); // query for select member by ic number
if(mysqli_num_rows($sql) == 0){
header("Location: admProfile_teacher.php");
}else{
$row = mysqli_fetch_assoc($sql);
}

// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
	$target_dir = "assets/img/members/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif"
&& $imageFileType != "png" ) {
    echo "Sorry, only JPG, JPEG, GIF & PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$update = mysqli_query($connection, "UPDATE teacher SET upload='$target_file' WHERE teacherID='$teacherID'") or die(mysqli_error()); // query for update data in database
		echo "The file ". $target_file . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

if(isset($_POST['save'])){ // if save button clicked
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$class = $_POST['class'];
$salary = $_POST['salary'];
$update = mysqli_query($connection, "UPDATE teacher SET name='$name', gender='$gender', dob='$dob', address='$address', phone='$phone', email='$email', class='$class', salary='$salary' WHERE teacherID='$teacherID'") or die(mysqli_error()); // query for update data in database
if($update){ // if update query execution successful
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data updated. <a href="admProfile_teacher.php"><- Back</a></div>'; // display data updated.'
}else{ // if update query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cannot update data, please try again.</div>'; // display cannot update message'
}
}
if(isset($_GET['process']) == 'success'){ // if process-success
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data updated. <a href="admProfile_teacher.php"><- Back</a></div>'; // display data updated.'
}
?>
<!-- Form for updating data -->
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-3 control-label">IC No</label>
<div class="col-sm-2">
<input type="text" name="teacherID" value="<?php echo $row ['teacherID']; ?>" class="form-control" placeholder="IC No" disabled>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-4">
<input type="text" name="name" value="<?php echo $row ['name']; ?>" 
class="form-control" placeholder="Name" required>

</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Gender</label>
<div class="col-sm-2">
<select name="gender" class="form-control" required>
<option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Date of Birth</label>
<div class="col-sm-4">
<input type="text" name="dob" value="<?php echo $row ['dob']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Address</label>
<div class="col-sm-3">
<textarea name="address" class="form-control" placeholder="Address"><?php echo $row ['address']; ?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Telephone</label>
<div class="col-sm-3">
<input type="text" name="phone" value="<?php echo $row ['phone']; ?>" class="form-control" placeholder="Telephone" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-3">
<input type="email" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Email" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Class</label>
<div class="col-sm-2">
<select name="class" class="form-control" required>
<option value="<?php echo $row['class']; ?>"> - Select Class - </option>
<option value="Form 1">Form 1</option>
<option value="Form 2">Form 2</option>
<option value="Form 3">Form 3</option>
<option value="Form 4">Form 4</option>
<option value="Form 5">Form 5</option>
</select>
</div>
<div class="col-sm-3">
<b>Current Class :</b> <span class="label label-success"><?php echo $row['class']; ?></span>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Salary</label>
<div class="col-sm-3">
<input type="salary" name="salary" value="<?php echo $row ['salary']; ?>" class="form-control" placeholder="Email" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Profile Image</label>
<div class="col-sm-3">
    Select image to upload:
    <input id="fileToUpload" type="file" name="fileToUpload" />
	<br><br>
    <input type="submit" value="Upload Image" name="upload">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="save" class="btn btn-sm btn-primary" value="Update" data-toggle="tooltip" title="Update member details">
<a href="admView_teacher.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
</div>
</div>
</form>

</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>