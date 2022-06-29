<html>
<head>
<meta charset="utf-8"/>
<title>SignUp Page</title>
<link rel="stylesheet" href="Style_SignUp_page.css">
</head>
<body>
<section class="login-container">
     <div class="topnav">
		   <a href="Home_Pages.php">Home</a>
           <a href="SignUp_Pages.php">SignUp</a>
           <a href="Login_Pages.php">Login</a>
		   <a href="#">contact us</a>
		   
		</div>
	<div class="login-inputs">
	<h1>Registration</h1>
	<form action="SignUp_Pages.php" method="post" enctype="multipart/form-data">
	<input placeholder="Your name" type="text" name="name"/>
	<input placeholder="Address" type="text" name="address" />
	<input placeholder="Gender" type="list" name="gender" list="Gender"/>
	    <datalist id="Gender">
	      <option value="Male">
          <option value="Female">
          <option value="Others">
		 </datalist>
	<input placeholder="Mobile number" type="text" id="mobile" name="phone">
	<input placeholder="Example@gmail.com" type="email" name="email"/>
	<input placeholder="Password" type="password" name="password" />
	
	<p class="choice"> Select type of user : </p>
	<label class="container"> Writter
     <input type="radio" checked="checked" name="usertype">
     <span class="checkmark"></span>
    </label>
    <label class="container"> Reader
      <input type="radio" name="usertype">
      <span class="checkmark"></span>
    </label>
    <label class="container"> Both
      <input type="radio" name="usertype">
      <span class="checkmark"></span>
    </label>
	<a class ="picture"> Upload your picture </a>
	<input type="file" id="myFile" name="imagefilename">
	
	<button name="submit">Submit</button>
	</form>
	<a class="forget" href="Login_Pages.php"> Login Here</a>
	</div>
</body>
</html>
<?php
include("Conection.php");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$usertype=$_POST['usertype'];
	$num=rand(10,100);
	$cus_id="id-".$num;
	$ext= explode(".",$_FILES['imagefilename']['name']);
	$c=count($ext);
	$ext=$ext[$c-1];
	$date=date("D:M:Y");
	$time=date("h:i:s");
	$image_name=md5($date.$time.$cus_id);
	$image=$image_name.".".$ext;
	
	$query="insert into signup values ('$cus_id','$name','$address','$gender',$phone,'$email','$password','$usertype','$image')";
	if(mysqli_query($con,$query))
	{
		echo "Successfull";
		if($image != null) {
			move_uploaded_file($_FILES['imagefilename']['tmp_name'],"uploadedimage/$image");
		}
		
	}
	else
	{
		echo "Error!".mysqli_error($con);
	}	
}
?>	