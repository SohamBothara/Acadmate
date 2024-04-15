
<?php
// Include database connection
include_once 'db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch user data from database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Verify password
    if ($row && password_verify($password, $row['password'])) {
        // Password is correct, start session
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['logged_in'] = true;
        header("Location: ./index.php");
        exit();
    } else {
        // Invalid email/password
        echo "Invalid email or password";
    }
}
?>
