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
		<b>INSERT BOOKS</b>
	<br><br><br>

	<form action="books.php" method="post">
		<div class="form-group col-sm-4">
			<label for="isbn">Enter ISBN</label>
			<br><br>
		<input type="text" name="isbn" placeholder="ISBN" class="form-control">

		<br><br>
	</div>
	<div class="form-group col-sm-4">
			<label for="isbn">Enter COPY_NUMBER</label>
			<br><br>
		<input type="text" name="cno" placeholder="COPY NO" class="form-control">
		<br><br>
	</div>
	<div class="form-group col-sm-4">
			<label for="isbn">Enter BOOK NAME</label>
			<br><br>
		<input type="text" name="bookname" placeholder="BOOK NAME" class="form-control">
		<br><br>
	</div><div class="form-group col-sm-4">
			<label for="isbn">Enter AUTHOR</label>
			<br><br>
		<input type="text" name="author" placeholder="AUTHOR" class="form-control">
		<br><br>
	</div><div class="form-group col-sm-4">
			<label for="isbn">Enter PUBLISHER</label>
			<br><br>
		<input type="text" name="publisher" placeholder="PUBLISHER" class="form-control">
		<br><br>
	</div>
	<div class="form-group col-sm-4">
			<label for="isbn">Enter LIBRARY_ID</label>
			
		<input type="text" name="libid" placeholder="LIBRARY ID" class="form-control">
		<br><br>
	</div>
	<div class="form-group col-sm-4">
			<label for="isbn">Enter NO OF COPIES AVAILABLE</label>
			<br><br>
		<input type="text" name="noc" placeholder="NO_OF_COPIES" class="form-control">
		<br><br>
	</div>
		<input type="submit" class="btn btn-primary"  name="sub">
	</form>


<br><br><br><br>
<b>DELETE</b>
<br>
<br>
	<form action="books.php" method="post">
		<div class="form-group col-sm-12" id="a">       
		<select name="delete_col" class="form-control col-sm-4">
			<option value="ISBN">ISBN</option>
			<option value="BOOK_NAME">BOOK NAME</option>
			<option value="AUTHOR">AUTHOR</option>
			<option value="PUBLISHER">PUBLISER</option>
			<option value="LIB_ID">LIBRARY ID</option>
		</select>
	</div>
		<br><br>
		<div class="form-group col-sm-4">
		<input type="text" placeholder="Enter value" name="delete_value" class="form-control">
		<br>
		
		<br><input type="submit" name="delete_sub"   class="btn btn-primary"value="DELETE" >
	</div>
	</form>

<br><br><br><br>
<b>UPDATE</b>
<br><br>
	<form action="books.php" method="post">
		
		<div class="form-group col-sm-12" id="a"> 
		<select name="update_col" class="form-control col-sm-4">
			
			<option value="ISBN">ISBN</option>
			<option value="BOOK_NAME">BOOK NAME</option>
			<option value="AUTHOR">AUTHOR</option>
			<option value="PUBLISHER">PUBLISER</option>
			<option value="LIB_ID">LIBRARY ID</option>
		</select>
	</div>
		<br><br>
		<div class="form-group col-sm-4" >
		<input type="text" placeholder="Enter value to update" name="update_value"  class="form-control" >
	</div>
		<br><br>
		<div class="form-group col-sm-12" id="a"> 
		<select name="update_cond_col" class="form-control col-sm-4">
			
			<option value="ISBN">ISBN</option>
			<option value="BOOK_NAME">BOOK NAME</option>
			<option value="AUTHOR">AUTHOR</option>
			<option value="PUBLISHER">PUBLISER</option>
			<option value="LIB_ID">LIBRARY ID</option>
		</select>
	</div>
			<br><br>
			<div class="form-group col-sm-4" >
		<input type="text" placeholder="Enter value of update cond" name="update_cond_value" class="form-control">
		<br>
		<br><input type="submit" name="update_sub"class="btn btn-primary" value="UPDATE">
	</div>
	</form>

<br><br><br><br>
<b>SEARCH</b>
<br><br>
	<form action="books.php" method="post">
		<div class="form-group col-sm-12" id="a"> 
	
		<select name="search_col" class="form-control col-sm-4">	
			<option value="ISBN">ISBN</option>
			<option value="BOOK_NAME">BOOK NAME</option>
			<option value="AUTHOR">AUTHOR</option>
			<option value="PUBLISHER">PUBLISER</option>
			<option value="LIB_ID">LIBRARY ID</option>
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
	$sql="
	CREATE TABLE BOOK
	(
	  ISBN CHAR(13),
	  COPY_NO VARCHAR(5),
	  BOOK_NAME VARCHAR(50) NOT NULL,
	  AUTHOR VARCHAR(10) NOT NULL,
	  PUBLISHER VARCHAR(20) NOT NULL,
	  PRIMARY KEY (ISBN, COPY_NO),
	  LIB_ID CHAR(5),
	  FOREIGN KEY (LIB_ID) REFERENCES LIBRARY(LIBRARY_ID)
	  ON DELETE SET NULL 
	  ON UPDATE CASCADE
	);
	";
	mysqli_query($conn,$sql);

	$sql="CREATE TABLE BOOK_R(
	ISBN CHAR(13),
	NO_OF_COPIES_AVAILABLE INT,
	PRIMARY KEY(ISBN),
	
	FOREIGN KEY (ISBN) REFERENCES BOOK(ISBN)
	ON DELETE CASCADE
	ON UPDATE CASCADE
	) ;";
	mysqli_query($conn,$sql);


	$sql="INSERT INTO BOOK VALUES(
	'$isbn','$cno','$bookname','$author','$publisher','$libid'
	);
	";
	mysqli_query($conn,$sql);
	$sql="INSERT INTO BOOK_R VALUES(
	'$isbn','$noc'
	);
	";
	mysqli_query($conn,$sql);

	$conn->close();
}


extract($_POST);
if(isset($delete_sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "DELETE FROM BOOK WHERE $delete_col = '$delete_value' ";
	mysqli_query($conn,$sql);
}

extract($_POST);
if(isset($update_sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "UPDATE BOOK SET $update_col = '$update_value' WHERE $update_cond_col = '$update_cond_value' ";
	mysqli_query($conn,$sql);

}

if(isset($search_sub))
{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql = "SELECT * FROM BOOK WHERE $search_col = '$search_value' ";
	$res = mysqli_query($conn,$sql);
echo "<br><br>";
echo "<table class='table table-bordered'>
	<thead class='thead-dark'>
	<tr>
	<th>ISBN</th>
	<th>BOOK NAME</th>
	<th>AUTHOR</th>
	<th>PUBLISHER</th>
	<th>LIBRARY ID</th>
	</tr>
	</thead>
	";
while($row=mysqli_fetch_assoc($res))				// fetches one row at a time ; 
	{
		echo "<tr>";
		echo "<td>";echo $row['ISBN'];echo "</td>";
		echo "<td>";echo $row['BOOK_NAME'];echo "</td>";
		echo "<td>";echo $row['AUTHOR'];echo "</td>";
		echo "<td>";echo $row['PUBLISHER'];echo "</td>";
		echo "<td>";echo $row['LIB_ID'];echo "</td>";
		echo "</tr>";
			
	}	
echo "</table>";

}



?>

</body>
</html>
