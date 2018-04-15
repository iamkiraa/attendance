<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<!DOCTYPE html>
<html>
<head>
	<tittle></tittle>
	
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/jquery.min.js"></script>
		
</head>
<body>

	<div class="panel panel-default container" style="margin-top:100px">
	<div class="panel-heading">
	<h1 style="text-align: center;">- Subject Details -</h1>
	</div>
<div class="panel-body"> 
	
	<a href="admAdd_subject.php" class="btn btn-primary">Insert New Subject</a>

<?php

if(isset($_GET['action']) == 'delete'){ // if remove button clicked
$subjectID = $_GET['subjectID']; // get classID value
$check = mysqli_query($connection, "SELECT * FROM subject WHERE subjectID='$subjectID'"); // query for selected class id
if(mysqli_num_rows($check) == 0){ // if no classID selected
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No data found..</div>'; // display message no data found.'
}else{ // if there are data found
$delete = mysqli_query($connection, "DELETE FROM subject WHERE subjectID='$subjectID'"); // query for removing data
if($delete){ // if delete query succesfull
echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data removed successfully.</div>'; // display message data removed'
}else{ // if delete query unsuccesfull
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot remove data.</div>'; // display message cannot remove data'
}
}
}
?>	
	
	
<table class="table">
<thead>
<tr>
	<th>No</th>
	<th>ID</th>
	<th>Subject Name</th>
	<th>Stream ID</th>
	<th>Operation</th>
</tr>

</thead>
	<tbody>
	<?php
	$sql = mysqli_query($connection, "SELECT * FROM subject ORDER BY subjectID ASC");
	if(mysqli_num_rows($sql) == 0){
	echo '<tr><td colspan="14">No data retrieved..</td></tr>'; // if no data retrieved from database
	}else{ // if there are data
	$no = 1; // start from number 1
	while($row = mysqli_fetch_assoc($sql)){ // fetch query into array	
	echo'	
	<tr>
		<td>'.$no.'</td>
		<td>'.$row['subjectID'].'</td>
		<td>'.$row['subjectName'].'</td>
		<td>'.$row['streamID'].'</td>
		<td>
		<a href="admView_subject.php?action=delete&subjectID='.$row['subjectID'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['subjectID'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
		</td>
	</tr>
		
		';
		$no++; // next number
		}
		}
	 ?>
	</tbody>

</table>

	
</div>
<div class="panel-footer"> 
</div>


</div>


</body>
</html>