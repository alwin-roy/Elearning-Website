<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses</title>

    <style>

        .addCourse{
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
    ?>

        
    <?php

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["courseSubmit"])) {

        include '../components/dbConnection.php';


        // Sanitize and validate user input
        $courseName = mysqli_real_escape_string($conn, $_POST['courseName']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $duration = mysqli_real_escape_string($conn, $_POST['duration']);

        // Upload course image
        $courseImage = $_FILES['courseImage']['name'];
        $targetDir = "../images"; // Specify the directory where you want to store uploaded images
        $targetFilePath = $targetDir . '/' . $courseImage;
        move_uploaded_file($_FILES['courseImage']['tmp_name'], $targetFilePath);


        // Insert data into the database
        $insertQuery = "INSERT INTO courses (course_name, course_description, course_duration, course_image) 
                        VALUES ('$courseName', '$description', '$duration', '$targetFilePath')";

        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            echo '<script>alert("Course added successfully!");';
            echo 'window.location.href = "adminCourses.php";</script>';
            ob_end_flush();
        } else {
            echo '<script>alert("Error adding course. ' . mysqli_error($conn) . '");</script>';
        }
        

        // Close the database connection
        mysqli_close($conn);
    }





    ?>    



    


<div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-6">
            <h1 class="addCourse">Add New Course</h1>
            <br>
                <form method="post" action="adminAddCourses.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="courseName" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="courseName" name="courseName" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" required>
                    </div>

                    <div class="mb-3">
                        <label for="courseImage" class="form-label">Course Image</label>
                        <input type="file" class="form-control" id="courseImage" name="courseImage" required>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-dark" name="courseSubmit">Add Course</button>
                </form>
            </div>
        </div>
    </div>



</body>
</html>