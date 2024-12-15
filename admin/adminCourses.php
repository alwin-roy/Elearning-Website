<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Courses</title>


    <style>
      .box {
              position: fixed;
              bottom: 90px;
              right: 50px;
              height: 50px;
              width: 50px;
              border-radius: 50%; /* Make it circular */
          }

          .plus-icon {
            font-size: 35px; /* Adjust the font size as needed */
            font-weight: 500;
            line-height: 35px;
        }


    </style>
</head>
<body>


<?php
include 'adminHeader.php';

// Include the database connection file
include '../components/dbConnection.php';

// Fetch course details from the database
$query = "SELECT course_id, course_name FROM courses";
$result = mysqli_query($conn, $query);

?>

<table class="table table-hover" style="margin: 50px 0px 0px 300px; width: 80%;">
    <tbody>
    <!-- Row for Courses Enrolled with styling -->
    <tr>
        <th colspan="4" style="background-color: #333; color: white; font-weight: 100;">Courses List</th>
    </tr>

    <!-- Existing rows -->
    <tr>
        <th scope="col">Course ID</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
    </tr>

    <!-- Data rows -->
    <?php
    // Loop through the result set and display course details
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<th scope='row'>" . $row['course_id'] . "</th>";
        echo "<td>" . $row['course_name'] . "</td>";
        echo "<td>
                <a href='adminEditCourse.php?id=" . $row['course_id'] . "' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <button type='button' class='btn btn-secondary' onclick='deleteCourse(" . $row['course_id'] . ")'><i class='fas fa-trash-alt'></i></button>
            </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<script>
    // JavaScript function to confirm course deletion
    function deleteCourse(courseId) {
        if (confirm("Are you sure you want to delete this course?")) {
            // Redirect to delete_course.php with the course ID as a parameter
            window.location.href = "adminDeleteCourse.php?id=" + courseId;
        }
    }
</script>

<div>
    <a class="btn btn-dark box" href="adminAddCourses.php">
      <span class="plus-icon">&plus;</span> <!-- Plus sign using HTML character entity -->
    </a>
</div>


</body>
</html>