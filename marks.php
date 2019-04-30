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
	<form action="" method="post">
		<div class="form-group col-sm-4">
			<label for="isbn">Enter SRN</label>
			<br><br>
		<input type="text" name="srn" placeholder="SRN" class="form-control">
		<br><br>
	</div>
	<div class="form-group col-sm-4">
			<label for="isbn">Enter COURSE ID</label>
			<br><br>
		<input type="text" name="course" placeholder="COURSE CODE" class="form-control">
		<br><br>
	</div>
	<div class="form-group col-sm-4">
			<label for="isbn">Enter ENTER MARKS</label>
			<br><br>
		<input type="text" name="marks" placeholder="MARKS" class="form-control">
		<br><br>
	</div>
		<input type="submit" name="sub" value="UPDATE" class="btn btn-primary">
	</form>


<br><br><br><br>
<b>SEARCH</b>
<br><br>
	<form action="" method="post">
		<div class="form-group col-sm-12" id="a">
		<select name="search_col" class="form-control col-sm-4">
			<option value="SRN">SRN</option>
			<option value="CRS_ID">COURSE ID</option>
		</select>
	</div>
		<br><br>
		<div class="form-group col-sm-4" >
		<input type="text" placeholder="Enter value " name="search_value" class="form-control">
		<br>
		<br><input type="submit" name="search_sub" value="SEARCH" class="btn btn-primary">
	</div>
	</form>

<?php
extract($_POST);
if(isset($sub))
{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "ALTER TABLE EXAM_STUD ADD COLUMN MARKS INT";
	mysqli_query($conn,$sql);
	$sql=
	"UPDATE EXAM_STUD SET MARKS = '$marks'  WHERE SRN='$srn' AND CRS_ID = '$course' ";
	mysqli_query($conn,$sql);
}



if(isset($search_sub))
{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "SELECT * FROM EXAM_STUD WHERE $search_col = '$search_value' ";
	$res = mysqli_query($conn,$sql);
echo"<br>";
	echo "
	<table class='table table-hover'>
	<thead class='thead-dark'>
	<tr>
	<th>COURSE_ID</th>
	<th>SRN</th>
	<th>MARKS</th>
	
	</tr>
	</thead>
	";
while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
	{
		echo "<tr>";
		echo "<td>";echo $row['CRS_ID'];echo "</td>";
		echo "<td>";echo $row['SRN'];echo "</td>";
		echo "<td>";echo $row['MARKS'];echo "</td>";
		echo "</tr>";
			
	}	
echo "</table>";

}



?>
</body>
</html>