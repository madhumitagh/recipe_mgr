<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" media="all" href="CSS/recipe.css" />
</head>
<body>

<?php include "header.php" ; ?>

<?php
require_once('db_credentials.php');
require_once('database.php');
require_once('global.php');
$db = db_connect();

  if (isset($_POST["submit"]) AND isset($_POST['dish_name'])) {
  // Handle form values sent by new.php
  //if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['dish_name'])){
 //$id = $_POST['id'] ;
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
 $likes = 1;//$_POST['likes'] ;

  
$sql = "INSERT INTO recipes(username,dish_name,ingredients,cuisine_type,dietary_preferences,cook_time,instruction,image_path,likes)
 VALUES ('$username','$dish','$ingredients','$cuisine','$diet','$cook','$instruction','$image','$likes')";
if ($result = mysqli_query($db, $sql)) {
   $id = mysqli_insert_id($db);
   header("Location: displayrecipes.php?id=$id");
   mysqli_free_result($result);
  } else {
    echo "<script>alert('Failure!');</script>";
  }
  
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

<div id="content">
 <a class="back-link" href="<?php echo 'index.php'; ?>"> Back to List</a>
  <div class="add">
    <h1>Add Recipes</h1>
    <form method="POST" enctype="multipart/form-data">

      <dl>
        <dt>Dish_name</dt>
        <dd><input type="text" name="dish_name" /></dd>
      </dl>

      <dl>
        <dt>Ingredients</dt>
        <dd><input type="text" name="ingredients" /></dd>
      </dl>

      <dl>
        <dt>Cuisine_type</dt>
        <dd>
          <select id = "cuisine" name="cuisine_type">
                <option value="">--Please select an option--</option>
                <?php
                foreach ($g_cuisine_types as $val) {
                  echo "<option value='$val'>$val</option>";
                }
                ?>
          </select>
        </dd>
      </dl>

      <dl>
        <dt>Dietary_preference</dt>
        <dd>
          <select id="diet" name="dietary_preferences">
            <option value="">--Please choose an option--</option>
            <?php
                foreach ($g_diet_types as $val) {
                  echo "<option value='$val'>$val</option>";
                }
              ?>
          </select>
        </dd>
      </dl>

      <dl>
        <dt>Cook_time</dt>
        <dd><input type="text" name="cook_time" /></dd>
      </dl>

      <dl>
        <dt>instructions</dt>
        <dd><textarea  name="instruction" rows="20" cols="40"> </textarea></dd>
        </dd>
      </dl>

      <dl>
        <dt>image_path</dt>
        <dd>  <input type="file" name="image" accept="image/*"></dd>
        </dd>
      </dl>
      <br>
    

      <!-- <dl>
        <dt>likes</dt>
        <dd><input type="text" name="likes"  /></dd>
      </dl> -->

      <div id="operations">
        <input type="submit" value="Create" name="submit" />
      </div>
    </form>


  </div>

</div><br><br>

<?php include 'footer.php'; ?>
