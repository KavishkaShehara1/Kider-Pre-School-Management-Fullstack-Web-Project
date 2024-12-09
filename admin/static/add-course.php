<?php
// Include the database configuration
include 'config.php';

// Fetch teachers for the dropdown
$teacherQuery = "SELECT id, name FROM teacher";
$teacherResult = mysqli_query($data, $teacherQuery);

// Handle form submission for adding a course
if (isset($_POST['add_course'])) {
    $course = $_POST['course'];
    $teacher = $_POST['teacher']; // This contains the selected teacher's ID
    $price = $_POST['price'];
    $age = $_POST['description'];
    $time = $_POST['time'];
    $capacity = $_POST['capacity'];
    $file = $_FILES['image']['name'];

    $dst = "../images/" . $file; // Destination path for image
    $dst_db = "../images/" . $file; // Path to store in the database

    // Move the uploaded file to the destination
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    // Insert course data into the database
    $sql = "INSERT INTO courses (name, teacher, price, age, time, capacity, image) 
            VALUES ('$course', '$teacher', '$price', '$age', '$time', '$capacity', '$dst_db')";

    if (mysqli_query($data, $sql)) {
        echo "<script>alert('Course added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding course: " . mysqli_error($data) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="AdminKit">
  <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

  <link rel="canonical" href="https://demo-basic.adminkit.io/" />

  <title>Admin Dashboard</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <?php
    include 'sidebar.php';
    ?>

    <div class="main">
      <?php
      include 'navbar.php';
      ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3">Add Course</h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
              <div class="card w-100">
                <div class="card-header">
                  <h5 class="card-title mb-0">Course Information</h5>
                </div>
                <div class="card-body">
                  <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="course" class="form-label">Course Name :</label>
                      <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course Name" required>
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Teacher Name :</label>
                      <select class="form-control" id="teacher" name="teacher" required>
                        <option value="" disabled selected>Select Teacher</option>
                        <?php
                        // Populate the dropdown with teacher data
                        while ($teacher = mysqli_fetch_assoc($teacherResult)) {
                          echo "<option value='" . $teacher['id'] . "'>" . $teacher['name'] . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price :</label>
                      <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Age :</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Enter Age" required>
                    </div>
                    <div class="mb-3">
                      <label for="time" class="form-label">Time :</label>
                      <input type="text" class="form-control" id="time" name="time" placeholder="Enter Time" required>
                    </div>
                    <div class="mb-3">
                      <label for="capacity" class="form-label">Capacity :</label>
                      <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Enter Capacity" required>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Image :</label>
                      <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_course">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="#" target="_blank"><strong>Created By</strong></a> - <a class="text-muted" href="#" target="_blank"><strong>Kavishka Shehara</strong></a> &copy;
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/app.js"></script>

</body>

</html>