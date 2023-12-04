
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
   
  
  </head>


<body>
<br>
<a class="back-link" href="<?php echo 'search.php'; ?>"> Back to List</a>
<br>

  <?php include ("header.php") ?>

  <?php
        require_once('db_credentials.php');
        require_once('database.php');
        
        
        
        // Connect to the database
        $db = mysqli_connect('localhost', 'root', "", 'assignment2');
        
        // Check the connection
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Check if the dishElement parameter is set and not empty
        if (isset($_GET['dishElement']) && $_GET['dishElement'] != '') {
            $dishElement = $_GET['dishElement'];
        
            // Create a safe query
            // Ensure that your table name and column names are correct
            $query = "SELECT * FROM recipes WHERE CONCAT(dish_name, '-', ingredients, '-', cuisine_type, '-', dietary_preference, '-', cook_time, '-', instructions, '-', image_path) = ?";
            
            if ($stmt = mysqli_prepare($db, $query)) {
                mysqli_stmt_bind_param($stmt, 's', $dishElement);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
        
                // Check if we have a recipe returned
                if ($row = mysqli_fetch_assoc($result)) {
                    // Display the recipe details
                    echo "<h1>" . htmlspecialchars($row['dish_name']) . "</h1>";
                    echo "<p>" . nl2br(htmlspecialchars($row['instructions'])) . "</p>";
                    echo "<img src='image/" . htmlspecialchars($row['image_path']) . "' alt='" . htmlspecialchars($row['alt_text']) . "'>";
                } else {
                    echo "No recipe found for the selected dish element.";
                }
                
                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                // Handle errors related to prepare statement
                echo "Prepare failed: " . htmlspecialchars(mysqli_error($db));
            }
        
            // Close the database connection
            mysqli_close($db);
        }
        ?>


<footer>
  &copy; <?php echo date('Y'); ?> recipemanager
</footer>

</body>
</html>

