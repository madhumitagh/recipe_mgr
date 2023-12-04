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
    <script src="search.js" defer></script>
    <title>Search</title>      
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
  <br><br>

  <div class="container my-5">
  <form action="search.php" method="post">
    <div class="search-box">
        <input type="text" name="search_term" class="search-input" placeholder="Search" required>
        <button type="submit" class="search-button">Serach</button>
    </div>
  </form>
    <div class="container my-5">
    <table class="list">
          <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['search_term'])){
          $search=$_POST['search_term'];
          $db = db_connect();
          $sql="Select * from recipes where ingredients like '%$search%'
          or dietary_preferences like '%$search%' or cuisine_type like '%$search%'";
          $result=mysqli_query($db,$sql);
          if($result){
            if(mysqli_num_rows($result)>0){
              ?>
             <thead>
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
            </thead>
              <?php
              while($row=mysqli_fetch_assoc($result)){
                ?>
              <tbody>       
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['dish_name']; ?></td>
                    <td><?php echo $row['ingredients']; ?></td>
                    <td><?php echo $row['cuisine_type'] ; ?></td>
                    <td><?php echo $row['dietary_preferences']; ?></td>
                    <td><?php echo $row['cook_time'] ; ?></td>
                    <td><?php echo $row['instruction'] ; ?></td>
                    <td><img src="<?php echo 'data:image;base64,'.$row['image_path'] ?>" width=10%/></td>
                    <td><a class="action" href="<?php echo "displayrecipes.php?id=" . $row['id']; ?>">Display</a></td>
                    <?php if (isset($_SESSION['username']) AND $row['username'] == $_SESSION['username']) {
                      echo "<td><a class='action' href='edit.php?id=" . $row['id']."'>Edit</a></td>";
                      echo "<td><a class='action' href='delete.php?id=" . $row['id']."'>Delete</a></td>";
                    } else {
          
                    }
                    ?>
                    
                </tr>
              </tbody>
        <?php }
            } else{ 
                  echo '<h2 class=:text-danger>Data not found</h2>';
            } 
          }
        }
        ?>
  	</table>
    
    </div>
  </div>
</body>
</html>













<br>
<br>
<br>
<?php include ("footer.php"); ?>
</body>
</html>



