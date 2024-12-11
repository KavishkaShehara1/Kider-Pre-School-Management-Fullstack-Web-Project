<?php
include 'config.php';

// Fetch teachers from the database
$sql = "SELECT * FROM teacher_applications";
$result = mysqli_query($data, $sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Teachers Applications</title>
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
          <h1 class="h3 mb-3">View Teachers Application</h1>
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Applications List</h5>
            </div>
            <div class="card-body">

              <!-- Search Bar -->
              <div class="mb-3">
                <input id="searchInput" type="text" class="form-control" placeholder="Search courses by name, teacher, or price">
              </div>

              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="table-light">
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Date Of Birth</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Qualification</th>
                      <th>Specialized Subject</th>
                      <th>Teaching Experience (Year)</th>
                      <th>Additional Skills</th>
                      <th>Image</th>
                      <th>Resume</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['qualification']; ?></td>
                        <td><?php echo $row['specialized_subject']; ?></td>
                        <td><?php echo $row['teaching_experience']; ?></td>
                        <td><?php echo $row['additional_skills']; ?></td>
                        <td>
                          <img src="../../uploads/<?php echo $row['photo_path']; ?>" alt="" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td><?php echo $row['resume_path']; ?></td>
                        <td>
                          <a href="delete-teacher-application.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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
    document.getElementById('searchInput').addEventListener('keyup', function() {
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