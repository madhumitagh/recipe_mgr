<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="<?php echo 'CSS/signin.css'; ?>" /> 
    <script defer src="JS/signin.js"></script>
</head>
<body>


<?php
require_once('db_credentials.php');
require_once('database.php');
include "header.php" ;
$db = db_connect();

  // Handle form values sent by new.php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'] ;
    $password = $_POST['password'];
   $sql = "SELECT * FROM registration WHERE username = ('$username') and password = ('$password')";
   $result = mysqli_query($db, $sql);
 
   if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('SignIn successfull');</script>";
    $finfo = mysqli_fetch_array($result, MYSQLI_BOTH);
    $_SESSION["username"] = $finfo["username"];
    header("Location: features.php");
    mysqli_free_result($result);
    die();
   } else {
    echo "<script>alert('SignIn unsuccessfull!');</script>";
    mysqli_free_result($result);
   }
  }
?>

<nav> 
      <div>
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="features.php">Features</a>
        <a href="search.php">Search</a>
      </div>
</nav><br>

<br>
<a class="back-link" href="<?php echo 'index.php'; ?>"> Back to List</a>
<br>
<h2>Enter your username and password<h2>
<br>
<div class="container">
        <div class="row col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"> 
                </div>

                <div class="panel-body">
                    <div id="error"></div>
                    <form id="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                       
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required />
                        </div>

                        <br><br>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required />
                        </div>
                        <br><br>

                         <div>
                            
                         <button type="submit" class="btn btn-primary" id="button">Sign In</button><br><br>
                                
                                <br>
                                <a href="registration.php">Don't have an account? Click to SignUp</a><br><br>
                            </form>
                    
                        </div>
                        
</div>
<br>
<br>  
           
<?php include ("footer.php"); ?>
</body> 
</html>
   


    
    
   