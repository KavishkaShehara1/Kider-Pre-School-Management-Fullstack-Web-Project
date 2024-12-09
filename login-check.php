<?php
session_start();

// Include the database configuration
include('./config/config.php');

// Check if the form is submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = mysqli_real_escape_string($data, $_POST['email']);
  $password = mysqli_real_escape_string($data, $_POST['password']);

  // Hash the password to compare (assuming passwords are hashed in the database)
  $password_hashed = md5($password);

  // Check if the user exists in the database
  $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($data, $query);
  
  if (mysqli_num_rows($result) > 0) {
    // User found, start the session and redirect to the dashboard
    $_SESSION['email'] = $email;
    header('Location: ./admin/static/index.php'); // Redirect to the admin dashboard
  } else {
    // If no user found
    echo "Invalid email or password";
  }
}
?>
