<?php
include('check_admin.php'); //check if user is a Administrator
include('header_admin.php'); //load header content for Administrator page
include("connection.php"); // connction to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>List of Teacher</h2>
<hr />
<?php

if(isset($_GET['action']) == 'delete'){ // if remove button clicked
$icno = $_GET['icno']; // get icno value
$check = mysqli_query($connection, "SELECT * FROM student WHERE student_icno='$student_icno'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // if no icno selected
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No data found..</div>'; // display message no data found.'
}else{ // if there are data found
$delete = mysqli_query($connection, "DELETE FROM student WHERE student_icno='$student_icno'"); // query for removing data
if($delete){ // if delete query succesfull
echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data removed successfully.</div>'; // display message data removed'
}else{ // if delete query unsuccesfull
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot remove data.</div>'; // display message cannot remove data'
}
}
}
?>
<!-- filtering members based on class -->
<form class="form-inline" method="get">
<div class="form-group">
<select name="filter" class="form-control" onchange="form.submit()">
<option value="0"> Filter Student by Class </option>
<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
<option value="Form 1" <?php if($filter == 'Form 1'){ echo 'selected'; } ?>>Form 1</option>
<option value="Form 2" <?php if($filter == 'Form 2'){ echo 'selected'; } ?>>Form 2</option>
<option value="Form 3" <?php if($filter == 'Form 3'){ echo 'selected'; } ?>>Form 3</option>
<option value="Form 4" <?php if($filter == 'Form 4'){ echo 'selected'; } ?>>Form 4</option>
<option value="Form 5" <?php if($filter == 'Form 5'){ echo 'selected'; } ?>>Form 5</option>
<option value="Form 6" <?php if($filter == 'Form 6'){ echo 'selected'; } ?>>Form 6</option>
</select>
</div>
<div class="form-group">
<select name="filterstatus" class="form-control" onchange="form.submit()">
<option value="0"> Filter Student by Teacher </option>
<?php $filterstatus = (isset($_GET['filterstatus']) ? strtolower($_GET['filterstatus']) : NULL); ?>
<option value="Active" <?php if($filterstatus == 'Active'){ echo 'selected'; } ?>>Active</option>
<option value="Inactive" <?php if($filterstatus == 'Inactive'){ echo 'selected'; } ?>>Inactive</option>
</select>
</div>
</form> <!-- end filter -->
<br />
<!-- start responsive table-->
<div class="table-responsive">

<table class="table table-striped table-hover">
<tr>
<th>No</th>
<th>IC No</th>
<th>Name</th>
<th>Gender</th>
<th>Class</th>
<th>Teacher's Subject</th>
<th>Subject</th>
<th>Day of Birth</th>
<th>Address</th>
<th>Telephone</th>
<th>Tools</th>
</tr>
<?php
if($filter){
$sql = mysqli_query($connection, "SELECT * FROM student WHERE student_class='$filter' ORDER BY icno ASC"); // query -filter
} else if($filterstatus){
$sql = mysqli_query($connection, "SELECT * FROM student WHERE status='$filterstatus' ORDER BY icno ASC"); // query -filter
}else{
$sql = mysqli_query($connection, "SELECT * FROM student ORDER BY icno ASC"); // if no filter
}
if(mysqli_num_rows($sql) == 0){
echo '<tr><td colspan="14">No data retrieved..</td></tr>'; // if no data retrieved from database
}else{ // if there are data
$no = 1; // start from number 1
while($row = mysqli_fetch_assoc($sql)){ // fetch query into array
echo '
<tr>
<td>'.$no.'</td>
<td>'.$row['student_icno'].'</td>
<td><a href="profile.php?icno='.$row['icno'].'">'.$row['name'].'</a></td>
<td>'.$row['gender'].'</td>
<td>'.$row['class'].'</td>
<td>'.$row['position'].'</td>
<td>'.$row['status'].'</td>
<td>
<a href="edit.php?icno='.$row['icno'].'" title="Update Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
<a href="reset_password.php?icno='.$row['icno'].'" title="Change Password" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
<a href="view_users.php?action=delete&icno='.$row['icno'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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