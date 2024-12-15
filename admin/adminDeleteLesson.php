<?php
ob_start();

include 'adminHeader.php';
include '../components/dbConnection.php';

// Check if lessonId is provided in the query parameters
if (isset($_GET['lessonId'])) {
    $lessonId = mysqli_real_escape_string($conn, $_GET['lessonId']);


    // Delete the lesson from the database
    $deleteQuery = "DELETE FROM lessons WHERE lesson_id = $lessonId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Deletion successful, redirect back to the lessons for the same course
        header("Location: adminLessons.php");
        exit();
    } else {
        // Deletion failed, you can redirect or display an error message
        echo "Error deleting lesson: " . mysqli_error($conn);
    }
} else {
    // lessonId is not provided in the query parameters, handle accordingly
    echo "Lesson ID not provided.";
}

ob_end_flush();
?>


