<!DOCTYPE html>
<html>
<head>
	<title>STUDENT LIBRARY INFO</title>
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
	<h7>PRESS HERE TO VIEW ALL BOOKS AVILABLE IN THE LIBRARY</h7>
	<br><br>
	<form action="LIBRARYRETRIVAL.php" method="post" >
		
		<input type="submit" name="submit" placeholder="PRESS" class="btn btn-primary">
		
	
		
		<br><br>
		<h6>ENTER DETAILS TO BORROW BOOKS</h6>
		<div class="form-group col-sm-4">
			<label for="isbn">ENTER ISBN</label>
			<br><br>
	

	
		<input type="text" name="isbn" placeholder="ISBN" class="form-control">
			</div>
			<div class="form-group col-sm-4">
			<label for="isbn">ENTER SRN</label>
			<br><br>
				<input type="text" name="srn" placeholder="SRN" class="form-control">

		<br><br>
	</div>

		
		

		<input type="submit" name="sub" class="btn btn-primary">
		<br><br>
		<h7>PRESS HERE TO DISPLAY THE BORROWED BOOKS</h7>
		<br><br>
		<div class="form-group col-sm-4">
			<label for="isbn">Enter SRN</label>
			<br><br>
	
	
		<input type="text" name="srn1" placeholder="SRN" class="form-control" >
		<br><br>
	</div>
		<input type="submit" name="submit1" placeholder="PRESS TO VIEW ALL BOOKS TAKEN" class="btn btn-primary">
	</form>

<?php
extract($_POST);
if(isset($submit))
{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql="SELECT * FROM BOOK;";

	$retval=mysqli_query($conn,$sql);
	echo"<br>";
	echo "
	<table class='table table-hover'>
	<thead class='thead-dark'>
	<tr>
	<th>BOOK NAME</th>
	<th>ISBN</th>
	
	</tr>
	</thead>
	";
	while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		echo"<tr>";
      echo "<td>{$row['BOOK_NAME']}  </td> ".
         "<td colspan='1'> {$row['ISBN']} </td> ".

         "</tr>";

   }
   echo"</table>";
}
   if(isset($sub))

{

	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql="CREATE TABLE BOOK_STUD(
	ISBN CHAR(13),
	SRN VARCHAR(16),
	ISSUE_DATE VARCHAR(43),
	RETURN_DATE VARCHAR(56),
	PRIMARY KEY(SRN,ISBN),
	FOREIGN KEY(ISBN) REFERENCES BOOK(ISBN)
	ON DELETE CASCADE
	ON UPDATE CASCADE

);";
mysqli_query($conn,$sql);
	$sql2="SELECT * FROM BOOK_R WHERE ISBN='$isbn';";
	$r=mysqli_query($conn,$sql2);
	$remain;
	$date= date("Y/m/d");
	$dater=date("Y/m/d", strtotime("+1 week"));
	$row = mysqli_fetch_assoc($r);
	$remain=$row['NO_OF_COPIES_AVAILABLE'];

	
	if($remain>0){

	$sql="INSERT INTO BOOK_STUD(ISBN,SRN,ISSUE_DATE,RETURN_DATE) VALUES('$isbn','$srn','$date','$dater');";
	mysqli_query($conn,$sql);
	echo"<br><h>RETURN DATE FOR THE BOOK IS $dater</h></br>";
	
		
		$remain=$remain-1;
		$sql2="UPDATE BOOK_R SET NO_OF_COPIES_AVAILABLE='$remain' WHERE ISBN='$isbn'  ;";
		mysqli_query($conn,$sql2);
	}
	else{
		echo"<h1>BOOK NOT AVAILABLE</h1>";
	}
	

		

   




   }
   if(isset($submit1)){
   	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql="SELECT * FROM BOOK_STUD AS BS,BOOK AS B WHERE BS.ISBN=B.ISBN AND BS.SRN='$srn1' ;";
	$retval=mysqli_query($conn,$sql);
	echo"<br>";
	echo "
	<table class='table table-hover'>
	<thead class='thead-dark'>
	<tr>
	<th>ISBN</th>
	<th>BOOKNAME</th>
	
	</tr>
	</thead>
	";
	while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		echo"<tr>";
      echo 
     
         "<td colspan='1'> {$row['ISBN']} </td> ".
         "<td colspan='1'> {$row['BOOK_NAME']} </td> ".

         "</tr>";

   }
   echo"</table>";

   }



?>

</body>
</html>