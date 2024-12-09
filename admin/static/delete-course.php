<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Connect to database
$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the course to get the image path
    $fetch_query = "SELECT image FROM courses WHERE id = $id";
    $fetch_result = mysqli_query($data, $fetch_query);

    if (mysqli_num_rows($fetch_result) == 1) {
        $course = mysqli_fetch_assoc($fetch_result);

        // Delete the course from the database
        $delete_query = "DELETE FROM courses WHERE id = $id";
        if (mysqli_query($data, $delete_query)) {
            // Delete the image file from the server if it exists
            $image_path = $course['image'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $_SESSION['message'] = "Course deleted successfully.";
        } else {
            $_SESSION['message'] = "Error deleting course: " . mysqli_error($data);
        }
    } else {
        $_SESSION['message'] = "Course not found.";
    }
} else {
    $_SESSION['message'] = "Invalid request. No course ID provided.";
}

// Redirect back to the courses list
header("Location: view-course.php");
exit();
?>
