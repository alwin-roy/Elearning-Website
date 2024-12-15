<?php
// Include the database connection file
include '../components/dbConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Sanitize the course ID
    $courseId = mysqli_real_escape_string($conn, $_GET["id"]);

    // Perform the deletion query
    $deleteQuery = "DELETE FROM courses WHERE course_id = '$courseId'";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        echo '<script>alert("Course deleted successfully!");</script>';
    } else {
        echo '<script>alert("Error deleting course. ' . mysqli_error($conn) . '");</script>';
    }

    // Redirect back to the adminCourses.php page
    header("Location: adminCourses.php");
} else {
    // Redirect to the adminCourses.php page if accessed without a valid course ID
    header("Location: adminCourses.php");
}

// Close the database connection
mysqli_close($conn);
?>
