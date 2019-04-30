<!DOCTYPE html>
<html>
<head>

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
	<title></title>
</head>
<body>
	<div class="container text-center">
	<b>REGISTER FOR COURSE</b>
	<br><br><br>
	<form method="post" action="">
	<div class="form-group col-sm-4"> 
		
				<label for="srn">Enter Your SRN</label>
				<input type="text" name="srn" id="srn" class="form-control">
		</div>
	<div class="form-group col-sm-4"> 
		
				<label for="courseid">Enter Your Course Id</label>
				<input type="text" name="courseid" id="courseid" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary" name="sub">REGISTER</button>
	</form>
	<br><br>


<?php
extract($_POST);
if(isset($sub))
{
$conn=mysqli_connect("localhost","root","","dbms1");
$sql = "
CREATE TABLE EXAM_STUD
(
 
  CRS_ID CHAR(4) ,
  SRN VARCHAR(7),
  PRIMARY KEY(CRS_ID,SRN),
  FOREIGN KEY (CRS_ID) REFERENCES COURSE(COURSE_ID) 
  ON UPDATE CASCADE 
  ON DELETE CASCADE,
  FOREIGN KEY (SRN) REFERENCES STUDENT(SRN)
  ON UPDATE CASCADE
  ON DELETE CASCADE
);
";
mysqli_query($conn,$sql);

	

	$sql="INSERT INTO EXAM_STUD VALUES(
	'$courseid','$srn'
	);
	";
	mysqli_query($conn,$sql);
	
	$sql = "SELECT * FROM COURSE WHERE COURSE_ID = '$courseid' ";
	$res = mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	$no_stud =  $row['NO_STUDENTS'];
	$no_stud = $no_stud +1;

	$sql = "UPDATE COURSE  SET NO_STUDENTS ='$no_stud' WHERE COURSE_ID = '$courseid' ";
	mysqli_query($conn,$sql);
}

$conn=mysqli_connect("localhost","root","","dbms1");
$sql="SELECT * FROM COURSE;";
$res=mysqli_query($conn,$sql);
echo "<br>";
echo "<table border='2'>
<table class='table table-hover'>
	<thead class='thead-dark'>	
	<tr>
	<th>COURSE ID</th>
	<th>COURSE NAME</th>
	<th>DEPARTMENT ID</th>
	<th>NO OF STUDENTS</th>
	</tr>
	";
while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
	{
		echo "<tr>";
		echo "<td>";echo $row['COURSE_ID'];echo "</td>";
		echo "<td>";echo $row['COURSE_NAME'];echo "</td>";
		echo "<td>";echo $row['DEPT_ID'];echo "</td>";
		echo "<td>";echo $row['NO_STUDENTS'];echo "</td>";
		echo "</tr>";
			
	}	
echo "</table>";
?>



<br><br><br>
<b>SEARCH COURSE</b>
<br><br>
	<form action="" method="post">
		<div class="form-group col-sm-12" id="a">       
		<select name="search_col" class="form-control col-sm-4">
			<option value="COURSE_ID">COURSE ID</option>
			<option value="COURSE_NAME">COURSE NAME</option>
			<option value="DEPT_ID">DEPARTMENT ID</option>
		</select>
		</div>
		<br><br>
		<div class="form-group col-sm-4">
		<label for="value">Enter the value</label>
				<input type="text" name="search_value" id="value" class="form-control">
		</div><br>
				<button type="submit" class="btn btn-primary" name="search_sub">SEARCH</button>

	</form>

<?php
if(isset($search_sub))
{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "SELECT * FROM COURSE WHERE $search_col = '$search_value' ";
	$res = mysqli_query($conn,$sql);
echo "<br><br>";
echo "<table border='2'>
	<tr><table class='table table-bordered'>
	<thead class='thead-dark'>
	<th>COURSE ID</th>
	<th>COURSE NAME</th>
	<th>DEPARTMENT ID</th>
	<th>NO OF STUDENTS</th>
	</tr>
	";
while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
	{
		echo "<tr>";
		echo "<td>";echo $row['COURSE_ID'];echo "</td>";
		echo "<td>";echo $row['COURSE_NAME'];echo "</td>";
		echo "<td>";echo $row['DEPT_ID'];echo "</td>";
		echo "<td>";echo $row['NO_STUDENTS'];echo "</td>";
		echo "</tr>";
			
	}	
echo "</table>";
}

?>

</body>
</html>

