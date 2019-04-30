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
	<b>REGISTER FOR HOSTEL</b>
	<br><br><br>

	<form method="post" action="stud_hostel.php">
		<div class="form-group col-sm-4">
		
				<label for="srn">Enter Your SRN</label>
				<input type="text" name="srn" id="srn" class="form-control">
		</div>

		<div class="form-group col-sm-4">
			<label for="hostelid">Enter Hostel Id</label>
		<input type="text" name="hostelid" id="hostelid" class="form-control">
		</div>

		<div class="form-group col-sm-4">
			<label for="gname">Enter Guardian Name</label>
		<input type="text" name="gname" id="gname" class="form-control">
		</div>

		<div class="form-group col-sm-4">
			<label for="gaddr">Enter Guardian Address</label>
		<input type="text" name="gaddr" id="gaddr" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary" name="sub">Submit</button>
		</form>
	<br><br><br>
<br>

<?php
extract($_POST);
if(isset($sub))
{
$conn=mysqli_connect("localhost","root","","dbms1");
$sql = "
CREATE TABLE STUD_HOSTEL
(
  GUARDIAN_NAME VARCHAR(10) NOT NULL,
  GUARDIAN_ADDR VARCHAR(100) NOT NULL,
  ROOM_NO INT NOT NULL,
  HOST_ID CHAR(6) ,
  SRN VARCHAR(7),
  FOREIGN KEY (HOST_ID) REFERENCES HOSTEL(HOSTEL_ID) 
  ON UPDATE CASCADE 
  ON DELETE SET NULL,
  FOREIGN KEY (SRN) REFERENCES STUDENT(SRN)
  ON UPDATE CASCADE
  ON DELETE CASCADE
  );
";

	$rno = rand(100,600);
	echo "You have been given room no as ".$rno."<br>";
	
	$sql="INSERT INTO STUD_HOSTEL VALUES(
	'$gname','$gaddr','$rno','$hostelid','$srn'
	);
	";
	mysqli_query($conn,$sql);
	
	$sql = "SELECT * FROM HOSTEL WHERE HOSTEL_ID = '$hostelid' ";
	$res = mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	$no_room =  $row['ROOMS_AVAIL'];
	$no_room = $no_room - 1;

	$sql = "UPDATE HOSTEL  SET ROOMS_AVAIL ='$no_room' WHERE HOSTEL_ID = '$hostelid' ";
	mysqli_query($conn,$sql);

}

echo "<b>HOSTEL TABLE</b><br>";
$conn=mysqli_connect("localhost","root","","dbms1");
$sql="SELECT * FROM HOSTEL;";
$res=mysqli_query($conn,$sql);
echo "<br>";
echo "
	<table class='table table-hover'>
	<thead class='thead-dark'>
	<tr>
	<th>HOSTEL ID</th>
	<th>HOSTEL NAME</th>
	<th>HOSTEL ADDRESS</th>
	<th>ROOMS AVAILABLE</th>
	</tr>
	</thead>
	";
while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
	{
		echo "<tr>";
		echo "<td>";echo $row['HOSTEL_ID'];echo "</td>";
		echo "<td>";echo $row['HOSTEL_NAME'];echo "</td>";
		echo "<td>";echo $row['HOSTEL_ADDR'];echo "</td>";
		echo "<td>";echo $row['ROOMS_AVAIL'];echo "</td>";
		echo "</tr>";
			
	}	
echo "</table>";
?>


<br><br><br>
<b>SEARCH HOSTEL</b>
<br><br>
	<form action="" method="post">
		<div class="form-group col-sm-12" id="a">       
		<select name="search_col" class="form-control col-sm-4">
			<option value="HOSTEL_ID">HOSTEL ID</option>
			<option value="HOSTEL_NAME">HOSTEL NAME</option>
			<option value="HOSTEL_ADDR">HOSTEL ADDRESS</option>
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
	$sql = "SELECT * FROM HOSTEL WHERE $search_col = '$search_value' ";
	$res = mysqli_query($conn,$sql);
echo "<br><br>";
echo "<table class='table table-bordered'>
	<thead class='thead-dark'>
	<tr>
	<th>HOSTEL ID</th>
	<th>HOSTEL NAME</th>
	<th>HOSTEL ADDR</th>
	</tr>
	</thead>
	";
while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
	{
		echo "<tr>";
		echo "<td>";echo $row['HOSTEL_ID'];echo "</td>";
		echo "<td>";echo $row['HOSTEL_NAME'];echo "</td>";
		echo "<td>";echo $row['HOSTEL_ADDR'];echo "</td>";
		echo "</tr>";
			
	}	
echo "</table></div>";
}

?>

</body>
</html>

