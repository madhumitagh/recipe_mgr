<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>

<?php
require_once('db_credentials.php');
require_once('database.php');
include "header.php" ;
$db = db_connect();
?>

<?php
$id = $_GET['id'];
if (isset($_POST["submit"]) AND isset($_POST['dish_name'])) {
  // Handle form values sent by new.php
  //if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['dish_name'])){
 $id = $_GET['id'];
 $username = $_SESSION['username'];
 $dish = $_POST['dish_name'] ;
 $ingredients = $_POST['ingredients'];
 $cuisine = $_POST['cuisine_type'] ;
 $diet = $_POST['dietary_preferences'] ;
 $cook = $_POST['cook_time'] ;
 $instruction = $_POST['instruction'];
 $image = '';
 if (count($_FILES) > 0 AND isset($_FILES['image']) AND isset($_FILES['image']['tmp_name']) AND
     $_FILES['image']['tmp_name'] != '' AND
     getimagesize($_FILES['image']['tmp_name']) > 0) {
  $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
  $image_type = $_FILES['image']['type'];
  if (!substr($image_type, 0, 5)) {
    $image = '';
  }
 }
 $likes = 1;
if ($image != '') {
  $sql = "UPDATE recipes SET dish_name='$dish',ingredients='$ingredients',dietary_preferences='$diet',cook_time='$cook',instruction='$instruction',image_path='$image' where id='$id'";
} else {
  $sql = "UPDATE recipes SET dish_name='$dish',ingredients='$ingredients',dietary_preferences='$diet',cook_time='$cook',instruction='$instruction' where id='$id'";
}

if ($result = mysqli_query($db, $sql)) {
   header("Location: displayrecipes.php?id=$id");
   mysqli_free_result($result);
  } else {
    echo "<script>alert('Failure!');</script>";
  }  
}
?>

<?php

//access URL parameter

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
                <a href="search.php">Search</a>
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
            <h1>Edit Recipe</h1>
            <form method="POST" enctype="multipart/form-data">
        
        <dl>
        <dt>Name</dt>
        <dd><input type="text" name="dish_name"  value ="<?php echo "$dish"; ?>"/></dd>
        </dl>

        <dl>
        <dt>Ingredients</dt>
        <dd><input type="text" name="ingredients"  value ="<?php echo "$ingredients"; ?>"/></dd>
        </dd>
        </dl>

        <dl>
        <dt>Cuisine Type</dt>
        <dd><input type="text" name="cuisine_type"  value ="<?php echo "$cuisine"; ?>"/></dd>
        </dd>
        </dl>

        <dl>
        <dt>Diet Preference</dt>
        <dd><input type="text" name="dietary_preferences"  value ="<?php echo "$diet"; ?>"/></dd>
        </dd>
        </dl>
             <dl>
        <dt>dietary_preference</dt>
        <dd>
        <select id="diet" name="dietary_preferences">
        <option value="<?php echo "$diet"; ?>"><?php echo "$diet"; ?></option>
        <option value="Veg">Veg</option>
        <option value="NonVeg">NonVeg</option>
        <option value="GlutenFree">GlutenFree</option>
        <option value="Egg">Egg</option>
       </select>
        </dd>
      </dl>

        <dl>
        <dt>Time</dt>
        <dd><input type="text" name="cook_time"  value ="<?php echo "$cook"; ?>" /></dd>
        </dd>
        </dl>

        <dl>
        <dt>Instructions</dt>
        <dd><textarea name="instruction" rows="20" cols="40" > <?php echo "$instruction"; ?> </textarea></dd>
        </dd>
        </dl>

      <dl>
        <dt>Image</dt>
        <dd><input type="file" name="image" accept="image/*"></dd>
             <img src="<?php echo 'data:image;base64,'.$image ?>" width=20%/>
              </dd>
        </dd>
      </dl>
      <br>
      <input type="submit" value="Update" name="submit" />
    

      <!-- <dl>
        <dt>likes</dt>
        <dd><input type="text" name="likes"  /></dd>
      </dl> -->

    </form>
  </div>
</div><br><br>
<?php include 'footer.php'; ?>


  