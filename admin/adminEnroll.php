<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Enroll</title>

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
    </style>

</head>

<body>

    <?php
    include 'adminHeader.php';
    ?>

    <form method="post" action="">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin: 50px 0px 0px 300px;">
                <div class="mb-3 d-flex align-items-center">
                    <h5 class="mr-3">Enter Student ID: &nbsp;</h5>
                    <input type="text" class="form-control" id="studentId" name="studentId" required> &nbsp;
                    <button type="submit" class="btn btn-dark ml-3" name="search">Search</button>
                </div>
            </div>
        </div>
    </form>

 <?php
if (isset($_POST['search'])) {
    include '../components/dbConnection.php';

    $studentId = $_POST['studentId'];

    // Fetch enrollments and progress for the specified student from the database
    $query = "SELECT enrollment.course_id, enrollment.user_id, enrollment.date, 
                     courses.course_name, 
                     (SELECT COUNT(lesson_id) FROM lessons WHERE course_id = enrollment.course_id) AS total_lessons,
                     SUM(tracking.watched) AS watched_lessons
              FROM enrollment
              JOIN courses ON enrollment.course_id = courses.course_id
              LEFT JOIN tracking ON enrollment.user_id = tracking.user_id 
                                   AND enrollment.course_id = tracking.course_id
              WHERE enrollment.user_id = $studentId
              GROUP BY enrollment.course_id, enrollment.user_id, enrollment.date, courses.course_name";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table class="table table-hover" style="margin: 50px 0px 0px 300px; width: 80%;">
                <thead>
                <tr>
                    <th colspan="4" style="background-color: #333; color: white; font-weight: 100;">Courses Enrolled by Student ID: <?php echo $studentId; ?></th>
                </tr>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Enrolled Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $total_lessons = $row['total_lessons'];
                    $watched_lessons = $row['watched_lessons'];
                    $progress = ($total_lessons > 0) ? ($watched_lessons / $total_lessons) * 100 : 0;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['course_id']; ?></th>
                        <td><?php echo $row['course_name']; ?></td>
                        <td><?php echo number_format($progress, 2) . '%'; ?></td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        } else {
            echo '<p style="text-align: center; background-color: #333; color: white; font-weight: 100;">No enrollments found for the specified student ID.</p>';
        }
    } else {
        // Display a message if there is an error in the query
        echo 'Error: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

</body>

</html>
