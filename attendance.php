<?php
include('check_teacher.php'); //check if user if teacher
include('header_teacher.php'); //load header content for teacher page
include("connection.php"); // connction to database
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
	<h1 style="text-align: center;">Attendance Management System</h1>
	</div>
	
<div class="panel-body"> 
	
	<a href="#" class="btn btn-primary">View</a>
	<a href="#" class="btn btn-primary pull-right">Add</a>
	
<form method="post">	
<table class="table">
<thead>
<tr>
	<th>No</th>
	<th>IC No</th>
	<th>Name</th>
	<th>Father Name</th>
	<th>Class</th>
	<th>Subject</th>
	<th>Status</th>
	<th>Operation</th>
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
		<td>'.$row['studentID'].'</td>
		<td>'.$row['name'].'</td>
		<td>'.$row['parentName'].'</td>	
		<td>'.$row['class'].'</td>
		<td>'.$row['subject'].'</td>
		<td>
		
			<input name="status?studentID='.$row['studentID'].'" required type="radio" value="Present">Present	
			<input name="status?studentID='.$row['studentID'].'" required type="radio" value="Absent">Absent
		</td>
		<td>
			<a href="attendance.php?studentID='.$row['studentID'].'" title="Send Message" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></a>
			<a href="attandance.php?action=delete&studentID='.$row['studentID'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
		</td>
			
	</tr>
		
		';
		$no++; // next number
		}
		}
	 ?>
	 
	 
	 
	</tbody>
	</form>
	
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$att=$_POST ['attendance'];
			$date=date('d-m-y');
			
			$query="select distinct date from attendance";
			$result=$link -> query($query);
			$b=false;
			if($result -> num_rows>0){
			while($check=$result-> fetch_assoc()){
				
				if(date==$check['date']){
				$b=true;
				echo "<div class='alert alert-danger'>
				Attendance already taken succesfully;
				</div>";
				}
			}
			}
				if(!$b){
					foreach ($att as $key => $value){
						if($value=="Present"){
							$query="insert into attendance(status,studentID,date) values('Present',$key,'$date')";
							$insertResult= $link -> query($query);
						}
						else{
							$query="insert into attendance(status,studentID,date) values('Absent',$key,'$date')";
							$insertResult= $link -> query($query);
						}
					}
					if($insertResult){
						echo "<div class='alert alert-success'>
						Attendance taken succesfully;
						</div>";
					}
				}
			
			
		}
	
	
	?>
	

</table>
<input class="btn btn-primary"type="submit" value="Take Attendance">
	
</div>
<div class="panel-footer"> 
</div>


</div>


</body>
</html>

