<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment2">
    <meta name="keywords" content=" recipes, food, pictures, cooking, chefs, taste">
    <meta name="author" content="Madhumita Ghosh and Pooja Rishal">

      <!-- 
        Author: Madhumita Ghosh and Pooja Rishal
        File Name: index.html
        Date Created: Nov 10, 2023
        Purpose: This is the home page and it displays the various otions to choose from. 
        -->
        
     


   <link rel="stylesheet" media="all" href="<?php echo 'CSS/recipe.css'; ?>" />
   <link rel="stylesheet" media="all" href="<?php echo 'CSS/aboutus.css'; ?>" />     


    <title>About US</title>      

</head>

<body>
  <?php include ("header.php") ?>

  <?php
        require_once('db_credentials.php');
        require_once('database.php');
        
        
  ?>
      

  <nav> 
    <div><a href="index.php">Home</a>
    <a href="aboutus.php">About Us</a>
    <a href="features.php">Features</a>
    <a href="search.php">Search</a>
    <a href="logout.php">Log out</a>
    </div>
  </nav>


<div>
<h2> Welcome to Tempting Recipes! </h2>
</div>
<br>
<br>
<div class= "container">
<p><h3> At Tempting Recipes, we believe that cooking should be a joyful and straightforward experience for everyone.</h3></p>
<p><h3>Our online recipe manager is designed to make your culinary journey easier, more organized, and infinitely more enjoyable.</h3></p>
<p><h3>Whether you are a beginner cook or a seasoned chef, our platform is tailored to meet your needs.</h3></p>
</div>
<b>
<br>
<h2>Enjoy your cooking...</h2>

  
   
    
<?php include ("footer.php"); ?>
</body>
</html>
