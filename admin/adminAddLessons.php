<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lessons</title>

    <style>
        .addCourse {
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
ob_start();
require 'adminHeader.php';

// Ensure session is started
session_start();

// Get courseId from the session
$courseId = isset($_SESSION['courseId']) ? $_SESSION['courseId'] : null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lessonSubmit"])) {
    include '../components/dbConnection.php';

    // Sanitize and validate user input
    $lessonNo = mysqli_real_escape_string($conn, $_POST['lessonNo']);
    $lessonTitle = mysqli_real_escape_string($conn, $_POST['lessonTitle']);
    $lessonDescription = mysqli_real_escape_string($conn, $_POST['lessonDescription']);

    // Handle file upload
    $uploadDir = "../videos/"; // Specify the directory where you want to store uploaded videos
    $lessonContent = $uploadDir . basename($_FILES['lessonContent']['name']);
    move_uploaded_file($_FILES['lessonContent']['tmp_name'], $lessonContent);

    // Insert data into the database
    $insertQuery = "INSERT INTO lessons (lesson_no, lesson_content, lesson_name, lesson_description, course_id) 
                    VALUES ('$lessonNo', '$lessonContent', '$lessonTitle', '$lessonDescription', '$courseId')";

    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo '<script>alert("Lesson added successfully!");';
        echo 'window.location.href = "adminLessons.php";</script>';
        ob_end_flush();
    } else {
        echo '<script>alert("Error adding lesson. ' . mysqli_error($conn) . '");</script>';
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="addLesson">Add New Lesson</h1>
            <br>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="lessonNo" class="form-label">Lesson No</label>
                    <input type="text" class="form-control" id="lessonNo" name="lessonNo" required>
                </div>

                <div class="mb-3">
                    <label for="lessonTitle" class="form-label">Lesson Title</label>
                    <input type="text" class="form-control" id="lessonTitle" name="lessonTitle" required>
                </div>

                <div class="mb-3">
                    <label for="lessonDescription" class="form-label">Lesson Description</label>
                    <textarea class="form-control" id="lessonDescription" name="lessonDescription" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="lessonContent" class="form-label">Lesson Content (Video File)</label>
                    <input type="file" class="form-control" id="lessonContent" name="lessonContent" required>
                </div>

                <br>

                <button type="submit" class="btn btn-dark" name="lessonSubmit">Add Lesson</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
