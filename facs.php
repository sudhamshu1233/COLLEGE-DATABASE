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
	
<form method="POST" action="facs.php">
		<div class="form-group col-sm-4">
			<label for="isbn">Enter FACULTY ID</label>
			<br><br>
		<input type="text" name="fac" placeholder="FACID" class="form-control">
		<br><br>
	</div>
		<input type="submit" name="sub" class="btn btn-primary">
		
	</form>
		




	<?php
	extract($_POST);

	if(isset($sub))
{
	
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql="SELECT DISTINCT COURSEID,COURSE_NAME FROM FAC_COURSE,COURSE WHERE FACID='$fac' AND COURSEID=COURSE_ID;";
	$retval=mysqli_query($conn,$sql);
	echo"<br>";
	echo "
	<table class='table table-hover'>
	<thead class='thead-dark'>
	<tr>
	<th>COURSE ID</th>
	<th>COURSE NAME</th>
	
	</tr>
	</thead>
	";
	while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		echo"<tr>";
      echo "<td>{$row['COURSEID']}  </td> ".
      "<td>{$row['COURSE_NAME']}  </td> ".

         "</tr>";

   }
   echo"</table>";
}
   ?>

</body>
</html>