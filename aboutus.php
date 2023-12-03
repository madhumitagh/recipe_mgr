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
        
     


   <link rel="stylesheet" media="all" href="<?php echo 'recipe.css'; ?>" />      


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
<h1> Welcome to Masterchef Recipes! </h>
</div>
<br>
<br>
<div>
<p><h2> At Masterchef Recipes, we believe that cooking should be a joyful and straightforward experience for everyone.</h2></p>
<p><h2>Our online recipe manager is designed to make your culinary journey easier, more organized, and infinitely more enjoyable.</h2></p>
<p><h2>Whether you are a beginner cook or a seasoned chef, our platform is tailored to meet your needs.</h2></p>
</div>
<b>
<br>
<h1>Enjoy your cooking...</h1>

  
   
    
<?php include ("footer.php"); ?>
</body>
</html>
