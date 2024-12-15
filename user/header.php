<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
  
    <!-- Include Font Awesome stylesheet -->
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    


    <style>

        /* POPPINS FONT */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
         *{
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color:white; /* Change background color */
            height: 70px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #333 !important; /* Change brand text color */
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #333 !important; /* Change nav link text color */
            font-weight: 100;
            font-size: 1.2rem;
            margin-right: 20px; /* Adjust space between nav links */
        }

        .navbar-nav .nav-link:hover {
            color: #000 !important; /* Change nav link text color on hover */
            font-weight: bolder;
        }

        .nav-link.active {
            color: #000 !important;
            font-weight: bolder;
            transform: scale(1.1);
        }
    </style>

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fas fa-graduation-cap"></i> Elearning</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="courses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myCourses.php">My Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profileProfile.php">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all nav links
        var navLinks = document.querySelectorAll('.nav-link');

        // Function to set the active link based on the current URL
        function setActiveLink() {
            // Get the current page URL
            var currentUrl = window.location.href;

            // Check each nav link's URL
            navLinks.forEach(function (navLink) {
                var linkUrl = navLink.href;

                // Check if the current page URL includes the nav link's URL
                if (currentUrl.includes(linkUrl)) {
                    // Set the nav link as active
                    navLink.classList.add('active');
                } else {
                    // Remove the 'active' class from other nav links
                    navLink.classList.remove('active');
                }
            });
        }

        // Set the active link when the page loads
        setActiveLink();

        // Add click event listener to each nav link
        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                // Set the active link
                setActiveLink();

                // Store the active link in local storage
                localStorage.setItem('activeLink', link.href);
            });
        });

        // Check if there is an active link stored in local storage
        var storedActiveLink = localStorage.getItem('activeLink');
        if (storedActiveLink) {
            // Find the corresponding link and set it as active
            var matchingLink = Array.from(navLinks).find(function (link) {
                return storedActiveLink.includes(link.href);
            });

            if (matchingLink) {
                matchingLink.classList.add('active');
            }
        }
    });
</script>


<script src="../js/bootstrap.bundle.min.js"></script>


</body>
</html>