<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
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
      <script src="registration.js" defer></script> 
      <title>Features</title>  
      <style>
        .list {
            border-collapse: collapse;
        }

        .list, .list th, .list td {
            border: 1px solid black;
        }
      </style>
</head>
<body>
        <?php include ("header.php") ?>
        <?php
              require_once('db_credentials.php');
              require_once('database.php');
              $db = db_connect();
         ?>
          <?php
          if (isset($_SESSION["username"])) {
            echo "<h3> Welcome ".$_SESSION['username']."</h3>";
          }
          ?>
          
            <nav> 
              <div>
                <a href="index.php">Home</a>
                <a href="aboutus.php">About Us</a>
                <a href="features.php">Features</a>
                <a href="search.php">Search</a>

 

                <?php
                 if (isset($_SESSION["username"])) {
                  echo "<a href=\"logout.php\">Logout</a>";
                } 
                ?>
              </div>
            </nav><br>
            <form action="features.php" method="post">
              <div class="search-box">
                <input type="text" name="search" class="search-input" placeholder="Search"
                 value ="<?php echo $_POST['search']; ?>">
                  <button type="submit" class="search-button">Search</button>
              </div>
            </form>

            <table class="list">

        <?php 
              if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['search'])){
                $search=$_POST['search'];
                $sql="Select * from recipes where ingredients like '%$search%'
                or dietary_preferences like '%$search%' or cuisine_type like '%$search%'";
              } else {
                $sql = "SELECT * FROM recipes ";
              }
              //echo $sql;
              $result_set = mysqli_query($db,$sql);
              if ($result_set AND mysqli_num_rows($result_set)>0) {
          ?>
                <tr>
                  <th>User</th>
                  <th>Name</th>
                  <th>Ingredients</th>
                  <th>Type</th>
                  <th>Diet Preference</th>
                  <th>Cook Time</th>
                  <th>Instruction</th>
                  <th>Image</th>
                </tr>

                <?php
                  while($results = mysqli_fetch_assoc($result_set))  {
                ?>
                  <tr>
                      <td><?php echo $results['username']; ?></td>
                      <td><?php echo $results['dish_name']; ?></td>
                      <td><?php echo $results['ingredients']; ?></td>
                      <td><?php echo $results['cuisine_type'] ; ?></td>
                      <td><?php echo $results['dietary_preferences']; ?></td>
                      <td><?php echo $results['cook_time'] ; ?></td>
                      <td><?php echo $results['instruction'] ; ?></td>
                      <td><img src="<?php echo 'data:image;base64,'.$results['image_path'] ?>" width=10%/></td>
                      <td><a class="action" href="<?php echo "displayrecipes.php?id=" . $results['id']; ?>">Display</a></td>
                      <?php
                       if (isset($_SESSION['username']) AND $results['username'] == $_SESSION['username']) {
                        echo "<td><a class='action' href='edit.php?id=" . $results['id']."'>Edit</a></td>";
                        echo "<td><a class='action' href='delete.php?id=" . $results['id']."'>Delete</a></td>";
                        } else {
                        }
                      ?>    
                  </tr>

            <?php }
              }
            ?>

  	</table><br><br>
    <a href = "add.php"> Create new recipe </a><br><br>
  
    <?php include("footer.php"); ?>
</body>
</html>
