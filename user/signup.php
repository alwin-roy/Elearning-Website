<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Display alert and use JavaScript for redirection
    echo "<script>alert('User is already logged in.'); window.location.href = 'index.php';</script>";
    exit();
}

include '../components/dbConnection.php';

if(isset($_POST['submit'])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $role = "user";

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // Display alert and use JavaScript for redirection
        echo "<script>alert('Email already exists. Please choose a different email.'); window.location.href = 'signup.php';</script>";
        exit();
    }

    // If email doesn't exist, proceed with user registration
    $sql = "INSERT INTO `users` (`username`, `password`, `email`, `role`) VALUES ('$name', '$password', '$email', '$role')";

    $result = mysqli_query($conn, $sql) or die ("query failed");

    if ($result) {
        // Redirect to a specific page upon successful signup
        header("Location: login.php");
        exit(); // Ensure that no further code is executed after the header is sent
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Signup</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                       
                <!-------------      image     ------------->
                
                <img src="../images/signupimg.jpg" alt="">
                <div class="text">
                    <p> “I think it's possible for ordinary people to choose to be extraordinary.” —Elon Musk</p>
                </div>
                
            </div>

            <div class="col-md-6 right">

            <form method="post" action="signup.php">
                
                <div class="input-box">
                   <header>Create account</header>
                   <div class="input-field">
                        <input type="text" class="input" id="name" name="name" required="" autocomplete="off">
                        <label for="email">Name</label>
                   </div>
                   <div class="input-field">
                        <input type="email" class="input" id="email" name="email" required="" autocomplete="off">
                        <label for="email">Email</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password" class="input" id="password" name="password" required="">
                        <label for="pass">Password</label>
                    </div> 
                   <div class="input-field">
                        
                        <input type="submit" class="submit" name="submit" value="Sign Up">
                   </div> 
                   <div class="signin">
                    <span>Already have an account? <a href="login.php">Log in here</a></span>
                   </div>
                </div>
            </form>  
            </div>
        </div>
    </div>
</div>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>