<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Lesson</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Add any additional styles or scripts as needed -->
    <style>
        /* Your additional styles go here */
    </style>
</head>
<body>

    <?php
        session_start(); // Start the session

        include 'header.php';
        include '../components/dbConnection.php';

        // Check if lesson_id is set in the URL
        if (isset($_GET['lesson_id']) && isset($_GET['course_id'])) {
            $lesson_id = $_GET['lesson_id'];
            $course_id = $_GET['course_id'];

            // Fetch lesson details from the database based on lesson_id
            $lesson_query = "SELECT * FROM lessons WHERE lesson_id = $lesson_id";
            $lesson_result = mysqli_query($conn, $lesson_query);

            if ($lesson_result) {
                $lesson = mysqli_fetch_assoc($lesson_result);

                // Handle form submission
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['lesson_finished'])) {
                    $user_id = $_SESSION['user_id'];
                    $watched_date = date('Y-m-d'); // Get the current date

                    // Check if there's an existing record for the user, course, and lesson
                    $existing_record_query = "SELECT * FROM tracking WHERE user_id = $user_id AND course_id = $course_id AND lesson_id = $lesson_id";
                    $existing_record_result = mysqli_query($conn, $existing_record_query);

                    if (mysqli_num_rows($existing_record_result) == 0) {
                        // Insert new record if it doesn't exist
                        $insert_query = "INSERT INTO tracking (user_id, course_id, lesson_id, watched, watched_date) VALUES ($user_id, $course_id, $lesson_id, 1, '$watched_date')";
                        mysqli_query($conn, $insert_query);

                        // Display a popup indicating that the lesson status is finished
                        echo '<script>alert("Lesson status: Finished");
                              window.location.href = "lessonDetails.php?course_id=' . $course_id . '";
                              </script>';
                    } else {
                        // Display a popup indicating that the lesson has already been marked as finished
                        echo '<script>alert("Lesson status: Already Finished");
                              window.location.href = "lessonDetails.php?course_id=' . $course_id . '";
                              </script>';
                    }
                }
    ?>

                <!-- Display video and lesson details -->
                <video src="<?php echo $lesson['lesson_content']; ?>" controls loop style="width: 100%; height: 100%; margin-top: 75px;"></video>

                <div class="container mt-5">
                    <form method="post" action="">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                        <input type="hidden" name="lesson_id" value="<?php echo $lesson_id; ?>">
                        <h2><?php echo $lesson['lesson_no']; ?>. <?php echo $lesson['lesson_name']; ?></h2>
                        <p><?php echo $lesson['lesson_description']; ?></p>
                        <br>
                        <button type="submit" name="lesson_finished" class="btn btn-dark">Lesson Finished</button>
                    </form>
                </div>

    <?php
            } else {
                // Handle error fetching lesson details
                echo "Error fetching lesson details.";
            }
        } else {
            // Handle case where lesson_id or course_id is not set in the URL
            echo "Lesson ID or Course ID not provided.";
        }

        include 'footer.php';
    ?>

</body>
</html>
