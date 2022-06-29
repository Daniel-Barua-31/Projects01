<?php
	session_start();
	
	if($_SESSION['user_login_status']!="loged in" and ! isset($_SESSION['user_id']))
		header("Location:../Home_Pages.php");
	if(isset($_GET['sign']) and $_GET['sign']=="out") {
		$_SESSION['user_login_status']="loged out";
		unset($_SESSION['user_id']);
	header("Location:../Home_Pages.php");
	}
?>


<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, intial-scale=1.0" name="viewport">
<link rel="stylesheet" href="User_Profile_Pages.css">

<title>Blog Page</title>

<link rel="shortcut icon" href="images/fav-icon.svg"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

 
</head>
<body>

<div class="topnav">
           <h1 id="Header01"> This is User Pages </h1>            
		   <a href="User_Home_Pages.php">Home</a>
           <a href="User_Post_Pages.php">Post</a>
		   <a href="User_Post_Pages.php">Edit Your Blog</a>
           <a href="Change_Pass.php">Change Password</a>
		   <a href="User_Profile_Pages.php">Profile</a>
		   <a href="?sign=out" style="float:right">Log Out</a>
		   
		   
		</div>
<div class="card">
	<h1> About Me </h1>
	<?php
	include("../Conection.php");
	$cusid=$_SESSION['user_id'];
	$sql="select name,address,gender,phone,email,image from signup where acc_id='$cusid'";
	$r=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($r);
	$name=$row['name'];
	$image=$row['image'];
	$adds=$row['address'];
	$mbl=$row['phone'];
	$email=$row['email'];
	echo "<h2 style='color : white;' > Hello My name is $name . </h2>";
	echo "<div style='height:100px;'><img src='../uploadedimage/$image' height='80px' width='100px'></div>";
	echo "<p> <b> Address:</b> $adds</br><b>Mobile No:</b> $mbl </br><b>Email:</b> $email</br><p>"
	?>
</div>
</body>



</html>