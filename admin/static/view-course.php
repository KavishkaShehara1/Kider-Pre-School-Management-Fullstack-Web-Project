<?php
// Database connection
include 'config.php';

// Fetch courses with teacher names
$sql = "SELECT courses.id, courses.name, teacher.name AS teacher_name, 
        courses.price, courses.age, courses.time, courses.capacity, courses.image 
        FROM courses
        LEFT JOIN teacher ON courses.teacher = teacher.id";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Courses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/app.css" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="main">
      <?php include 'navbar.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3">View Courses</h1>
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Courses List</h5>
            </div>
            <div class="card-body">

              <!-- Search Bar -->
              <div class="mb-3">
                <input id="searchInput" type="text" class="form-control" placeholder="Search courses by name, teacher, or price">
              </div>

              <table class="table table-bordered" id="coursesTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Teacher Name</th>
                    <th>Price</th>
                    <th>Age</th>
                    <th>Time</th>
                    <th>Capacity</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td>" . $row['teacher_name'] . "</td>";
                      echo "<td>" . $row['price'] . "</td>";
                      echo "<td>" . $row['age'] . "</td>";
                      echo "<td>" . $row['time'] . "</td>";
                      echo "<td>" . $row['capacity'] . "</td>";
                      echo "<td><img src='" . $row['image'] . "' alt='Course Image' class='img-thumbnail' style='width: 100px; height: 100px;'></td>";
                      echo "<td>
                        <a href='edit-course.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a>
                        <a href='delete-course.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this course?');\">Delete</a>
                      </td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='9' class='text-center'>No Courses Found</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>

      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="#"><strong>Kavishka Shehara</strong></a> &copy;
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // JavaScript to filter table rows
    document.getElementById('searchInput').addEventListener('keyup', function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll('#coursesTable tbody tr');

      rows.forEach(row => {
        const courseName = row.cells[1].textContent.toLowerCase();
        const teacherName = row.cells[2].textContent.toLowerCase();
        const price = row.cells[3].textContent.toLowerCase();

        if (
          courseName.includes(filter) ||
          teacherName.includes(filter) ||
          price.includes(filter)
        ) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  </script>
  <script src="js/app.js"></script>
</body>

</html>
