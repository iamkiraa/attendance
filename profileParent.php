<?php
include('check_parent.php'); //check if user if an Parent
include('header_parent.php'); //load header content for Parent page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">

<h2>Parents Details &raquo;</h2>
<hr />
<?php
$parentID = $_GET['parentID']; // get selected ic number
$sql = mysqli_query($connection, "SELECT * FROM parent WHERE parentID='$parentID'"); // query for selecting ic number from db
if(mysqli_num_rows($sql) == 0){
header("Location: parent.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
if(isset($_GET['action']) == 'delete'){ // if delete button clicked
$delete = mysqli_query($connection, "DELETE FROM parent WHERE parentID='$parentID'"); // query for deleting data based on ic number
if($delete){ // if query executed successfully
echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data removed.</div>'; // display data removed.'
}else{ // if query unsuccessful
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cannot remove data.</div>'; // display message cannot remove data.'
}
}
?>
<!-- Display member details -->
<table class="table table-striped table-condensed">
<tr>
<td colspan="2"><img src="<?php echo $row['upload']?>"></td>
</tr>
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
<td><?php echo $row['upload']; ?></td>
</tr>

</table>
<a href="view_list_parent.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
<a href="edit_parent.php?parentID=<?php echo $row['parentID']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Data</a>
<a href="email.php?parentID=<?php echo $row['parentID']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email Notification</a>
<a href="export_json.php?parentID=<?php echo $row['parentID']; ?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> Export JSON</a>
<a href="profile_parent.php?action=delete&parentID=<?php echo $row['parentID']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure remove data belong to <?php echo $row['name']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove Data</a>
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html> 