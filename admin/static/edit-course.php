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

// Get the course ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the course details
    $sql = "SELECT * FROM courses WHERE id = $id";
    $result = mysqli_query($data, $sql);

    if (mysqli_num_rows($result) == 1) {
        $course = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['message'] = "Course not found.";
        header("Location: view-course.php");
        exit();
    }
}

// Fetch all teachers for the dropdown
$teacher_query = "SELECT id, name FROM teacher";
$teachers_result = mysqli_query($data, $teacher_query);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $teacher = $_POST['teacher']; // Updated to get the selected teacher ID
    $price = $_POST['price']; // Updated to get the selected teacher ID
    $age = $_POST['age'];
    $time = $_POST['time'];
    $capacity = $_POST['capacity'];
    $image = $_FILES['image'];

    // Image upload logic
    if ($image['name'] !== '') {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($image["name"]);
        move_uploaded_file($image["tmp_name"], $target_file);
    } else {
        $target_file = $course['image']; // Keep the existing image if no new image is uploaded
    }

    // Update query
    $update_query = "UPDATE courses SET 
        name = '$name', 
        teacher = '$teacher',
        price = '$price', 
        age = '$age', 
        time = '$time', 
        capacity = '$capacity', 
        image = '$target_file' 
        WHERE id = $id";

    if (mysqli_query($data, $update_query)) {
        $_SESSION['message'] = "Course updated successfully.";
        header("Location: view-course.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($data);
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
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="name" class="form-label">Course Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $course['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="teacher" class="form-label">Teacher Name</label>
                      <select class="form-control" id="teacher" name="teacher" required>
                        <option value="">Select Teacher</option>
                        <?php
                        if (mysqli_num_rows($teachers_result) > 0) {
                          while ($teacher = mysqli_fetch_assoc($teachers_result)) {
                            $selected = $teacher['id'] == $course['teacher_id'] ? 'selected' : '';
                            echo "<option value='{$teacher['id']}' $selected>{$teacher['name']}</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="text" class="form-control" id="price" name="price" value="<?php echo $course['price']; ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="age" class="form-label">Age</label>
                      <input type="text" class="form-control" id="age" name="age" value="<?php echo $course['age']; ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="time" class="form-label">Time</label>
                      <input type="text" class="form-control" id="time" name="time" value="<?php echo $course['time']; ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="capacity" class="form-label">Capacity</label>
                      <input type="text" class="form-control" id="capacity" name="capacity" value="<?php echo $course['capacity']; ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input type="file" class="form-control" id="image" name="image">
                      <p>Current Image:</p>
                      <img src="<?php echo $course['image']; ?>" alt="Course Image" style="width: 100px; height: 100px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Course</button>
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