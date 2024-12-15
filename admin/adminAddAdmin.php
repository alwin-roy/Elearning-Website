<?php
ob_start(); // Turn on output buffering

include 'adminHeader.php';
include '../components/dbConnection.php';

if (isset($_POST['adminSubmit'])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = "admin";

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // Display a JavaScript alert on email already exists
        echo '<script>';
        echo 'alert("Email already exists. Please choose a different email.");';
        echo 'window.location.href = "adminManage.php";'; // Redirect to a specific page upon failure
        echo '</script>';
        exit();
    }

    // If email doesn't exist, proceed with admin registration
    $sql = "INSERT INTO `users` (`username`, `password`, `email`, `role`) VALUES ('$name', '$password', '$email', '$role')";
    $result = mysqli_query($conn, $sql) or die("query failed");

    if ($result) {
        // Display a JavaScript alert on successful admin addition
        echo '<script>';
        echo 'alert("Admin added successfully!");';
        echo 'window.location.href = "adminManage.php";'; // Redirect to a specific page upon successful signup
        echo '</script>';
        exit(); // Ensure that no further code is executed after the header is sent
    } else {
        // Display a JavaScript alert on admin addition failure
        echo '<script>alert("Failed to add admin. ' . mysqli_error($conn) . '");</script>';
    }

}

ob_end_flush(); // Flush the buffer and turn off output buffering
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>

    <style>
        .addAdmin {
            font-weight: 500;
            margin-left: 135px;
        }

        .form-control:focus {
            border-color: #333 !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body>

<?php include 'adminHeader.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="addAdmin">Add New Admin</h1>
            <br>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="eName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="Name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <br>

                <button type="submit" class="btn btn-dark" name="adminSubmit">Add Admin</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
