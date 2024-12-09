<?php
// Start a session for managing user sessions
session_start();

// Database configuration variables
$host = "localhost";  // The database server (localhost for local development)
$user = "root";       // The username for the database (default for XAMPP/WAMP/LAMP is "root")
$password = "";       // The password for the database (default for XAMPP/WAMP/LAMP is empty)
$db = "schoolproject"; // The name of your database

// Connect to the database using the above credentials
$data = mysqli_connect($host, $user, $password, $db);

// Optional: Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
