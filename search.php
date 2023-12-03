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
   <link rel="stylesheet" media="all" href="<?php echo 'process_selection.php'; ?>" /> 
   <script src="search.js" defer></script>
  
    <title>Search</title>      

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
    <div><a href="index.php">Home</a>
    <a href="aboutus.php">About Us</a>
    <a href="features.php">Features</a>
    <a href="search.php">Search</a>
    <a href="logout.php">Log out</a>
    </div>
  </nav>
  <br><br>

  <form action="search.php" method="post">
    <div class="search-box">
        <input type="text" name="search_term" class="search-input" placeholder="Search" required>
        <button type="submit" class="search-button">Go</button>
    </div>
</form>


<br><br>

<form action="recipes.php" method="get">
    <label for="diet">Dietary Preferences</label>
    <select id="diet" name="diet">
        <option value="">--Please choose an option--</option>
        <option value="vegetables">Vegetarian</option>
        <option value="nonvegetable">NonVegetarian</option>
        <option value="glutenfree">Gluten Free</option>
        <option value="vegan">Vegan</option>
    </select>
    <button type="submit">Search</button>
</form>

<script>
function submitSpecificForm(selectedElement) {
    // Check if the 'id' of the element is what we expect
    if (selectedElement.id === 'dishElements') {
        // If it is, submit the form
        document.getElementById('dishForm').submit();
    }
}
</script>
<br>
<br>
<br>

<?php include ("footer.php"); ?>
</body>
</html>

<!--<label for="cuisine">Select Cuisine</label>
<select id="cuisine" name="cuisine">
    <option value="">--Please choose an option--</option>
    <option value="indian">Indian</option>
    <option value="mexican">Mexican</option>
    <option value="nepalese">Nepalese</option>
    <option value="chinese">Chinese</option>
     Add more options as needed 
</select>

<label for="diet">Select Dietary Preference</label>
<select id="diet" name="diet">
    <option value="">--Please choose an option--</option>
    <option value="Vegetarian">Vegetarian</option>
    <option value="Non-Vegeterian">Non-Vegeterain</option>
    <option value="vegan">Vegan</option>
    <option value="gluten-free">Gluten-Free</option>
    Add more options as needed 
</select>

</form>
<br>
 <br> -->