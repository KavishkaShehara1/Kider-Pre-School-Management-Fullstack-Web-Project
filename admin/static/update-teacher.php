<?php

include 'config.php';

// Fetch existing teacher data if editing
if (isset($_GET['id'])) {
    $teacherId = $_GET['id'];
    $query = "SELECT * FROM teacher WHERE id = '$teacherId'";
    $result = mysqli_query($data, $query);
    $teacherData = mysqli_fetch_assoc($result);

    if (!$teacherData) {
        echo "<script>alert('Teacher not found!'); window.location.href='teachers.php';</script>";
        exit;
    }
}

// Handle form submission for updating the teacher
if (isset($_POST['update_teacher'])) {
    $t_name = $_POST['name'];
    $t_description = $_POST['description'];
    $file = $_FILES['image']['name'];

    // If a new image is uploaded, process it
    if (!empty($file)) {
        $dst = "../images/" . $file;
        $dst_db = "../images/" . $file;
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);

        // Update query including the image
        $updateQuery = "UPDATE teacher SET name='$t_name', description='$t_description', image='$dst_db' WHERE id='$teacherId'";
    } else {
        // Update query without changing the image
        $updateQuery = "UPDATE teacher SET name='$t_name', description='$t_description' WHERE id='$teacherId'";
    }

    if (mysqli_query($data, $updateQuery)) {
        header('Location: view-teachers.php'); // Redirect to teacher list
    } else {
        echo "<script>alert('Error updating teacher: " . mysqli_error($data) . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
    <link href="css/app.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main">
            <?php include 'navbar.php'; ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3">Update Teacher</h1>
                    <div class="row">
                        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                            <div class="card w-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Teacher Information</h5>
                                </div>
                                <div class="card-body">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Teacher Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $teacherData['name']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description:</label>
                                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $teacherData['description']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image:</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            <small>Current Image: <img src="<?php echo $teacherData['image']; ?>" alt="Teacher Image" width="50"></small>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="update_teacher">Update</button>
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
                                <a class="text-muted" href="#"><strong>Kavishka Shehara</strong></a> &copy;
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
