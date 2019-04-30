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
	<form action="lib.php" method="post">
		<div class="form-group col-sm-4">
			<label for="isbn">Enter LIBRARY ID</label>
			<br><br>
		<input type="text" name="libid" placeholder="LIBRARY ID"  class="form-control">
		<br><br>
	</div>
	<div class="form-group col-sm-4">
			<label for="isbn">EBTER LIBRARY NAME</label>
			<br><br>
		<input type="text" name="libname" placeholder="LIBRARY NAME"  class="form-control">
		<br><br>
	</div><div class="form-group col-sm-4">
			<label for="isbn">Enter DEPARTMENT ID</label>
			<br><br>
		<input type="text" name="deptid" placeholder="DEPARTMENT ID"  class="form-control">
		<br><br>
	</div>
		<input type="submit" name="sub" class="btn btn-primary">
	</form>


<br><br><br><br>
<b>DELETE</b>
<br>
<br>
	<form action="lib.php" method="post">
		<div class="form-group col-sm-12" id="a"> 
		<select name="delete_col"  class="form-control col-sm-4">
			<option value="LIBRARY_ID">LIBRARY ID</option>
			<option value="LIBRARY_NAME">LIBRARY NAME</option>
			<option value="DEPT_ID">DEPARTMENT ID</option>
		</select>
	</div>
		<br><br>
		<div class="form-group col-sm-4">
		<input type="text" placeholder="Enter value" name="delete_value" class="form-control">
		<br>
		<br><input type="submit" name="delete_sub" class="btn btn-primary" value="DELETE">
	</div>
	</form>

<br><br><br><br>
<b>UPDATE</b>
<br><br>
	<form action="lib.php" method="post">
		
		UPDATE COLUMN
		<div class="form-group col-sm-12" id="a"> 
		<select name="update_col" class="form-control col-sm-4">
			<option value="LIBRARY_ID">LIBRARY ID</option>
			<option value="LIBRARY_NAME">LIBRARY NAME</option>
			<option value="DEPT_ID">DEPARTMENT ID</option>
		</select>
	</div>
		<br><br>
		<div class="form-group col-sm-4">
		<input type="text" placeholder="Enter value to update" name="update_value"  class="form-control">
	</div>
		<br><br>UPDATE CONDITION
		<div class="form-group col-sm-12" id="a"> 
		<select name="update_cond_col" class="form-control col-sm-4">
			<option value="LIBRARY_ID">LIBRARY ID</option>
			<option value="LIBRARY_NAME">LIBRARY NAME</option>
			<option value="DEPT_ID">DEPARTMENT ID</option>
		</select>
	</div>
			<br><br>
			<div class="form-group col-sm-4">
		<input type="text" placeholder="Enter value of update cond" name="update_cond_value" class="form-control">
		<br>
		<br><input type="submit" name="update_sub" value="UPDATE"  class="btn btn-primary">
	</div>
	</form>

<br><br><br><br>
<b>SEARCH</b>
<br><br>
	<form action="lib.php" method="post">
		<div class="form-group col-sm-12" id="a">
		<select name="search_col" class="form-control col-sm-4">
		<option value="LIBRARY_ID">LIBRARY ID</option>
		<option value="LIBRARY_NAME">LIBRARY NAME</option>
		<option value="DEPT_ID">DEPARTMENT ID</option>
		</select>
	</div>
		<br><br>
		<div class="form-group col-sm-4">
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
	$sql="
	CREATE TABLE LIBRARY
	(
	  LIBRARY_ID CHAR(5),
	  LIBRARY_NAME CHAR(10),
	  PRIMARY KEY (LIBRARY_ID),
	  DEPT_ID CHAR(3),
	  FOREIGN KEY (DEPT_ID) REFERENCES DEPARTMENT(DEPARTMENT_ID)
	  ON DELETE SET NULL 
	  ON UPDATE CASCADE
	);
	";
	mysqli_query($conn,$sql);

	$sql="INSERT INTO LIBRARY VALUES(
	'$libid','$libname','$deptid'
	);
	";
	mysqli_query($conn,$sql);

	$conn->close();
}



extract($_POST);
if(isset($delete_sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "DELETE FROM LIBRARY WHERE $delete_col = '$delete_value' ";
	mysqli_query($conn,$sql);
}

extract($_POST);
if(isset($update_sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "UPDATE LIBRARY SET $update_col = '$update_value' WHERE $update_cond_col = '$update_cond_value' ";
	mysqli_query($conn,$sql);

}

if(isset($search_sub))
{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "SELECT * FROM LIBRARY WHERE $search_col = '$search_value' ";
	$res = mysqli_query($conn,$sql);
echo "<br><br>";
echo "<table class='table table-bordered'>
	<thead class='thead-dark'>
	<tr>
	<th>LIBRARY ID</th>
	<th>LIBRARY NAME</th>
	<th>DEPARTMENT ID</th>
	</tr>
	</thead>
	";
while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
	{
		echo "<tr>";
		echo "<td>";echo $row['LIBRARY_ID'];echo "</td>";
		echo "<td>";echo $row['LIBRARY_NAME'];echo "</td>";
		echo "<td>";echo $row['DEPT_ID'];echo "</td>";
		echo "</tr>";
			
	}	
echo "</table></div>";

}




?>

</body>
</html>
