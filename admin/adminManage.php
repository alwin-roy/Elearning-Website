<?php
ob_start();
include 'adminHeader.php';
include '../components/dbConnection.php';

// Fetch admin details from the database
$adminsQuery = "SELECT user_id, username, email FROM users WHERE role = 'admin'";
$adminsResult = mysqli_query($conn, $adminsQuery);

// Check for the delete action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteAdmin"])) {
    $deleteAdminId = mysqli_real_escape_string($conn, $_POST['deleteAdmin']);
    
    // Check if the admin ID is valid before executing the DELETE query
    if (!empty($deleteAdminId)) {
        // You can redirect to a confirmation page or use JavaScript to show a confirmation dialog
        echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this admin?');
            if (confirmDelete) {
                window.location.href = 'adminManage.php?confirmDelete=$deleteAdminId';
            }
        </script>";
    } else {
        echo '<script>alert("Invalid admin ID.");</script>';
    }
}

// Check for confirmed delete action
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["confirmDelete"])) {
    $confirmedDeleteAdminId = mysqli_real_escape_string($conn, $_GET['confirmDelete']);
    
    // Delete admin from the database
    $deleteAdminQuery = "DELETE FROM users WHERE user_id = $confirmedDeleteAdminId";
    $deleteAdminResult = mysqli_query($conn, $deleteAdminQuery);

    if ($deleteAdminResult) {
        // Redirect after deletion
        header("Location: adminManage.php");
        exit();
    } else {
        echo '<script>alert("Error deleting admin. ' . mysqli_error($conn) . '");</script>';
    }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>admin Manage</title>
    <style>

        .box {
            position: fixed;
            bottom: 90px;
            right: 50px;
            height: 50px;
            width: 50px;
            border-radius: 50%; /* Make it circular */
        }

        .plus-icon {
            font-size: 35px; /* Adjust the font size as needed */
            font-weight: 500;
            line-height: 35px;
        }

    </style>
</head>
<body>

    <?php
    include 'adminHeader.php';
    ?>  
    
    <table class="table table-hover" style="margin: 50px 0px 0px 300px; width: 80%;">
        <tbody>
            <!-- Row for Admins List with styling -->
            <tr>
                <th colspan="4" style="background-color: #333; color: white; font-weight: 100;">Admins List</th>
            </tr>

            <!-- Existing rows -->
            <tr>
                <th scope="col">Admin ID</th>
                <th scope="col">Admin Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Action</th>
            </tr>

            <!-- Data rows -->
            <?php
            while ($admin = mysqli_fetch_assoc($adminsResult)) {
            ?>
            <form method="post" action="">
                <tr>
                    <td><?php echo $admin['user_id']; ?></td>
                    <td><?php echo $admin['username']; ?></td>
                    <td><?php echo $admin['email']; ?></td>
                    <td>
                        <!-- Trash (delete) button -->
                        <button type="submit" class="btn btn-secondary" name="deleteAdmin" value="<?php echo $admin['user_id']; ?>">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            </form>
            <?php
            }
            ?>

        </tbody>
    </table>

    <div>
        <a class="btn btn-dark box" href="adminAddAdmin.php">
            <span class="plus-icon">&plus;</span> <!-- Plus sign using HTML character entity -->
        </a>
    </div>

</body>
</html>