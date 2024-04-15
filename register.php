<?php
// Include database connection
include_once 'db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['uid']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);
    $college = mysqli_real_escape_string($conn, $_POST['college']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO users (name, uid, email, pwd, college, branch, semester) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $username, $email, $hashed_password, $college, $branch, $semester);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Registration successful
        $_SESSION['registration_success'] = true;
        header("Location: login.html");
        exit();
    } else {
        // Registration failed
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>