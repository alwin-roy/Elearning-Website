<?php
// Get parameters from the URL
$courseName = isset($_GET['course_name']) ? $_GET['course_name'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';

// Load the certificate background image
$image = imagecreatefromjpeg("certificate.jpg");

// Set the text color
$color = imagecolorallocate($image, 19, 21, 22);

// Add participant's name to the certificate
$font = "BRUSHSCI.TTF";
$font2 = "AGENCYR.TTF";
$participantName = $username;

// Get the bounding box of the text
$bboxName = imagettfbbox(180, 0, $font, $participantName);

// Calculate the center coordinates for the name
$textWidthName = $bboxName[2] - $bboxName[0];
$xName = (imagesx($image) - $textWidthName) / 2;
$yName = 740; // Fixed vertical position for the name

// Add the participant's name to the image
imagettftext($image, 180, 0, $xName, $yName, $color, $font2, $participantName);

// Add course name to certificate on two lines
$line1 = "This certificate acknowledges successful completion of the $courseName ";
$line2 = " online program, signifying a dedication to learning and mastery of the course content.";

// Set the coordinates for the course name lines
$xCourse = 400; // Adjust as needed
$yCourse1 = 900; // Adjust as needed
$yCourse2 = $yCourse1 + 60; // Adjust as needed

// Add the course name lines to the image
imagettftext($image, 40, 0, $xCourse, $yCourse1, $color, $font2, $line1);
imagettftext($image, 40, 0, $xCourse, $yCourse2, $color, $font2, $line2);

// Add today's date to the certificate
$date = date("jS F Y");
imagettftext($image, 40, 0, 315, 1100, $color, $font2, $date);

// Set the Content-Disposition header for automatic download
header('Content-Disposition: attachment; filename="certificate.jpg"');
header('Content-Type: image/jpeg');

// Output the image directly to the browser
imagejpeg($image);

// Save the certificate with a unique filename
$filename = "certificate/" . time() . ".jpg";
imagejpeg($image, $filename);

// Destroy the image resource to free up memory
imagedestroy($image);

exit;
?>
