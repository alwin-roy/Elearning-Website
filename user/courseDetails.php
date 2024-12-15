<?php
session_start(); // Start the session

include 'header.php';
include '../components/dbConnection.php';

// Check if the course_id is set in the URL
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Fetch course details from the database
    $course_query = "SELECT * FROM courses WHERE course_id = $course_id";
    $course_result = mysqli_query($conn, $course_query);

    if ($course_result) {
        $course = mysqli_fetch_assoc($course_result);

        // Fetch lessons for the course
        $lessons_query = "SELECT * FROM lessons WHERE course_id = $course_id ORDER BY lesson_no ASC";
        $lessons_result = mysqli_query($conn, $lessons_query);

        // Check if the enrollment form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enroll'])) {
            // Check if the user is logged in using the session
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];

                // Check if the user is already enrolled in the course
                $enrollment_check_query = "SELECT * FROM enrollment WHERE user_id = $user_id AND course_id = $course_id";
                $enrollment_check_result = mysqli_query($conn, $enrollment_check_query);

                if (mysqli_num_rows($enrollment_check_result) > 0) {
                    // User is already enrolled, show a popup message
                    echo '<script>alert("You are already enrolled in this course.");</script>';
                } else {
                    // User is not enrolled, proceed with enrollment
                    $enrollment_date = date('Y-m-d'); // Get the current date
                    $enrollment_query = "INSERT INTO enrollment (user_id, course_id, date) VALUES ($user_id, $course_id, '$enrollment_date')";
                    $enrollment_result = mysqli_query($conn, $enrollment_query);

                    if ($enrollment_result) {
                        echo '<script>alert("Course enrollment successful.");
                        window.location.href = "myCourses.php";
                        </script>';
                    } else {
                        echo '<script>alert("Enrollment failed. Please try again later.");</script>';
                    }
                }
            } else {
                // User is not logged in, show a popup or redirect to the login page
                echo '<script>alert("You need to log in to enroll in the course.");</script>';
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5" style="margin-top: 95px !important;">
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo $course['course_image']; ?>" alt="..." class="img-thumbnail">
        </div>
        <div class="col-md-8">
            <div class="card-body" style="height: 100%;">
                <h1 class="card-title">Course Name: <?php echo $course['course_name']; ?></h1>
                <p class="card-text"><b style="font-size: larger;">Description: </b><?php echo $course['course_description']; ?></p>
                <p class="card-text"><b style="font-size: larger;">Duration: </b><?php echo $course['course_duration']; ?></p>
                <form action="" method="post">
                    <p class="card-text d-inline"><b style="font-size: larger;">Price: </b><small><del>&#8377 free </del></small></p>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-dark text-white font-weight-bolder float-right" name="enroll">Enroll</button>
                </form>
            </div>
        </div>
    </div>

    <br>

    <table class="table table-hover">
        <tr>
            <th colspan="4" style="background-color: #333; color: white; font-weight: 100;">Lessons List</th>
        </tr>
        <tr>
            <th scope="col">Lesson no</th>
            <th scope="col">Lesson Name</th>
        </tr>
        <tbody>
            <?php
            while ($lesson = mysqli_fetch_assoc($lessons_result)) {
                echo "<tr>";
                echo "<td>" . $lesson['lesson_no'] . "</td>";
                echo "<td>" . $lesson['lesson_name'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
    } else {
        // Handle error fetching course details
        echo "Error fetching course details.";
    }
} else {
    // Handle case where course_id is not set in the URL
    echo "Course ID not provided.";
}

include 'footer.php';
?>
