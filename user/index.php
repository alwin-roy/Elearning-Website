<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/card.css">

  <title>home</title>

 
  <style>

    /* bg img css */
    .c-item {
  height: 730px !important;
}

.c-img {
  height: 100%;
  object-fit: cover;
  filter: brightness(0.6);
}

.mt-4{
    margin-top: 10.5rem !important;
  }


/* headers (h2), courses, testimonials*/
.mainTitles{
    color: #333;
    text-align: center;
    height: 65px;
    padding-top: 10px;
    margin-top: 50px;
    font-weight: bold;
}


        /* navbar css*/

        


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

        /* testimonial code design */

        #testimonial-carousel {
        text-align: center;
        }

        #testimonial-carousel img {
        margin: 0 auto; /* Center the images */
        display: block;
        }

        .carousel-indicators {
        margin-top: 10px; /* Adjust the position of the indicators */
        }

        /* Update the CSS for arrow buttons */
        .carousel-control-prev,
        .carousel-control-next {
        background-color: transparent; /* Remove the background color */
        border: none; /* Remove the border */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
        background-color: rgb(72, 69, 69); /* Remove the arrow background color */
        color: #333 !important; /* Change the arrow color */
        }


      


  </style>

</head>
<body>

<?php
include 'header.php';

?>
  

  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="../images/coursebg.jpg" class="d-block w-100 c-img" alt="Slide 1">
        <div class="carousel-caption top-0 mt-4" style="margin-top: 10.5rem !important;">
          <p class="mt-5 fs-3 text-uppercase">Digital Learning Experience</p>
          <h1 class="display-1 fw-bolder text-capitalize">Start Learning Today</h1>
          <a href="login.php" >
            <button type="button" class="btn btn-primary px-4 py-2 fs-5 mt-5">REGISTER NOW</button>
          </a>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="../images/coursebg2.png" class="d-block w-100 c-img" alt="Slide 2">
        <div class="carousel-caption top-0 mt-4" style="margin-top: 10.5rem !important;">
          <p class="text-uppercase fs-3 mt-5">Empower Yourself</p>
          <p class="display-1 fw-bolder text-capitalize">Dive Into The Future Of Learning</p>
          
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="../images/coursebg3.jpg" class="d-block w-100 c-img" alt="Slide 3">
        <div class="carousel-caption top-0 mt-4" style="margin-top: 10.5rem !important;">
          <p class="text-uppercase fs-3 mt-5">Beyond Boundaries</p>
          <p class="display-1 fw-bolder text-capitalize">Seamless Learning in the Digital Age</p>
          
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container my-5 ">
    <h2 class="mainTitles">Popular Courses</h2>

    

        <!-- popualar Courses  -->

      <?php
        include '../components/dbConnection.php';

      $query = "SELECT course_id, course_name, course_description, course_image FROM courses LIMIT 6";
      $result = mysqli_query($conn, $query);

      ?>

<div class="courses">
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







<?php
// Close the database connection
mysqli_close($conn);
?>


      
  
              <!-- Repeat similar structure for more cards -->

          </div>
      </div>


      <h2 class="mainTitles">Testimonials</h2>

      <!-- Testimonials -->

      <div id="testimonial-carousel" class="carousel slide my-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
          <button type="button" data-bs-target="#testimonial-carousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#testimonial-carousel" data-bs-slide-to="2"></button>
        </div>
      
        <div class="carousel-inner">
          <div class="carousel-item active">
            <p class="lead font-italic mx-4 mx-md-5">
              "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
              numquam iure provident voluptate esse quasi, voluptas nostrum quisquam!"
            </p>
            <div class="mt-5 mb-4">
              <img src="../images/test1.jpg"
                class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100" height="100" />
            </div>
            <p class="text-muted mb-0">- Anna Morian</p>
          </div>
      
          <div class="carousel-item">
            <p class="lead font-italic mx-4 mx-md-5">
              "Neque cupiditate assumenda in maiores repudiandae mollitia adipisci maiores
              repudiandae mollitia consectetur adipisicing architecto elit sed adipiscing
              elit."
            </p>
            <div class="mt-5 mb-4">
              <img src="../images/test2.jpg"
                class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100" height="100" />
            </div>
            <p class="text-muted mb-0">- Teresa May</p>
          </div>
      
          <div class="carousel-item">
            <p class="lead font-italic mx-4 mx-md-5">
              "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
              dolore eu fugiat nulla pariatur est laborum neque cupiditate assumenda in
              maiores."
            </p>
            <div class="mt-5 mb-4">
              <img src="../images/test3.png"
                class="rounded-circle img-fluid shadow-1-strong" alt="smaple image" width="100" height="100" />
            </div>
            <p class="text-muted mb-0">- Kate Allise</p>
          </div>
        </div>
      
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


  </div>

  </div>

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
