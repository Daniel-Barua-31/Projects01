
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
		  </div>
		  <br><br>
		  <h3> Blog Post </h3>
		  <div>

		  	<?php
		  	include("Conection.php");
		  		if(isset($_POST['submit-search'])){
		  			$search =mysqli_real_escape_string($con,$_POST['search']);
		  			$sql="Select * from postblog where title like '%$search%' or tag like '%$search%'";

		  			$result=mysqli_query($con,$sql);
		  			$queryResult=mysqli_num_rows($result);

		  			echo "There are " .$queryResult. " result !" ;

		  			if($queryResult > 0 ){
		  				while ($row=mysqli_fetch_assoc($result)) {
		  					$image=$row['image'];
		  			    $title=$row['title'];
		  			    $contant=strip_tags($row['contant']);
		  			    $fews=substr($contant, 0,55);
		  			    $tag=$row['tag'];

		  					echo "<div class='blog-container'>";
		  							echo "<div class='blog-box'>";
		  				echo "<div class='blog-img'>";
              	echo "<img alt='blog' src='uploadedimage/$image'> <br /> ";
              echo "</div>";

              echo "<div class='blog-text'>";
              		echo "<span>February 26, 2016 / $tag </span> <br /> ";
              		echo "<a href='post.php?PID=".$row['PID']."' class='blog-title'>$title</a> <br />";
              		echo "<a href='#' style='color:#8c8d8f;'>$fews....</a> <br />";
              		echo "<a href='#'>Read More</a>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
		  				}

		  			}
		  			else{
		  				echo "No Result found";
		  			}
		  		}
		  	?>
	      
      </div>
</body>
</html>