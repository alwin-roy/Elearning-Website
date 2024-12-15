<?php
ob_start();
include 'adminHeader.php';
include '../components/dbConnection.php';

// Fetch student details from the database
$studentsQuery = "SELECT user_id, username, email FROM users WHERE role = 'user'";
$studentsResult = mysqli_query($conn, $studentsQuery);

// Check for the delete action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteStudent"])) {
    $deleteUserId = mysqli_real_escape_string($conn, $_POST['deleteStudent']);
    
    // Check if the user ID is valid before executing the DELETE query
    if (!empty($deleteUserId)) {
        // You can redirect to a confirmation page or use JavaScript to show a confirmation dialog
        echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this student?');
            if (confirmDelete) {
                window.location.href = 'adminStudents.php?confirmDelete=$deleteUserId';
            }
        </script>";
    } else {
        echo '<script>alert("Invalid user ID.");</script>';
    }
}

// Check for confirmed delete action
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["confirmDelete"])) {
    $confirmedDeleteUserId = mysqli_real_escape_string($conn, $_GET['confirmDelete']);
    
    // Delete student from the database
    $deleteQuery = "DELETE FROM users WHERE user_id = $confirmedDeleteUserId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Redirect after deletion
        header("Location: adminStudents.php");
        exit();
    } else {
        echo '<script>alert("Error deleting student. ' . mysqli_error($conn) . '");</script>';
    }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>students</title>
</head>
<body>

    <?php
    include 'adminHeader.php';
    ?>  
    
    <table class="table table-hover" style="margin: 50px 0px 0px 300px; width: 80%;">
        <tbody>
            <!-- Row for Students List with styling -->
            <tr>
                <th colspan="4" style="background-color: #333; color: white; font-weight: 100;">Students List</th>
            </tr>

            <!-- Existing rows -->
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Email Address</th>
                <th scope="col">Action</th>
            </tr>

            <!-- Data rows -->
            <?php
            while ($student = mysqli_fetch_assoc($studentsResult)) {
            ?>
            <form method="post" action="">
                <tr>
                    <td><?php echo $student['user_id']; ?></td>
                    <td><?php echo $student['username']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td>
                        <!-- Trash (delete) button -->
                        <button type="submit" class="btn btn-secondary" name="deleteStudent" value="<?php echo $student['user_id']; ?>">
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

</body>
</html>
