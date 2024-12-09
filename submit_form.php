<?php
session_start(); // Start the session

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guardian_name = mysqli_real_escape_string($conn, $_POST['gname']);
    $guardian_email = mysqli_real_escape_string($conn, $_POST['gmail']);
    $child_name = mysqli_real_escape_string($conn, $_POST['cname']);
    $child_age = (int)$_POST['cage'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO guardian_child_form (guardian_name, guardian_email, child_name, child_age, message) 
            VALUES ('$guardian_name', '$guardian_email', '$child_name', $child_age, '$message')";

    if (mysqli_query($conn, $sql)) {
        // Set a success message in the session
        $_SESSION['message'] = "Form submitted successfully!";
    } else {
        // Set an error message in the session
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    // Redirect back to the same page to show the alert
    header("Location: index.php");
    exit();
}
?>
