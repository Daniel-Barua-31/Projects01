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
<link rel="stylesheet" href="Style_User_home_page.css">

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
		   <a href="?sign=out" style="float:right">Log Out</a>
		   <a href="User_Profile_Pages.php">Profile</a>
		   
		   
		</div>

<section id="blog">

        

        <div class="blog-heading">
          <span>My Recent Posts</span>
          <h3>My Blog</h3>
        </div>
		
		
		
		<div class="blog-container">
  
          
          <div class="blog-box">
  
            
            <div class="blog-img">
              <img alt="blog" src="images/blog-1.jpeg">
            </div>
			
			<div class="blog-text">
              <span> March 24, 2005 / TV Show </span>
              <a href="#" class="blog-title">10 Reasons Why You Should Binge Watch “The Office”</a>
              <a href="#">Read More</a>
            </div>
			
		  </div>
		  
		  <div class="blog-container">
  
          
          <div class="blog-box">
  
            
            <div class="blog-img">
              <img alt="blog" src="images/blog-2.jpeg">
            </div>
			
			<div class="blog-text">
              <span>February 26, 2016 / Games </span>
              <a href="#" class="blog-title">Why Stardew Valley Is So Awesome</a>
              <a href="#">Read More</a>
            </div>
			
		  </div>
		  
		  <div class="blog-container">
  
          
          <div class="blog-box">
  
            
            <div class="blog-img">
              <img alt="blog" src="images/blog-3.jpeg">
            </div>
			
			<div class="blog-text">
              <span>11 February 2022 / khela </span>
              <a href="#" class="blog-title">The only way to stop Manchester City</a>
              <a href="#">Read More</a>
            </div>
			
		  </div>
		  <div>
		  		<h1> Blog Post</h1>
		  		<?php
		  		include("../Conection.php");
		  		$qry=mysqli_query($con,"select acc_id,title,contant,image,tag from postblog where 1");
		  		$queryResultArray=mysqli_fetch_array($qry);
		  		while ($r=mysqli_fetch_array($qry)) {
		  			echo $r['title'] . "<br />";
		  			echo $r['contant'] . "<br />";

		  		}
	        ?>
        </div>
			

</body>



</html>