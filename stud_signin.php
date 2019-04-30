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
    <form action="stud_signin.php" method="post">
    <h2>Login</h2>
    <p class="hint-text">Log into your account. </p>
        <div class="form-group">
        <input type="text" class="form-control" name="srn" placeholder="SRN" required="required">
         
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="confirm_srn" placeholder="Confirm SRN" required="required">
        </div>
            
    <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="sub">Login</button>
        </div>
    </form>

</div>
<?php
extract($_POST);
if(isset($sub))
{
	if($srn == $confirm_srn){
		$conn=mysqli_connect("localhost","root","","dbms1");
		$sql="INSERT INTO STUDENT(SRN) VALUES('$srn');";
		$r=mysqli_query($conn,$sql);
		if($r==0){


		header('Location:stud_home.html');
	}
	else if($r==1){
		echo "fac id not registered";
		$sql="DELETE FROM STUDENT WHERE SRN='$srn';";
		mysqli_query($conn,$sql);
		header('Location:signup.php');


	}

	}
	else
		echo "SRN s don't match";
}
?>
</body>
</html>