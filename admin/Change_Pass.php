<?php
	session_start();
	
	if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']))
		header("Location:../Home_Pages.php");
	if(isset($_GET['sign']) and $_GET['sign']=="out") {
		$_SESSION['admin_login_status']="loged out";
		unset($_SESSION['user_id']);
	header("Location:../Home_Pages.php");
	}
?>

<html>
<head>
<meta charset="utf-8"/>
<title>Login Page</title>
<link rel="stylesheet" href="Login_Pages.css">
</head>
<body>
<section class="login-container">
     <div class="topnav">
		   <a href="User_Home_Pages.php">Home</a>
           <a href="User_Post_Pages.php">Post</a>
           <a href="?sign=out" style="float:right">Log Out</a>
		   
		</div>
	<div class="login-inputs">
	<h1>Change Password</h1>
	<form>
	<input placeholder="Old Password" type="Password" />
	<input placeholder="New Password" type="password" />
	<input placeholder="Re Type Password" type="password" />
	<button>Change Password</button>
	</form>
	</div>
</body>
</html>