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
<b>INSERT DEPARTMENT</b>
<br><br><br>	
<form action="" method="post">
	<div class="form-group col-sm-4">
			<label for="deptid">Enter Department Id</label>
		<input type="text" id="deptid" name="deptid" class="form-control">
	</div>

		<div class="form-group col-sm-4">
			<label for="dname">Enter Department Name</label>
		<input type="text" name="dname" id="dname" class="form-control">
		</div>

		<div class="form-group col-sm-4">
			<label for="mgrid">Enter Manager Id</label>
		<input type="text" name="mgrid" id="mgrid" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary" name="sub">INSERT</button>

	</form>

<br><br>
<b>DELETE DEPARTMENT</b>
<br>
<br>
<form action="" method="post">
<div class="form-group col-sm-12" id="a">       
		<select name="delete_col" class="form-control col-sm-4">
			<option value="DEPARTMENT_ID">DEPT ID</option>
			<option value="DEPT_NAME">DEPT NAME</option>
			<option value="MGR_ID">MANAGER ID</option>
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
<b>UPDATE DEPARTMENT</b>
<br><br>

	Select Column for Update<br>	
		<form action="" method="post">
		<div class="form-group col-sm-12" id="a">       
		<select name="update_col" class="form-control col-sm-4">
			<option value="DEPARTMENT_ID">DEPT ID</option>
			<option value="DEPT_NAME">DEPT NAME</option>
			<option value="MGR_ID">MANAGER ID</option>
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
		<option value="DEPARTMENT_ID">DEPT ID</option>
			<option value="DEPT_NAME">DEPT NAME</option>
			<option value="MGR_ID">MANAGER ID</option>
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
<b>SEARCH FOR DEPARTMENT</b>
<br><br>
	<form action="" method="post">
		<div class="form-group col-sm-12" id="a">       
		<select name="search_col" class="form-control col-sm-4">
			<option value="DEPARTMENT_ID">DEPT ID</option>
			<option value="DEPT_NAME">DEPT NAME</option>
			<option value="MGR_ID">MANAGER ID</option>
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
	$conn=mysqli_connect("localhost","root","");
	$sql="CREATE DATABASE dbms1";
	mysqli_query($conn,$sql);
	$conn->close();

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql="
	CREATE TABLE DEPARTMENT
	(
	  DEPARTMENT_ID CHAR(3),
	  DEPT_NAME VARCHAR(10) NOT NULL,
	  MGR_ID CHAR(4),
	  PRIMARY KEY (DEPARTMENT_ID),
	  UNIQUE (DEPT_NAME)
	);";
	mysqli_query($conn,$sql);


	$sql="INSERT INTO DEPARTMENT VALUES(
	'$deptid','$dname','$mgrid'
	);
	";
	mysqli_query($conn,$sql);

}

extract($_POST);
if(isset($delete_sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "DELETE FROM DEPARTMENT WHERE $delete_col = '$delete_value' ";
	mysqli_query($conn,$sql);
}

extract($_POST);
if(isset($update_sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "UPDATE DEPARTMENT SET $update_col = '$update_value' WHERE $update_cond_col = '$update_cond_value' ";
	mysqli_query($conn,$sql);

}

if(isset($search_sub))
{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "SELECT * FROM DEPARTMENT WHERE $search_col = '$search_value' ";
	$res = mysqli_query($conn,$sql);
echo "<br><br>";
echo "<table class='table table-bordered'>
	<thead class='thead-dark'>
	<tr>
	<th>DEPT ID</th>
	<th>DEPT NAME</th>
	<th>MANAGER ID</th>
	</tr>
	</thead>
	";
while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
	{
		echo "<tr>";
		echo "<td>";echo $row['DEPARTMENT_ID'];echo "</td>";
		echo "<td>";echo $row['DEPT_NAME'];echo "</td>";
		echo "<td>";echo $row['MGR_ID'];echo "</td>";
		echo "</tr>";
			
	}	
echo "</table></div>";

}

?>

</body>
</html>
