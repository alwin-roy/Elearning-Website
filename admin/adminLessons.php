<?php
session_start();
include 'adminHeader.php';
include '../components/dbConnection.php';

// Initialize session
$courseId = null;
$courseName = "";
$lessons = [];
$isValidCourse = true; // Flag to check if the course ID is valid

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $courseId = mysqli_real_escape_string($conn, $_POST['courseId']);

    // Fetch course details from the database
    $courseQuery = "SELECT course_name FROM courses WHERE course_id = $courseId";
    $courseResult = mysqli_query($conn, $courseQuery);

    if ($courseResult && mysqli_num_rows($courseResult) > 0) {
        $courseData = mysqli_fetch_assoc($courseResult);
        $courseName = $courseData['course_name'];

        // Store courseId in the session
        $_SESSION['courseId'] = $courseId;

        // Fetch lessons for the given course ID in ascending order based on lesson_no
        $lessonsQuery = "SELECT lesson_id, lesson_no, lesson_name FROM lessons WHERE course_id = $courseId ORDER BY lesson_no ASC";
        $lessonsResult = mysqli_query($conn, $lessonsQuery);

        if ($lessonsResult) {
            // Fetch lessons data
            while ($row = mysqli_fetch_assoc($lessonsResult)) {
                $lessons[] = $row;
            }
        }
    } else {
        $courseName = "Invalid Course ID";
        $isValidCourse = false; // Set the flag to false if the course ID is invalid
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Lessons</title>

    <style>
        .form-control:focus {
            border-color: #333 !important;
            box-shadow: none !important;
        }

        .form-control {
            width: 200px !important;
        }

        .box {
            position: fixed;
            bottom: 90px;
            right: 50px;
            height: 50px;
            width: 50px;
        }

        .plus-icon {
            font-size: 35px; /* Adjust the font size as needed */
            font-weight: 500;
            line-height: 35px;
        }

    </style>

    <!-- JavaScript for the confirmation popup -->
    <script>
        function confirmDelete(lessonId) {
            var result = confirm("Are you sure you want to delete this lesson?");
            if (result) {
                // Redirect to the delete page with lessonId
                window.location.href = 'adminDeleteLesson.php?lessonId=' + lessonId;
            }
        }
    </script>

</head>
<body>

<form method="post" action="adminLessons.php">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin:50px 0px 0px 300px;">
            <div class="mb-3 d-flex align-items-center">
                <h5 class="mr-3">Enter Course ID: &nbsp </h5>
                <input type="text" class="form-control" id="courseId" name="courseId" required> &nbsp
                <button type="submit" class="btn btn-dark ml-3" name="search">Search</button>
            </div>
        </div>
    </div>
</form>

<?php
if ($courseId !== null) {
    ?>
    <table class="table table-hover" style="margin: 50px 0px 0px 300px; width: 80%;">
        <thead>
        <tr>
            <th colspan="4" style="background-color: #333; color: white; font-weight: 100;"><?php echo $isValidCourse ? $courseName : 'Invalid Course'; ?></th>
        </tr>
        <tr>
            <th scope="col">Lesson No</th>
            <th scope="col">Lesson Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($lessons)) {
            foreach ($lessons as $lesson) {
                ?>
                <tr>
                    <th scope="row"><?php echo $lesson['lesson_no']; ?></th>
                    <td><?php echo $lesson['lesson_name']; ?></td>
                    <td>
                        <!-- Actions for lessons (edit and delete) -->
                        <a href="adminEditLesson.php?lessonId=<?php echo $lesson['lesson_id']; ?>" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                        <button type="button" class="btn btn-secondary" onclick="confirmDelete(<?php echo $lesson['lesson_id']; ?>)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <?php
            }
        } else {
            // Display a message if no lessons found
            ?>
            <tr>
                <td colspan="3">No lessons found for this course.</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    
    <!-- Display the "Add Lesson" button -->
    <?php if ($isValidCourse) { ?>
        <div>
            <a class="btn btn-dark box" href="adminAddLessons.php">
                <span class="plus-icon">&plus;</span> <!-- Plus sign using HTML character entity -->
            </a>
        </div>
    <?php } ?>
    
    <?php
}
?>

</body>
</html>
