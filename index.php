<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment2">
    <meta name="keywords" content=" recipes, food, pictures, cooking, chefs, taste">
    <meta name="author" content="Madhumita Ghosh and Pooja Rishal">
    <title>Home</title>      

      <!-- 
        Author: Madhumita Ghosh and Pooja Rishal
        File Name: index.html
        Date Created: Nov 10, 2023
        Purpose: This is the home page and it displays the various otions to choose from. 
        -->
        
     <link rel="stylesheet" href="<?php echo 'CSS/recipe.css'; ?>"/>   
     <link rel="stylesheet" href="<?php echo 'CSS/index.css'; ?>"/>     
  </head>
  <body>
  <?php include ("header.php") ?>
  <?php
        require_once('db_credentials.php');
        require_once('database.php');
  ?>

  <?php
      $sql = "SELECT * FROM recipes";     
//echo $sql;
//$result_set = mysqli_query($db, $sql);
  ?>
    <nav> 
      <div>
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="features.php">Features</a>
      </div>
    </nav>

      <div><h2>Be your own MasterChef</h2></div><br>
        <div>
            <p><h2>Your personal recipe library</h2></p><br>
            <p><h3>A free recipe keeper</h3></p><br>
        </div>

        <!-- Join Free Button -->
            <form action="registration.php" method="get">
              <button type="submit" id="joinButton">JOIN FREE</button>
            </form>
    
        <!-- Sign In Button -->
            <form action="signin.php" method="get">
            <button type="submit" id="signButton">SIGN IN</button>
            </form><br><br>
 </body>
</html>


<?php include ("footer.php"); ?>

  
