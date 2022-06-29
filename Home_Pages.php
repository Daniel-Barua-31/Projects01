<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, intial-scale=1.0" name="viewport">
<link rel="stylesheet" href="Style_home_page.css">

<title>Blog Page</title>

<link rel="shortcut icon" href="images/fav-icon.svg"/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<div class="topnav">
		   <a href="Home_Pages.php">Home</a>
           <a href="SignUp_Pages.php">SignUp</a>
           <a href="Login_Pages.php">Login</a>
		   <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">contact us</a>
		   
		</div>
<form action="search.php" method="post">
		  	<input type="text" id="searchbar" value="Search" placeholder="Search.." autocomplete="off" />
		  	<input type="submit" id="searchbtn" value="Go" />
</form>

<section id="blog">

        

        <div class="blog-heading">
          <span>My Recent Posts</span>
          <h3>My Blog</h3>
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
		  <br><br>
		  <h1> Blog Post</h1>
		  <div class="card">
		  		<?php
		  		include("Conection.php");
		  		$qry=mysqli_query($con,"select acc_id,title,contant,image,tag from postblog");
		  		$queryResultArray=mysqli_fetch_array($qry);
		  		while ($r=mysqli_fetch_array($qry)) {

		  			$image=$r['image'];
		  			$title=$r['title'];
		  			$contant=$r['contant'];
		  			echo "<div style='font-size: 1.3rem;font-weight: 500;color: #272727;text-align: center;'>$title</div><br />";
		  			echo "<div style='height:100px;text-align: center; '><img src='uploadedimage/$image' height='100px' width='80px'></div> <br />";
		  			echo   "<div style=' padding: 30px;display: flex;flex-direction: column; margin: 0px 500px 0px 500px; '>$contant </div> <br />";
		  			"<div />";

		  		}
	        ?>
	      
        </div>
</body>
</html>