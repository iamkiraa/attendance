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
	<h1 style="text-align: center;">- Class Details -</h1>
	</div>
<div class="panel-body"> 
	
	<a href="admAdd_class.php" class="btn btn-primary">Insert New Class</a>
	
	
<table class="table">
<thead>
<tr>
	<th>No</th>
	<th>Class ID</th>
	<th>Class Name</th>
	<th>Teacher ID</th>
	<th>Teacher Name</th>
	<th>Tools</th>
</tr>

</thead>
	<tbody>
	<?php
	$sql = mysqli_query($connection, "SELECT * FROM student ORDER BY studentID ASC");
	if(mysqli_num_rows($sql) == 0){
	echo '<tr><td colspan="14">No data retrieved..</td></tr>'; // if no data retrieved from database
	}else{ // if there are data
	$no = 1; // start from number 1
	while($row = mysqli_fetch_assoc($sql)){ // fetch query into array	
	echo'	
	<tr>
		<td>'.$no.'</td>
		<td>'.$row['classID'].'</td>
		<td>'.$row['className'].'</td>
		<td>'.$row['teacherID'].'</td>		
		<td>'.$row['TeacherName'].'</td>
		<td>
			<a href="admUpdate_class.php?studentID='.$row['studentID'].'" title="Update Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
			<a href="admView_student.php?action=delete&studentID='.$row['studentID'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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