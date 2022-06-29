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
           <a href="Login pages.php">Login</a>
		   <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">contact us</a>
		   
		</div>

<section id="blog">

        

        <div class="blog-heading">
          <span>Recent Posts</span>
          <h3>Blogs</h3>
        </div>
        <form action="search.php" method="POST">
		  	<input type="text" id="searchbar" name="search" value="Search" placeholder="Search.." autocomplete="off" />
		  	<input type="submit" id="searchbtn" name="submit-search" value="Go" />
       </form>
        <div>
		  		<?php
		  		include("Conection.php");
		  		$PID=mysqli_real_escape_string($con,$_GET['PID']);

		  		$sql="Select * from postblog where PID='$PID'";

		  		$result=mysqli_query($con,$sql);

		  		$queryResult=mysqli_num_rows($result);

		  		if($queryResult > 0) {

		  			while ($r=mysqli_fetch_assoc($result)) {
		  			


		  			$image=$r['image'];
		  			$title=$r['title'];
		  			$contant=$r['contant'];
		  			$tag=$r['tag'];

		  					echo "<div class='blog-container'>";
		  							echo "<div class='blog-box'>";
		  							echo "<span class='blog-title'>$title</span> <br />";
		  				echo "<div class='blog-img'>";
              	echo "<img alt='blog' src='uploadedimage/$image'> <br /> ";
              echo "</div>";

              echo "<div class='blog-text'>";
              		echo "<span> 24 Janary / $tag </span> <br /> ";
              		
              		echo "writter: <a href='#'></a> <br />";
              		echo "<span style='color:#8c8d8f;'>$contant</span> <br />";
              echo "</div>";
              echo "</div>";
              echo "</div>";
		  		}

		  		}

		  		
	        ?>
	      
        </div>
		  </div>
			

</body>



</html>