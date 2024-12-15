<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Display alert and use JavaScript for redirection
    echo "<script>alert('User is already logged in.'); window.location.href = '../user/index.php';</script>";
    exit();
}


include '../components/dbConnection.php'; // Make sure to include your database connection file

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize input
    $email = trim($email);
    $password = trim($password);

    // Check if the user exists in the database and has the role 'user'
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND role = 'admin'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // User exists, set session or perform further actions
            $_SESSION['user_id'] = $row['user_id']; // You may want to store other user details in the session
            
            // Redirect to a dashboard or home page
            header("Location: adminDashboard.php");
            exit();
        } else {
            echo "<script>alert('Invalid email or password. Please try again.');</script>";
        }
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
    <title>Login</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                       
                <!-------------      image     ------------->
                
                <img src="../images/key2.png" alt="">
                
            </div>

            <div class="col-md-6 right">

            <form method="post" action="">
                
                <div class="input-box">
                   
                   <header><h1><b>Admin Login</b></h1></header>
                   <div class="input-field">
                        <input type="text" class="input" id="email" name="email" required="" autocomplete="off">
                        <label for="email">Email</label> 
                    </div> 
                   <div class="input-field">
                        <input type="password" class="input" id="pass" name="password" required="">
                        <label for="pass">Password</label>
                    </div> 
                   <div class="input-field">
                        
                        <input type="submit" class="submit" name="submit" value="Login">
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