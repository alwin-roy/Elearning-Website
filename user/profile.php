<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <style>
        /* Your existing styles remain unchanged */

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .container-main {
            flex: 1;
            display: flex;
            flex-direction: column; /* Set the main container to column layout */
        }

        .sidebar {
            position: fixed;
            top: 75px;
            bottom: 0;
            left: 0;
            z-index: 1000;
            width: 220px; /* Adjust the width as needed */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            flex: 1;
            padding-top: 56px; /* Adjust based on your navbar height */
            padding-left: 230px; /* Adjust based on your sidebar width */
        }

        .footer {
            margin-top: auto; /* Push the footer to the bottom */
            text-align: center;
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
        }

        /* Your existing styles remain unchanged */
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

        .sidebar-sticky {
            padding-top: 20px;
        }

        .nav-link {
            color: #333 !important;
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <?php
    include 'header.php';
    include '../components/dbConnection.php';
    ?>

    <!-- Main Content -->
    <div class="container-main">
        <!-- Sidebar -->
<nav class="sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <!-- Your existing sidebar content with unique ids for each item -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="profileProfile.php">
                    <i class="fas fa-user-circle"></i>
                    Profile
                </a>
            </li>

            <!-- Add unique ids for the rest of your sidebar items -->


            <li class="nav-item" id="lessons">
                <a class="nav-link" href="profilePassword.php">
                    <i class="fas fa-key"></i>
                    Change Password
                </a>
            </li>

            <li class="nav-item" id="logout">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>





    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Your existing script remains unchanged
        });
    </script>

    <!-- Bootstrap JS and other scripts go here -->
    <script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>
