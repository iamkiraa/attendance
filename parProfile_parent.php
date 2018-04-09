<?php

//check if user has login
include('check_parent.php'); //load header content for Parent page
include('header_parent.php'); //load header content for parent page
include("connection.php"); // connection to database
session_start();
$parentID = $_SESSION['parentID'];
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>View Parent Details &raquo;</h2>
<hr />
<?php

$sql = mysqli_query($connection, "SELECT * FROM parent WHERE parentID='$parentID'");
// query for selecting ic number from db
if(mysqli_num_rows($sql) == 0){
header("Location: parent.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
?>
<!-- Display Teacher details -->
<table class="table table-striped table-condensed">
<tr>
<th width="20%">IC No</th>
<td><?php echo $row['parentID']; ?></td>
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
<th>Occupation</th>
<td><?php echo $row['occu']; ?></td>
</tr>
<tr>
<th>Child Name</th>
<td><?php echo $row['childName']; ?></td>
</tr>
<tr>
<th>Profile Image</th>
<td><img src="<?php echo $row['upload']; ?>" height="300px"></td>
</tr>
</table>

<a href="parent.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
<a href="parUpdate_parent.php?parentID=<?php echo $row['parentID']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Data</a>
<?php
if(($row['status']) == 'Active'){
echo '<a href="print_letter.php?parentID='.$row['parentID'].'" target="_blank" title="Print Letter" data-toggle="tooltip" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Letter</a>';
}
?>

</div> <!-- /.content -->
</div> <!-- /.container -->


<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>