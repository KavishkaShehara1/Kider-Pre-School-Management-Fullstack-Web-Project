<?php

include 'config.php';

if (isset($_POST['add_teacher'])) {
  $t_name = $_POST['name'];
  $t_description = $_POST['description'];
  $file = $_FILES['image']['name'];

  $dst = "../images/" . $file;

  $dst_db = "../images/" . $file;

  move_uploaded_file($_FILES['image']['tmp_name'], $dst);

  $sql = "INSERT INTO teacher (name,description,image) VALUES ('$t_name','$t_description','$dst_db')";

  $result = mysqli_query($data, $sql);

  if ($result) {
    header('location:add-teachers.php');
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
          <h1 class="h3 mb-3">Add Teacher</h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
              <div class="card w-100">
                <div class="card-header">
                  <h5 class="card-title mb-0">Teacher Information</h5>
                </div>
                <div class="card-body">
                  <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="name" class="form-label">Teacher Name :</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter teacher name" required>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description :</label>
                      <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" required>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Image :</label>
                      <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_teacher">Submit</button>
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