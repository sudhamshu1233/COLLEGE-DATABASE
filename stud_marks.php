<!DOCTYPE html>
<html>
<head>
	<title> </title>
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
	
	<br><br>
	<div class="container text-center">
		YOUR RESULTS
<form action="" method="post">
	
		<div class="form-group col-sm-4">
			<label for="isbn">Enter YOUR SRN</label>
			<br><br>

	<input type="text" name="srn" placeholder="Your SRN"  class="form-control"><br><br>
</div>
	<input type="submit" name="sub" value="GET RESULTS" class="btn btn-primary">
</form>

<?php
extract($_POST);	
if(isset($sub))
{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "SELECT COURSE_NAME,MARKS FROM EXAM_STUD INNER JOIN COURSE ON CRS_ID = COURSE_ID AND SRN = '$srn' ";
	$res = mysqli_query($conn,$sql);
	echo "<br>";
echo "
	<table class='table table-hover'>
	<thead class='thead-dark'>
	<tr>
	<th>COURSE NAME</th>
	<th>MARKS</th>
	
	</tr>
	</thead>
	";
	$tot=0;
	$max_marks = 0;
	while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
		{
			echo "<tr>";
			echo "<td>";echo $row['COURSE_NAME'];echo "</td>";
			echo "<td>";echo $row['MARKS'];echo "</td>";
			echo "</tr>";
			$tot = $tot + $row['MARKS'];
			$max_marks = $max_marks + 100;
		}	
	echo "</table>";
	echo "<br><br>Your total marks is: ".$tot;
	echo "<br><br>Your total percentage is: ".($tot*100)/$max_marks;
	echo "</div>";

}

?>
</body>
</html>