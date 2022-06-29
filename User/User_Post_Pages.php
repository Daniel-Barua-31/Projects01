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
<link rel="stylesheet" href="User_Post_Pages.css">
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
		   <a href="User_Profile_Pages.php">Profile</a>
           <a href="Change_Pass.php">Change Password</a>
		   <a href="?sign=out" style="float:right">Log Out</a>
		   
		   
</div>
<div class="tweet-body"> 
	<h3>Create Your Blog </h3>
  <form  action = "User_Post_Pages.php" method="post" enctype="multipart/form-data"> 
	<label for="tag"> Catagory </label>
	<select id="tag" name="tag">
			<option value="News">News</option>
			<option value="Entertainment">Entertainment</option>
			<option value="Sports">Sports</option>
			<option value="Others">Others</option>
		</select>
	<br>
	<textarea class="title" name="tilte" placeholder="Title" rows="2" cols="30"></textarea> 
	<br><br>
	<textarea class="status" name="status" placeholder="Write your post here!" rows="5" cols="80"></textarea> 
	<br><br>
	<button type="button" id="bro" name="postimage"> Browse <input type="file" name="postimage"> </button>
    <input type="submit"  id="bro" value="Submit" name="submit">
</div> 
<br><br>
</form>
</body>
</html>


<?php
include("../Conection.php");
if(isset($_POST['submit']))
{
	
	$content=$_POST['status'];
	$tag=$_POST['tag'];
	$userid=$_SESSION['user_id'];
	$num=rand(10,100);
	$post_id="pid-".$num;
	$title=$_POST['tilte'];
	$ext= explode(".",$_FILES['postimage']['name']);
	$c=count($ext);
	$ext=$ext[$c-1];
	$date=date("D:M:Y");
	$time=date("h:i:s");
	$image_name=md5($date.$time);
	$image=$image_name.".".$ext;
	
	$query="INSERT INTO postblog value('$post_id','$userid','$title','$content','$image','$tag')";
	if(mysqli_query($con,$query))
	{
		echo "Successfull";
		if($image != null) {
			move_uploaded_file($_FILES['postimage']['tmp_name'],"../uploadedimage/$image");
		}
		
	}
	else
	{
		echo "Error!".mysqli_error($con);
	}	
}
?>