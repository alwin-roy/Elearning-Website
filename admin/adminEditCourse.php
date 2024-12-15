<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Courses</title>

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
    // Include the database connection file
    include 'adminHeader.php';
    include '../components/dbConnection.php';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["courseSubmit"])) {
        // Retrieve form data
        $courseId = mysqli_real_escape_string($conn, $_POST['courseId']);
        $courseName = mysqli_real_escape_string($conn, $_POST['courseName']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $duration = mysqli_real_escape_string($conn, $_POST['duration']);

        // Check if a new image is provided
        if ($_FILES['courseImage']['name']) {
            $courseImage = $_FILES['courseImage']['name'];
            $targetDir = "../images";
            $targetFilePath = $targetDir . '/' . $courseImage;
            move_uploaded_file($_FILES['courseImage']['tmp_name'], $targetFilePath);

            // Update course details with the new image
            $updateQuery = "UPDATE courses SET course_name = '$courseName', course_description = '$description', course_duration = '$duration', course_image = '$targetFilePath' WHERE course_id = $courseId";
        } else {
            // Update course details without changing the image
            $updateQuery = "UPDATE courses SET course_name = '$courseName', course_description = '$description', course_duration = '$duration' WHERE course_id = $courseId";
        }

        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            // Display the alert and then redirect
            echo '<script>alert("Course updated successfully!");';
            echo 'window.location.href = "adminCourses.php";</script>';
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo '<script>alert("Error updating course. ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Fetch course details from the database based on the provided course ID
    if (isset($_GET['id'])) {
        $courseId = mysqli_real_escape_string($conn, $_GET['id']);
        $query = "SELECT * FROM courses WHERE course_id = $courseId";
        $result = mysqli_query($conn, $query);
        $course = mysqli_fetch_assoc($result);
    } else {
        // Handle the case where no course ID is provided
        // You may redirect the user or display an error message
        // ...
    }
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="addCourse">Edit Course</h1>
            <br>
            <form method="post" action="adminEditCourse.php" enctype="multipart/form-data">
                <input type="hidden" name="courseId" value="<?php echo $course['course_id']; ?>">
                <div class="mb-3">
                    <label for="courseName" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="courseName" name="courseName" value="<?php echo $course['course_name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required><?php echo $course['course_description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $course['course_duration']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="courseImage" class="form-label">Course Image</label>
                    <input type="file" class="form-control" id="courseImage" name="courseImage">
                </div>

                <br>

                <button type="submit" class="btn btn-dark" name="courseSubmit">Update Course</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
