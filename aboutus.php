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
    <a href="logout.php">Log out</a>
    </div>
  </nav>


<div>
<h3> Welcome to Tempting Recipes! </h3>
</div>
<div class= "container">
<p><h4> At Tempting Recipes, we believe that cooking should be a joyful and straightforward experience for everyone.</h4></p>
<p><h4>Our online recipe manager is designed to make your culinary journey easier, more organized, and infinitely more enjoyable.</h4></p>
<p><h4>Whether you are a beginner cook or a seasoned chef, our platform is tailored to meet your needs.</h4></p>
</div>
<b>
<p>
<h3>Enjoy your cooking...</h3>  
<?php include ("footer.php"); ?>
</body>
</html>
