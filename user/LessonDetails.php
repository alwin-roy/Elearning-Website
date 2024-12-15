<?php
session_start(); // Start the session

ob_start(); // Start output buffering

include 'header.php';
include '../components/dbConnection.php';

// Function to check if all lessons are watched
function areAllLessonsWatched($conn, $course_id, $user_id)
{
    $lessons_query = "SELECT lessons.*, tracking.watched
                      FROM lessons
                      LEFT JOIN tracking ON lessons.lesson_id = tracking.lesson_id
                                          AND tracking.course_id = $course_id
                                          AND tracking.user_id = $user_id
                      WHERE lessons.course_id = $course_id
                      ORDER BY lessons.lesson_no ASC";
    $lessons_result = mysqli_query($conn, $lessons_query);

    while ($lesson = mysqli_fetch_assoc($lessons_result)) {
        if (!$lesson['watched']) {
            return false;
        }
    }

    return true;
}

// Check if the course_id is set in the URL
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Fetch course details from the database
    $course_query = "SELECT * FROM courses WHERE course_id = $course_id";
    $course_result = mysqli_query($conn, $course_query);

    if ($course_result) {
        $course = mysqli_fetch_assoc($course_result);

        // Check if the user is logged in using the session
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Fetch username from the users table
            $username_query = "SELECT username FROM users WHERE user_id = $user_id";
            $username_result = mysqli_query($conn, $username_query);

            if ($username_result) {
                $user_data = mysqli_fetch_assoc($username_result);
                $username = $user_data['username'];

                // Check if the "Generate Certificate" button is clicked
                if (isset($_POST['generate_certificate'])) {
                    // Check if all lessons are watched
                    if (areAllLessonsWatched($conn, $course_id, $user_id)) {
                        // Redirect to certificate.php with course name and username
                        $certificate_url = "../certificate/certificate.php?course_name={$course['course_name']}&username=$username";
                        header("Location: $certificate_url");
                        exit();
                    } else {
                        echo "<script>alert('You must complete all lessons to generate a certificate.');</script>";
                    }
                }

                // Fetch lessons for the course with tracking information
                $lessons_query = "SELECT lessons.*, tracking.watched
                                  FROM lessons
                                  LEFT JOIN tracking ON lessons.lesson_id = tracking.lesson_id
                                                      AND tracking.course_id = $course_id
                                                      AND tracking.user_id = $user_id
                                  WHERE lessons.course_id = $course_id
                                  ORDER BY lessons.lesson_no ASC";
                $lessons_result = mysqli_query($conn, $lessons_query);

                // Check if there are any lessons for the course
                $has_lessons = mysqli_num_rows($lessons_result) > 0;

                // HTML code starts here
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Course Details</title>
                    <link rel="stylesheet" href="../css/bootstrap.min.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

                    <style>
                        .play-icon {
                            color: #000;
                        }
                    </style>
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
                            </div>
                        </div>
                    </div>

                    <br>

                    <?php if ($has_lessons): ?>
                        <table class="table table-hover">
                            <tr>
                                <th colspan="4" style="background-color: #333; color: white; font-weight: 100;">Lessons List</th>
                            </tr>
                            <tr>
                                <th scope="col">Lesson no</th>
                                <th scope="col">Lesson Name</th>
                                <th scope="col">Action</th>
                                <th scope="col">Status</th>
                            </tr>
                            <tbody>
                            <?php
                            while ($lesson = mysqli_fetch_assoc($lessons_result)) {
                                echo "<tr>";
                                echo "<td>" . $lesson['lesson_no'] . "</td>";
                                echo "<td>" . $lesson['lesson_name'] . "</td>";
                                echo "<td><a href='viewLesson.php?lesson_id={$lesson['lesson_id']}&course_id={$course_id}' class='play-icon'><i class='fas fa-play'></i></a></td>";
                                echo "<td>" . ($lesson['watched'] ? 'Completed' : '-') . "</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>

                        <form method="post">
                            <button type="submit" name="generate_certificate" class="btn btn-dark">Generate Certificate</button>
                        </form>
                    <?php else: ?>
                        <h4>Lessons are coming soon. Stay tuned!</h4>
                        <style>
                            th[scope="col"] {
                                display: none;
                            }
                            .btn-dark {
                                display: none;
                            }
                        </style>
                    <?php endif; ?>

                </div>

                </body>
                </html>

                <?php
            } else {
                // Handle case where username is not fetched
                echo "Error fetching username.";
            }
        } else {
            // Handle case where the user is not logged in
            echo "User not logged in.";
        }
    } else {
        // Handle error fetching course details
        echo "Error fetching course details.";
    }
} else {
    // Handle case where course_id is not set in the URL
    echo "Course ID not provided.";
}

include 'footer.php';

ob_end_flush(); // Flush the output buffer
?>
