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
        
      <link rel="stylesheet" media="all" href="<?php echo 'CSS/recipe.css'; ?>" />  
      <link rel="stylesheet" media="all" href="<?php echo 'CSS/features.css'; ?>" />     
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
              require_once('global.php');
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
                <?php
                 if (isset($_SESSION["username"])) {
                  echo "<a href=\"logout.php\">Logout</a>";
                } 
                ?>
              </div>
            </nav><br>
            <form action="features.php" method="post">
              <div class="search-box">
              <?php
              $search_val = "";
              $cuisine_val = "";
              $diet_val = "";
              if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['search'])){
                  $search_val = $_POST['search'];
                }
                if (isset($_POST['cuisine_type'])){
                  $cuisine_val = $_POST['cuisine_type'];
                }
                if (isset($_POST['diet_type'])){
                  $diet_val = $_POST['diet_type'];
                }
              }
              ?>
                <label for="filter">Filter</label> &nbsp
                <select id = "cuisine" name="cuisine_type">
                  <?php
                  if ($cuisine_val != "") {
                    echo "<option value='$cuisine_val'>$cuisine_val</option>" ;
                  } else {
                    echo "<option value=''>Filter by Cuisine Type</option>" ;
                  }
                  foreach ($g_cuisine_types as $val) {
                    if ($cuisine_val == '' or $cuisine_val != $val) {
                      echo "<option value='$val'>$val</option>";
                    }
                  }
                  ?>
                </select>
                &nbsp
                <select id = "diet" name="diet_type">
                <?php
                  if ($diet_val != "") {
                    echo "<option value='$diet_val'>$diet_val</option>" ;
                  } else {
                    echo "<option value=''>Filter by Diet Type</option>" ;
                  }
                  foreach ($g_diet_types as $val) {
                    if ($diet_val == '' or $diet_val != $val) {
                      echo "<option value='$val'>$val</option>";
                    }
                  }
                  ?>
                </select>
                &nbsp
                <input type="text" name="search" class="search-input" placeholder="Search"
                 value ="<?php echo $search_val; ?>">
                  <button type="submit" class="search-button">Search</button>
              </div>
            </form>

            <table class="list">

        <?php 
              $sql = "SELECT * FROM recipes";
              if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $cuisine = '';
                if (isset($_POST['cuisine_type']) AND $_POST['cuisine_type'] != '') {
                  $cuisine = $_POST['cuisine_type'];
                  $sql = $sql . " WHERE cuisine_type='".$cuisine."'";
                }

                $diet = '';
                if (isset($_POST['diet_type']) AND $_POST['diet_type'] != '') {
                  $diet = $_POST['diet_type'];
                  if($cuisine != '') {
                    $sql = $sql . " and ";
                  } else {
                    $sql = $sql . " WHERE ";
                  }
                  $sql = $sql . " dietary_preferences='".$diet."'";
                }

                if (isset($_POST['search']) AND $_POST['search'] != ''){
                  $search=$_POST['search'];
                  if ($diet != '' or $cuisine != '') {
                    $sql = $sql . " and ";
                  } else {
                    $sql = $sql . " WHERE ";
                  }
                  $sql=$sql . " (ingredients like '%$search%'or dietary_preferences like '%$search%' or cuisine_type like '%$search%')";
                }
              }
              //echo $sql;
              $result_set = mysqli_query($db,$sql);
              if ($result_set AND mysqli_num_rows($result_set)>0) {
          ?>
                <tr>
                  <th>User</th>
                  <th>Name</th>
                  <th>Ingredients</th>
                  <th>CuisineType</th>
                  <th>DietPreference</th>
                  <th>CookTime</th>
                  <th>Instruction</th>
                  <th>Image</th>
                </tr>

                <?php
                  while($results = mysqli_fetch_assoc($result_set))  {
                    $ingred = $results['ingredients'];
                    if (strlen($ingred) > 50) {
                      $ingred = substr($ingred,0, 50);
                      $ingred = $ingred . "...";
                    }
                    $instruct = $results['instruction'];
                    if (strlen($instruct) > 50) {
                      $instruct = substr($instruct,0, 50);
                      $instruct = $instruct . "...";
                    }
                ?>
                  <tr>
                      <td><?php echo $results['username']; ?></td>
                      <td><?php echo $results['dish_name']; ?></td>
                      <td><?php echo $ingred; ?></td>
                      <td><?php echo $results['cuisine_type'] ; ?></td>
                      <td><?php echo $results['dietary_preferences']; ?></td>
                      <td><?php echo $results['cook_time'] ; ?></td>
                      <td><?php echo $instruct; ?></td>
                      <td><img src="<?php echo 'data:image;base64,'.$results['image_path'] ?>" width=40%/></td>
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
