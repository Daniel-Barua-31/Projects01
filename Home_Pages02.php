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
<section id="blog">

        

        <div class="blog-heading">
          <span>My Recent Posts</span>
          <h3>My Blog</h3>
        </div>
       <br>
       <form action="search.php" method="POST">
		  	<input type="text" id="searchbar" name="search" value="Search" placeholder="Search.." autocomplete="off" />
		  	<input type="submit" id="searchbtn" name="submit-search" value="Go" />
       </form>
		  <br><br>
		  <div>
		  		<?php
		  		include("Conection.php");
		  		$qry=mysqli_query($con,"select name,title,postblog.image,tag,contant,PID from signup,postblog where signup.acc_id=postblog.acc_id");
		  		$queryResultArray=mysqli_fetch_array($qry);
		  		while ($r=mysqli_fetch_array($qry)) {
		  			


		  			$image=$r['image'];
		  			$title=$r['title'];
		  			$contant=strip_tags($r['contant']);
		  			$fews=substr($contant, 0,55);
		  			$tag=$r['tag'];
		  			$name=$r['name'];
		  			$PID=$r['PID'];

		  					echo "<div class='blog-container'>";
		  							echo "<div class='blog-box'>";
		  				echo "<div class='blog-img'>";
              	echo "<img alt='blog' src='uploadedimage/$image'> <br /> ";
              echo "</div>";

              echo "<div class='blog-text'>";
              		echo "<span>February 26, 2016 / $tag </span> <br /> ";
              		echo "<a href='post.php?PID=".$r['PID']."' class='blog-title'>$title</a> <br />";
              		echo "By :<a href=''>$name</a> <br />";
              		echo "<a href='#' style='color:#8c8d8f;'>$fews....</a> <br />";
              		echo "<a href='#'>Read More</a>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
		  		}
	        ?>
	      
        </div>
</body>
</html>