<?php
// Include database connection
include_once 'db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch user data from database
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Verify password
    if ($row && password_verify($password, $row['pwd'])) {
        // Password is correct, start session
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['logged_in'] = true;
        header("Location: ./index.php");
        exit();
    } else {
        // Invalid email/password
        echo "Invalid email or password";
    }

    mysqli_stmt_close($stmt);
}
?>