<?php
session_start();
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
		   <a href="Home_Pages.php">Home</a>
           <a href="SignUp_Pages.php">SignUp</a>
           <a href="Login_Pages.php">Login</a>
		   <a href="#">contact us</a>
		   
		</div>
	<div class="login-inputs">
	<h1>Login</h1>
	<form action="login_Pages.php" method="post">
	<input placeholder="User-id" name="id" type="text" />
	<input placeholder="Password" name="pass" type="password" />
	<input type="submit" value="Login" name="login">
	</form>
	<a class="forget" href="#">Forget Your Password</a>
	<a class="Registration" href="Login_Pages.php"> Sign Up Here </a>
	</div>
</body>
</html>
<?php
include("Conection.php");
if(isset($_POST['login']))
{
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	
	$sql="select userid,password from admin where userid='$id' and password='$pass'";
	$sql1="select acc_id,password from signup where acc_id='$id' and password='$pass'";
			$r=mysqli_query($con,$sql);
			$r1=mysqli_query($con,$sql1);
			if(mysqli_num_rows($r)>0)
			{
				$_SESSION['user_id']=$id;
				$_SESSION['admin_login_status']="loged in";
				header("Location:admin/Admin_Home_Pages.php");
			}
			else if (mysqli_num_rows($r1)>0)
			{
				$_SESSION['user_id']=$id;
				$_SESSION['user_login_status']="loged in";
				header("Location:User/User_Home_Pages.php");
			}
			else{
				echo "<p style='color:red'>Incorrent Userid and Password</p>";
			}
	
}
?>