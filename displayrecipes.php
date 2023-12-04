<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="CSS/recipe.css" />
</head>
<body>

<?php
require_once('db_credentials.php');
require_once('database.php');
include "header.php" ;
$db = db_connect();
//access URL parameter
$id = $_GET['id'] ;
$sql = "SELECT * FROM recipes WHERE id= '$id' ";
if ($result_set = mysqli_query($db, $sql)) {
        $result = mysqli_fetch_assoc($result_set);
        $username = $result['username'];
        $dish = $result['dish_name'] ;
        $ingredients = $result['ingredients'];
        $cuisine = $result['cuisine_type'] ;
        $diet = $result['dietary_preferences'] ;
        $cook = $result['cook_time'] ;
        $instruction = $result['instruction'];
        $image = $result['image_path'] ;
}
mysqli_free_result($result_set);
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
    <div id="content">
        <a class="back-link"  href="features.php"> Back to List</a>
        <div class="Display">
            <h1>Display Recipes</h1>
            <form">
        
        <dl>
        <dt>Name</dt>
        <dd><input type="text" name="dish_name" readonly value ="<?php echo "$dish"; ?>"/></dd>
        </dl>

        <dl>
        <dt>Ingredients</dt>
        <dd><input type="text" name="ingredients" readonly value ="<?php echo "$ingredients"; ?>"/></dd>
        </dd>
        </dl>

        <dl>
        <dt>Cuisine Type</dt>
        <dd><input type="text" name="cuisine_type" readonly value ="<?php echo "$cuisine"; ?>"/></dd>
        </dd>
        </dl>

        <dl>
        <dt>Diet Preference</dt>
        <dd><input type="text" name="dietary_preferences" readonly value ="<?php echo "$diet"; ?>"/></dd>
        </dd>
        </dl>

        <dl>
        <dt>Time</dt>
        <dd><input type="text" name="cook_time" readonly value ="<?php echo "$cook"; ?>" /></dd>
        </dd>
        </dl>

        <dl>
        <dt>Instructions</dt>
        <dd><textarea name="instruction" rows="20" cols="40" readonly> <?php echo "$instruction"; ?> </textarea></dd>
        </dd>
        </dl>

      <dl>
        <dt>Image</dt>
        <dd><img src="<?php echo 'data:image;base64,'.$image ?>" width=50%/></dd>
        </dd>
      </dl>
      <br>
    

      <!-- <dl>
        <dt>likes</dt>
        <dd><input type="text" name="likes"  /></dd>
      </dl> -->

    </form>


  </div>

</div><br><br>

<?php include 'footer.php'; ?>


  