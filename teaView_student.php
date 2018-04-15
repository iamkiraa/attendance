<?php
include('check_teacher.php'); //check if user is a Teacher
include('header_teacher.php'); //load header content for Teacher page
include("connection.php"); // connction to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>List of Student</h2>
<hr />
<?php

if(isset($_GET['action']) == 'delete'){ // if remove button clicked
$studentID = $_GET['studentID']; // get studentID value
$check = mysqli_query($connection, "SELECT * FROM student WHERE studentID='$studentID'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // if no studentID selected
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No data found..</div>'; // display message no data found.'
}else{ // if there are data found
$delete = mysqli_query($connection, "DELETE FROM student WHERE studentID='$studentID'"); // query for removing data
if($delete){ // if delete query succesfull
echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data removed successfully.</div>'; // display message data removed'
}else{ // if delete query unsuccesfull
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot remove data.</div>'; // display message cannot remove data'
}
}
}
?>

<br />
<!-- start responsive table-->
<div class="table-responsive">

<table class="table table-striped table-hover">
<tr>
<th>No</th>
<th>IC No</th>
<th>Name</th>
<th>Gender</th>
<th>Day of Birth</th>
<th>Birth Certificate</th>
<th>Race</th>
<th>Address</th>
<th>Class</th>
<th>Parent Name</th>
<th>Tools</th>
</tr>

<?php
$sql = mysqli_query($connection, "SELECT * FROM student ORDER BY studentID ASC");
if(mysqli_num_rows($sql) == 0){
echo '<tr><td colspan="14">No data retrieved..</td></tr>'; // if no data retrieved from database
}else{ // if there are data
$no = 1; // start from number 1
while($row = mysqli_fetch_assoc($sql)){ // fetch query into array
echo '
<tr>
<td>'.$no.'</td>
<td>'.$row['studentID'].'</td>
<td><a href="teaProfile_student.php?studentID='.$row['studentID'].'">'.$row['name'].'</a></td>
<td>'.$row['gender'].'</td>
<td>'.$row['dob'].'</td>
<td>'.$row['birthCer'].'</td>
<td>'.$row['race'].'</td>
<td>'.$row['address'].'</td>
<td>'.$row['class'].'</td>
<td>'.$row['parentName'].'</td>

<td>
<a href="teaProfile_student.php?studentID='.$row['studentID'].'" title="Student Profile" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
<a href="reset_password.php?studentID='.$row['studentID'].'" title="Change Password" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
<a href="teaView_student.php?action=delete&studentID='.$row['studentID'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
</td>
</tr>
';
$no++; // next number
}
}
?>
</table>
</div> <!-- /.table-responsive -->
</div> <!-- /.content -->
</div> <!-- /.container -->
</body>
</html>