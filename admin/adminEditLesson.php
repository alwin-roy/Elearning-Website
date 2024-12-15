<?php
session_start();
include 'adminHeader.php';
include '../components/dbConnection.php';

// Initialize variables
$lesson = null;

// Check if lesson ID is provided in the URL
if (isset($_GET['lessonId'])) {
    $lessonId = mysqli_real_escape_string($conn, $_GET['lessonId']);
    $courseId = isset($_SESSION['courseId']) ? $_SESSION['courseId'] : null;

    // Check if both lessonId and courseId are valid before proceeding with the query
    if ($courseId !== null && $lessonId !== '') {
        $query = "SELECT * FROM lessons WHERE lesson_id = $lessonId AND course_id = $courseId";
        $result = mysqli_query($conn, $query);

        // Check if lesson is found
        if ($result && $lesson = mysqli_fetch_assoc($result)) {
            // Continue with displaying the form
        } else {
            // Handle the case where no lesson is found
            // You may redirect the user or display an error message
            echo '<script>alert("Lesson not found.");';
            echo 'window.location.href = "adminLessons.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Invalid lesson ID or course ID.");';
        echo 'window.location.href = "adminLessons.php";</script>';
        exit();
    }
} else {
    // Handle the case where no lesson ID is provided
    // You may redirect the user or display an error message
    echo '<script>alert("Lesson ID not provided.");';
    echo 'window.location.href = "adminLessons.php";</script>';
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lessonSubmit"])) {
    // Retrieve form data
    $newLessonNo = mysqli_real_escape_string($conn, $_POST['newLessonNo']);
    $lessonName = mysqli_real_escape_string($conn, $_POST['lessonName']);
    $lessonDescription = mysqli_real_escape_string($conn, $_POST['lessonDescription']);

    // Check if a new video file is provided
    if ($_FILES['lessonContent']['name']) {
        $lessonContent = $_FILES['lessonContent']['name'];
        $targetDir = "../videos"; // Change the directory path as needed
        $targetFilePath = $targetDir . '/' . $lessonContent;
        move_uploaded_file($_FILES['lessonContent']['tmp_name'], $targetFilePath);

        // Update lesson details with the new video file path and new lesson number
        $updateQuery = "UPDATE lessons SET lesson_no = $newLessonNo, lesson_name = '$lessonName', lesson_description = '$lessonDescription', lesson_content = '$targetFilePath' WHERE lesson_id = $lessonId AND course_id = $courseId";
    } else {
        // Update lesson details without changing the video file and with the new lesson number
        $updateQuery = "UPDATE lessons SET lesson_no = $newLessonNo, lesson_name = '$lessonName', lesson_description = '$lessonDescription' WHERE lesson_id = $lessonId AND course_id = $courseId";
    }

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Display the alert and then redirect
        echo '<script>alert("Lesson updated successfully!");';
        echo 'window.location.href = "adminLessons.php";</script>';
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo '<script>alert("Error updating lesson. ' . mysqli_error($conn) . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lesson</title>

    <style>
        .addLesson {
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="addLesson">Edit Lesson</h1>
            <br>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="lessonId" value="<?php echo $lesson['lesson_id']; ?>">

                <div class="mb-3">
                    <label for="newLessonNo" class="form-label">Lesson No</label>
                    <input type="text" class="form-control" id="newLessonNo" name="newLessonNo" value="<?php echo $lesson['lesson_no']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="lessonName" class="form-label">Lesson Name</label>
                    <input type="text" class="form-control" id="lessonName" name="lessonName" value="<?php echo $lesson['lesson_name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="lessonDescription" class="form-label">Lesson Description</label>
                    <textarea class="form-control" id="lessonDescription" name="lessonDescription" required><?php echo $lesson['lesson_description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="lessonContent" class="form-label">Lesson Content (Video)</label>
                    <input type="file" class="form-control" id="lessonContent" name="lessonContent">
                </div>

                <br>

                <button type="submit" class="btn btn-dark" name="lessonSubmit">Update Lesson</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
