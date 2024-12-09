<?php
include 'config.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Delete teacher application
  $sql = "DELETE FROM teacher_applications WHERE id = $id";
  if (mysqli_query($data, $sql)) {
    header('Location: view-teacher-application.php');
  } else {
    echo "Error deleting record: " . mysqli_error($data);
  }
}
?>
