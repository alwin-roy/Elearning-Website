<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">



    <!-- Include Font Awesome stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    
    <style>

        /* POPPINS FONT */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        *{
            font-family: 'Poppins', sans-serif;
        }

        body {
            padding-top: 56px;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: #ffffff;
            margin-left: 50px;
        }

        .navbar-brand small {
            color: #999999;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .sidebar {
            position: fixed;
            top: 56px;
            bottom: 0;
            left: 0;
            z-index: 1000;
            padding-top: 56px;
            padding-left: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-sticky {
            padding-top: 20px;
        }

        .nav-link {
            color: #333;
        }

        .nav-link:hover {
            color: #000 !important;
            font-weight: bold;
        }

        .nav-link.active {
            color: #000 !important;
            font-weight: bold;
        }
        
    </style>
</head>
<body>
    <!-- Top navbar--> 
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand" href="adminDashboard.php"><strong>ELearning</strong><small>&nbsp;&nbsp;Admin Area</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- Side Bar-->
    <div class="container-fluid">
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <!-- Your existing sidebar content with unique ids for each item -->
                    <li class="nav-item" id="dashboard">
                        <a class="nav-link" href="adminDashboard.php">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <!-- Add unique ids for the rest of your sidebar items -->

                    <li class="nav-item" id="courses">
                        <a class="nav-link" href="adminCourses.php">
                            <i class="fas fa-book"></i>
                            Courses
                        </a>
                    </li>

                    <li class="nav-item" id="lessons">
                        <a class="nav-link" href="adminLessons.php">
                            <i class="fas fa-chalkboard"></i>
                            Lessons
                        </a>
                    </li>

                    <li class="nav-item" id="students">
                        <a class="nav-link" href="adminStudents.php">
                            <i class="fas fa-users"></i>
                            Students
                        </a>
                    </li>

                    <li class="nav-item" id="enrollments">
                        <a class="nav-link" href="adminEnroll.php">
                            <i class="fas fa-graduation-cap"></i>
                            Enrollments
                        </a>
                    </li>
                    

                    <li class="nav-item" id="admin">
                        <a class="nav-link" href="adminManage.php">
                            <i class="fas fa-key"></i>
                            Admin
                        </a>
                    </li>

                    <li class="nav-item" id="admin">
                        <a class="nav-link" href="adminChangePass.php">
                            <i class="fas fa-lock"></i>
                            Change Password
                        </a>
                    </li>

                    <li class="nav-item" id="logout">
                        <a class="nav-link" href="adminLogout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Content goes here -->
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all nav links
        var navLinks = document.querySelectorAll('.nav-link');

        // Function to set the active link
        function setActiveLink(link) {
            // Remove the 'active' class from all nav links
            navLinks.forEach(function (navLink) {
                navLink.classList.remove('active');
            });

            // Add the 'active' class to the clicked nav link
            link.classList.add('active');
        }

        // Add click event listener to each nav link
        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                // Set the active link
                setActiveLink(link);

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
                setActiveLink(matchingLink);
            }
        }
    });
</script>


     <!-- Bootstrap JS and other scripts go here -->

     <script src="../js/bootstrap.bundle.min.js"></script>
    
   
</body>
</html>