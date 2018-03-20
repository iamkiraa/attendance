<?php
include('check_admin.php'); //check if user is a teacher
include('header_admin.php'); //load header content for teacher page
include("connection.php"); // connction to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>List of Parents</h2>
<hr />
<?php

if(isset($_GET['action']) == 'delete'){ // if remove button clicked
$icno = $_GET['icno']; // get icno value
$check = mysqli_query($connection, "SELECT * FROM parent WHERE icno='$icno'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // if no icno selected
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No data found..</div>'; // display message no data found.'
}else{ // if there are data found
$delete = mysqli_query($connection, "DELETE FROM parent WHERE icno='$icno'"); // query for removing data
if($delete){ // if delete query succesfull
echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data removed successfully.</div>'; // display message data removed'
}else{ // if delete query unsuccesfull
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot remove data.</div>'; // display message cannot remove data'
}
}
}
?>
<!-- filtering members based on class -->

<div class="form-group">
<select name="filterstatus" class="form-control" onchange="form.submit()">
<option value="0"> Filter Member by Child's name </option>
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
<th>Child Name</th>
<th>Date of Birth</th>
<th>Address</th>
<th>Telephone No</th>
<th>Email</th>
<th>Occupation</th>
<th>Tools</th>
</tr>
<?php
if($filter){
$sql = mysqli_query($connection, "SELECT * FROM student WHERE class='$filter' ORDER BY icno ASC"); // query -filter
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
<td>'.$row['icno'].'</td>
<td><a href="profile.php?icno='.$row['icno'].'">'.$row['name'].'</a></td>
<td>'.$row['gender'].'</td>
<td>'.$row['childName'].'</td>
<td>'.$row['dob'].'</td>
<td>'.$row['address'].'</td>
<td>'.$row['phone'].'</td>
<td>'.$row['email'].'</td>
<td>'.$row['occu'].'</td>
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
