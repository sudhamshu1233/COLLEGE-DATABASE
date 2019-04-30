<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
		.form-group{
		margin-left: 33%;
		}
		#a{
			margin-left: 32%;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body>

	
	<div class="container text-center">
	<form method="POST" action="fac_course.php">
		<div class="form-group col-sm-4">
			<label for="isbn">Enter FACULTY ID</label>
			<br><br>
		<input type="text" name="facid" placeholder="FACID" class="form-control">
		<br><br>
	</div>
	<div class="form-group col-sm-4">
			<label for="isbn">Enter COURSE ID</label>
			<br><br>
		<input type="text" name="csid" placeholder="COURSEID" class="form-control">
		<br><br>
	</div>
		<input type="submit" name="sub" class="btn btn-primary">
		
	</form>
	<?php
extract($_POST);
if(isset($sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql="CREATE TABLE FAC_COURSE(
	FACID VARCHAR(20),
	COURSEID CHAR(4),
	PRIMARY KEY(FACID,COURSEID),
	FOREIGN KEY (COURSEID) REFERENCES COURSE(COURSE_ID)
	ON DELETE CASCADE 
	ON UPDATE CASCADE
	
);";
	mysqli_query($conn,$sql);
	$sql="INSERT INTO FAC_COURSE(FACID,COURSEID) VALUES('$facid','$csid');";
	mysqli_query($conn,$sql);

}


?>


</body>
</html>