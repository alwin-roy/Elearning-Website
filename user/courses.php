<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>

    <style>
        .mainTitles{
            color: #333;
            text-align: center;
            height: 65px;
            padding-top: 10px;
            margin-top: 60px;
            font-weight: bold;
        }

        /* read more <a>*/
        a {
            color: #000 !important;
            background-color: transparent;
            text-decoration: none !important;
            font-weight: bold;
        }

        a:hover {
            color: #333 ;
            background-color: transparent;
            text-decoration: none;
        }

    </style>


  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/card.css">

</head>
<body>

<?php
include 'header.php';

?>
    
<div class="container my-5" style="margin-top: 5rem!important;">
    <h2 class="mainTitles">All Courses</h2>

    

        <!-- popualar Courses  -->

      <?php
        include '../components/dbConnection.php';

      $query = "SELECT course_id, course_name, course_description, course_image FROM courses";
      $result = mysqli_query($conn, $query);

      ?>

<div class="courses" style="padding: 2% 0 0;">
    <div class="container">
        <div class="row">

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $course_id = $row['course_id'];
                $course_name = $row['course_name'];
                $course_description = $row['course_description'];
                $course_image = $row['course_image'];
            ?>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card d-flex flex-column">
                    <img src="<?php echo $course_image; ?>" class="card-img-top" alt="<?php echo $course_name; ?>" style="max-height: 225px; object-fit: cover;">
                    <div class="card-body d-flex flex-column flex-fill">
                        <h6 class="card-title"><?php echo $course_name; ?></h6>
                        <p class="card-text" id="cardText<?php echo $course_id; ?>">
                            <?php
                                // Limit description to 15 words
                                $words = explode(" ", $course_description);
                                $short_description = implode(" ", array_slice($words, 0, 15));
                                echo $short_description;
                            ?>
                            <span id="dots<?php echo $course_id; ?>">...</span>
                            <span id="more<?php echo $course_id; ?>" style="display: none;"><?php echo $course_description; ?></span>
                            <a href="courseDetails.php?course_id=<?php echo $course_id; ?>"> Read more</a>
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                        <div class="btn-group">
                            <a href="courseDetails.php?course_id=<?php echo $course_id; ?>" class="btn btn-sm btn-dark">Enroll</a>
                        </div>
                            <span class="price">free</span>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>

        </div>
    </div>
</div>
</div>


<?php
// Close the database connection
mysqli_close($conn);
?>


<?php
  include 'footer.php';
?>


<!-- aRead More (...) js -->
  
  <script>
    function toggleReadMore(dotsId, moreId) {
        var dots = document.getElementById(dotsId);
        var moreText = document.getElementById(moreId);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            moreText.style.display = "inline";
        }
    }
</script>

</body>
</html>