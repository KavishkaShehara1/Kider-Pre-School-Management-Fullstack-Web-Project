<?php
session_start(); // Start the session

// Database connection details
$host = 'localhost';
$dbname = 'schoolproject';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form inputs
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $dob = $_POST['dob'];
    $contact = htmlspecialchars($_POST['contact']);
    $address = htmlspecialchars($_POST['address']);
    $qualification = htmlspecialchars($_POST['qualification']);
    $specializedSubject = htmlspecialchars($_POST['subject']);
    $teachingExperience = (int)$_POST['experience'];
    $additionalSkills = htmlspecialchars($_POST['skills']);

    // Handle file uploads
    $uploadDir = 'uploads/'; // Directory to save files
    $resumePath = $uploadDir . basename($_FILES['resume']['name']);
    $photoPath = $uploadDir . basename($_FILES['photo']['name']);

    // Ensure the uploads directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath) && move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
        try {
            // Insert data into the database
            $sql = "INSERT INTO teacher_applications (full_name, email, dob, contact, address, qualification, specialized_subject, teaching_experience, additional_skills, resume_path, photo_path)
                    VALUES (:full_name, :email, :dob, :contact, :address, :qualification, :specialized_subject, :teaching_experience, :additional_skills, :resume_path, :photo_path)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':full_name' => $fullName,
                ':email' => $email,
                ':dob' => $dob,
                ':contact' => $contact,
                ':address' => $address,
                ':qualification' => $qualification,
                ':specialized_subject' => $specializedSubject,
                ':teaching_experience' => $teachingExperience,
                ':additional_skills' => $additionalSkills,
                ':resume_path' => $resumePath,
                ':photo_path' => $photoPath
            ]);

            // Set success message in the session
            $_SESSION['message'] = "Application submitted successfully!";
            $_SESSION['alert_type'] = "success";
        } catch (PDOException $e) {
            // Set error message in the session
            $_SESSION['message'] = "Error saving data: " . $e->getMessage();
            $_SESSION['alert_type'] = "error";
        }
    } else {
        // Set error message for file upload
        $_SESSION['message'] = "Error uploading files. Please try again.";
        $_SESSION['alert_type'] = "error";
    }

    // Redirect back to the form page
    header("Location: call-to-action.php");
    exit();
} else {
    $_SESSION['message'] = "Invalid request.";
    $_SESSION['alert_type'] = "error";
    header("Location: call-to-action.php");
    exit();
}
?>
