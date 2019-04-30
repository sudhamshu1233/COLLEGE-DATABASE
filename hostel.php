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
<b>INSERT HOSTEL</b>
<br><br><br>	
<form action="" method="post">
	<div class="form-group col-sm-4">
			<label for="hostelid">Enter Hostel Id</label>
		<input type="text" id="hostelid" name="hostelid" class="form-control">
	</div>

		<div class="form-group col-sm-4">
			<label for="hostelname">Enter Name</label>
		<input type="text" name="hostelname" id="hostelname" class="form-control">
		</div>

		<div class="form-group col-sm-4">
			<label for="hosteladdr">Enter Address</label>
		<input type="text" name="hosteladdr" id="hosteladdr" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary" name="sub">INSERT</button>

	</form>

<br><br>
<b>DELETE HOSTEL</b>
<br>
<br>
<form action="" method="post">
<div class="form-group col-sm-12" id="a">       
		<select name="delete_col" class="form-control col-sm-4">
			<option value="HOSTEL_ID">HOSTEL ID</option>
			<option value="HOSTEL_NAME">HOSTEL NAME</option>
			<option value="HOSTEL_ADDR">HOSTEL ADDRESS</option>
		</select>
		</div>
		<br><br>
		<div class="form-group col-sm-4">
		<label for="value">Enter the value</label>
				<input type="text" name="delete_value" id="value" class="form-control">
		</div><br>
				<button type="submit" class="btn btn-primary" name="delete_sub">DELETE</button>
</form>


<br><br><br>
<b>UPDATE HOSTEL</b>
<br><br>

	Select Column for Update<br>	
		<form action="" method="post">
		<div class="form-group col-sm-12" id="a">       
		<select name="update_col" class="form-control col-sm-4">
			
			<option value="HOSTEL_ID">HOSTEL ID</option>
			<option value="HOSTEL_NAME">HOSTEL NAME</option>
			<option value="HOSTEL_ADDR">HOSTEL ADDRESS</option>
		</select>
		</select>
		</div>
		<br><br>
		<div class="form-group col-sm-4">
		<label for="value">Enter the value to update</label>
				<input type="text" name="update_value" id="value" class="form-control">
		</div><br>
Select column for update Condition <br>
<div class="form-group col-sm-12" id="a">       
		<select name="update_cond_col" class="form-control col-sm-4">
			
			<option value="HOSTEL_ID">HOSTEL ID</option>
			<option value="HOSTEL_NAME">HOSTEL NAME</option>
			<option value="HOSTEL_ADDR">HOSTEL ADDRESS</option>
		</select>
		</select>
		</div>
		<br><br>
		<div class="form-group col-sm-4">
		<label for="value">Enter the value of update condition</label>
				<input type="text" name="update_cond_value" id="value" class="form-control">
		</div><br>
				<button type="submit" class="btn btn-primary" name="update_sub">UPDATE</button>
	</form>

<br><br><br>
<b>SEARCH FOR HOSTEL</b>
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
extract($_POST);
if(isset($sub))
{
	

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql="
	
	CREATE TABLE HOSTEL
	(
	  HOSTEL_ID CHAR(6),
	  HOSTEL_NAME VARCHAR(10) NOT NULL,
	  HOSTEL_ADDR VARCHAR(100) NOT NULL,
	  ROOMS_AVAIL INT DEFAULT 100,
	  PRIMARY KEY (HOSTEL_ID)
	);
	";
	mysqli_query($conn,$sql);

	$sql="INSERT INTO HOSTEL(HOSTEL_ID,HOSTEL_NAME,HOSTEL_ADDR) VALUES(
	'$hostelid','$hostelname','$hosteladdr'
	);
	";
	mysqli_query($conn,$sql);

	$conn->close();
}



extract($_POST);
if(isset($delete_sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "DELETE FROM HOSTEL WHERE $delete_col = '$delete_value' ";
	mysqli_query($conn,$sql);
}

extract($_POST);
if(isset($update_sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "UPDATE HOSTEL SET $update_col = '$update_value' WHERE $update_cond_col = '$update_cond_value' ";
	mysqli_query($conn,$sql);

}

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
