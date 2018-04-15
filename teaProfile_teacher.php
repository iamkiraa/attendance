<?php
//check if user has login
include('check_teacher.php'); //load header content for teacher page
include('header_teacher.php'); //load header content for teacher page
include("connection.php"); // connection to database
session_start();
$teacherID = $_SESSION['ID'];
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>View Teacher Details &raquo;</h2>
<hr />
<?php

$sql = mysqli_query($connection, "SELECT * FROM teacher WHERE teacherID='$teacherID'");
// query for selecting ic number from db
if(mysqli_num_rows($sql) == 0){
header("Location: teacher.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
?>
<!-- Display Teacher details -->
<table class="table table-striped table-condensed">
<tr>
<th width="20%">IC No</th>
<td><?php echo $row['teacherID']; ?></td>
</tr>
<tr>
<th>Name</th>
<td><?php echo $row['name']; ?></td>
</tr>
<tr>
<th>Gender</th>
<td><?php echo $row['gender']; ?></td>
</tr>
<tr>
<th>Date of Birth</th>
<td><?php echo $row['dob']; ?></td>
</tr>
<tr>
<th>Address</th>
<td><?php echo $row['address']; ?></td>
</tr>
<tr>
<th>Telephone</th>
<td><?php echo $row['phone']; ?></td>
</tr>
<tr>
<th>Email</th>
<td><?php echo $row['email']; ?></td>
</tr>

<tr>
<th>Profile Image</th>
<td><img src="<?php echo $row['upload']; ?>" height="300px"></td>
</tr>
</table>

<div class="form-group">
<label class="col-sm-5 control-label">&nbsp;</label>
<div class="col-sm-7">
<a href="teacher.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
<a href="teaUpdate_teacher.php?teacherID=<?php echo $row['teacherID']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Data</a>
</div>
</div>

</div> <!-- /.content -->
</div> <!-- /.container -->


<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>