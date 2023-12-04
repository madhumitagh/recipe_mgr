
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment2">
    <meta name="keywords" content=" recipes, food, pictures, cooking, chefs, taste">
    <meta name="author" content="Madhumita Ghosh and Pooja Rishal">
    <title>Form</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="CSS/registration.css">
    <link rel="stylesheet" type="text/css" href="CSS/recipe.css">
    <script src="registration.js" defer></script>
</head>
<body>
<?php
    require_once('db_credentials.php');
    require_once('database.php');
    include "header.php" ;
    $db = db_connect();

  // Handle form values sent by new.php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phonenumber = $_POST['phonenumber'];


    $sql = "SELECT * FROM registration WHERE username = '$username'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
       echo "Username already exists!";
    } else {
        $sql = "INSERT INTO registration(fullname, username, gender, email, password, phonenumber) VALUES ('$fullname','$username','$gender','$email', '$password', '$phonenumber')";
        $result = mysqli_query($db, $sql);
        echo "<script> alert('Successfully registered); </script>";
        header("Location: signin.php");
        die();
    }
 }
?>
        <a class="back-link" href="<?php echo 'index.php'; ?>"> Back to List</a>
        <br>
        <br>
        <h2>Registration Form</h2>
        <br>
        <div class="container">
            <div class="row col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                    </div>
                    
                        <div id = "error"></div>
                        <form id="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="panel-body">
                                <br>
                            <!-- Full Name -->
                                <div>
                                <label for="fullname">Full Name</label>
                                <input type="text" id="fullname" name="fullname" required>
                                <i class = 'bx bxs-user'></i>
                                <div class="error"></div>
                                </div>
                            <!-- Username -->
                                <div>
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" required>
                                <i class = 'bx bxs-user'></i>
                                <div class="error"></div>
                                </div>

                            <!-- Gender -->
                                <div>
                                <label>Gender</label>
                                <div id="gender">
                                <input type="radio" name="gender" value="male" required> Male
                                <input type="radio" name="gender" value="female" required> Female
                                <input type="radio" name="gender" value="other" required> Other
                                </div>
                                <div class="error"></div>
                                </div>

                            <!-- Email -->
                                <div>
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                                <i class = 'bx bxs-envelope'></i>
                                <div class="error"></div>
                                </div>

                            <!-- Password -->
                                <div>
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" required>
                                <i class = 'bx bxs-lock-alt'></i>
                                <div class="error"></div>
                                </div>

                            <!-- Confirm Password -->
                                <div>
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" required>
                                <i class = 'bx bxs-lock-alt'></i>
                                <div class="error"></div>
                                </div>

                            <!-- Phone Number -->
                                <div>
                                <label for="phonenumber">Phone Number</label>
                                <input type="tel" id="phonenumber" name="phonenumber" required>
                                <i class = 'bx bxs-phone'></i>
                                <div class="error"></div>
                                </div>

                        
                            <br>
                        
                            <!-- Submit Button -->
                            <div>
                            <input type = "checkbox" id="ack"><label id ="ackLabel">I hereby declare that the above information provided is true and correct</label>
                            <div class="error">
                            </div>
                    </div>
                            <br>
                            <br>
                            <input type="Submit" class="btn-primary" id="Submit">
                            <input type="reset" value="Clear information">
                            <br>
                            <br>
                        </form>
                                <a href="signin.php">Already a member? Click to Sign In</a>
                </div>
            </div>
        </div>
        <br>
        <br>
</body>
</html>