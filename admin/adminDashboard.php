<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    
<style>

.row {
            width: auto;
            margin-left: 400px;
            box-shadow: none;
        }

        .card {
        min-height: 250px; /* Adjust the value as needed */
    }



</style>


<?php
include 'adminHeader.php';
include '../components/dbConnection.php';

// Function to get count from the database
function getCount($table, $field, $condition = null) {
    global $conn;
    $sql = "SELECT COUNT($field) as count FROM $table";
    if ($condition) {
        $sql .= " WHERE $condition";
    }
    $result = $conn->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        return $row['count'];
    }
    return 0;
}

// Get counts for cards
$studentsCount = getCount('users', 'user_id', 'role = "user"');
$coursesCount = getCount('courses', 'course_id');
$enrolledCount = getCount('enrollment', 'enroll_id');

?>



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="margin-left: 300px;">
    <div class="row mx-2">
        <!-- Students Card -->
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">
                    Students
                </div>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h4 class="card-title"><?php echo $studentsCount; ?></h4>
                    <a class="btn text-white" href="adminStudents.php">View</a>
                </div>
            </div>
        </div>

        <!-- Courses Card -->
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">
                    Courses
                </div>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h4 class="card-title"><?php echo $coursesCount; ?></h4>
                    <a class="btn text-white" href="adminCourses.php">View</a>
                </div>
            </div>
        </div>

        <!-- Enrolled Card -->
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">
                    Enrolled
                </div>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h4 class="card-title"><?php echo $enrolledCount; ?></h4>
                    <a class="btn text-white" href="adminEnroll.php">View</a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Updated code with styling for the "Courses Enrolled" row -->
<table class="table table-hover" style="margin: 60px 0px 0px 340px; width: 75%;">
  <tbody>
    <!-- Row for Courses Enrolled with styling -->
    <tr>
      <th colspan="4" style="background-color: #333; color: white; font-weight: 100;">Recent Enrollments</th>
    </tr>

    <!-- Existing rows -->
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Id</th>
      <th scope="col">Course Id</th>
      <th scope="col">Date</th>
    </tr>

    <!-- Dynamic Data rows (Latest 10) -->
    <?php
    $sql = "SELECT * FROM enrollment ORDER BY date DESC LIMIT 10";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $rowNumber = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<th scope='row'>" . $rowNumber . "</th>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['course_id'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "</tr>";
            $rowNumber++;
        }
    } else {
        echo "<tr><td colspan='4'>No data available</td></tr>";
    }
    ?>
  </tbody>
</table>


</body>
</html>

