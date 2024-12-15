<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>

    <style>
        .updateStudent {
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

    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please login to access the profile page.'); window.location.href = 'index.php';</script>";
        exit();
    }

    // Check if the user is logged in and has a user_id in the session.
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Fetch user details from the database.
        $query = "SELECT username, email FROM users WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful.
        if ($result) {
            $userDetails = mysqli_fetch_assoc($result);
        }
    }

    // Check if the form is submitted.
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['UpdateStudent'])) {
        // Get updated values from the form.
        $newUsername = mysqli_real_escape_string($conn, $_POST['studentName']);
        $newEmail = mysqli_real_escape_string($conn, $_POST['email']);

        // Update the user profile in the database.
        $updateQuery = "UPDATE users SET username = '$newUsername', email = '$newEmail' WHERE user_id = $user_id";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo "<script>alert('Profile updated successfully!'); window.location.href = 'index.php';</script>";
            exit(); // Ensure that the script stops execution after the redirect.
        } else {
            echo "<script>alert('Error updating profile. Please try again.');</script>";
        }
    }
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6" style="margin-top: 60px;">
            <h1 class="updateStudent">Student Details</h1>
            <br>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="studentid" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="studentid" name="studentid" value="<?php echo $user_id; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="studentName" class="form-label">Username</label>
                    <input type="text" class="form-control" id="studentName" name="studentName" value="<?php echo isset($userDetails['username']) ? $userDetails['username'] : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($userDetails['email']) ? $userDetails['email'] : ''; ?>" required>
                </div>

                <button type="submit" class="btn btn-dark" name="UpdateStudent">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
