<?php
include 'config.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Delete teacher
  $sql = "DELETE FROM teacher WHERE id = $id";
  if (mysqli_query($data, $sql)) {
    header('Location: view-teachers.php');
  } else {
    echo "Error deleting record: " . mysqli_error($data);
  }
}
?>
