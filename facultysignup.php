<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css_to_signup.css">
</head>
<body>
  <div class="signup-form">
    <form action="facultysignup.php" method="post">
    <h2>Sign Up</h2>
    <p class="hint-text">Create your account.</p>
        <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Name" required="required">
         
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="con" placeholder="PHONE NUMBER" required="required">
        </div>
    <div class="form-group">
            <input type="text" class="form-control" name="deptid" placeholder="Dept Id" required="required">
        </div>
            
    <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="sub">SignUp Now</button>
        </div>
    </form>

</div>
	<?php
			extract($_POST);
if(isset($sub))
{
	$conn=mysqli_connect("localhost","root","","dbms1");
	$sql="CREATE TABLE FACULTY(
	FACNAME VARCHAR(20),
	FACID VARCHAR(20),
	FACCON INT,
	DEPT_ID CHAR(3),
	PRIMARY KEY(FACID),
	FOREIGN KEY (DEPT_ID) REFERENCES DEPARTMENT(DEPARTMENT_ID)

);";
	mysqli_query($conn,$sql);
	$j=rand(1,1000);
	$jc="FAC".$j;
	$sql="INSERT INTO FACULTY(FACNAME,FACID,FACCON,DEPT_ID) VALUES('$name','$jc','$con','$deptid');";
	$r=mysqli_query($conn,$sql);
	if($r==0)
	{
		$j=rand(1,1000);
	 	$jc="FAC".$j;
	 	$sql="INSERT INTO FACULTY(FACNAME,FACID,FACCON,DEPT_ID) VALUES('$name','$jc','$con','$deptid');";
	 	
	   mysqli_query($conn,$sql);
	   
	}
	echo"<div class='container text-center'>
	<p><strong>SRN ALLOTED IS '$jc'</p></div>";
	



	
}

	?>
</body>
</html>