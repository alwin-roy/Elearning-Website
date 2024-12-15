<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>

    <style>
        .changePassword {
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

<?php
// Assuming you have started the session somewhere in your code.
session_start();

// Include your database connection file.
require 'profile.php';
require '../components/dbConnection.php';

// Check if the form is submitted.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changePassword'])) {
    // Get user_id from the session.
    $user_id = $_SESSION['user_id'];

    // Get the current password associated with the user_id.
    $query = "SELECT password FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentPasswordFromDB = $row['password'];

        // Get the entered current password from the form.
        $currentPasswordEntered = mysqli_real_escape_string($conn, $_POST['password']);

        // Check if the entered current password matches the one in the database.
        if ($currentPasswordEntered == $currentPasswordFromDB) {
            // Current password is correct. Proceed with updating the password.

            // Get the new password from the form.
            $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);

            // Update the user's password in the database.
            $updateQuery = "UPDATE users SET password = '$newPassword' WHERE user_id = $user_id";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                echo "<script>alert('Password changed successfully!'); window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Error changing password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Incorrect current password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Error fetching current password. Please try again.');</script>";
    }
}
?>

<!-- Rest of your HTML goes here -->


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6" style="margin-top: 60px;">
            <h1 class="addAdmin">Change Password</h1>
            <br>
            <form method="post" action="">


                <div class="mb-3">
                    <label for="password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>


                <br>

                <button type="submit" class="btn btn-dark" name="changePassword">Change Password</button>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>