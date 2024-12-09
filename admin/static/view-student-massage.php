<?php
include 'config.php';

// Fetch teachers from the database
$sql = "SELECT * FROM guardian_child_form";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Student Message</title>
  <link href="css/app.css" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <?php include 'sidebar.php'; ?>
    <div class="main">
      <?php include 'navbar.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3">View Student Message</h1>
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Message List</h5>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Guradian Name</th>
                    <th>Guradian Email</th>
                    <th>Child Name</th>
                    <th>Child Age</th>
                    <th>Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['guardian_name']; ?></td>
                      <td><?php echo $row['guardian_email']; ?></td>
                      <td><?php echo $row['child_name']; ?></td>
                      <td><?php echo $row['child_age']; ?></td>
                      <td><?php echo $row['message']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
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
                <a class="text-muted" href="#"><strong>Copyright by Kavishka Shehara</strong></a> &copy;
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