<?php
session_start();
// Check if user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo '<li class="nav-item"><span class="nav-link">Welcome back, ' . $_SESSION['username'] . '! &middot; </span></li>';
    echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
} else {
    echo '<li class="nav-item"><a class="nav-link btn btn-primary mr-2" href="login.html">Login</a></li>';
    echo '<li class="nav-item"><a class="nav-link btn btn-primary mr-2" href="register.html">Register</a></li>';
}
// Check if user is logged in
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["username"])) {
    if (basename($_SERVER['SCRIPT_NAME']) !== 'index.php') {
        header("location: login.html");
        exit();
    }
}

// Logout logic
if (isset($_POST['logout'])) {
    // Destroy session
    session_destroy();
    // Redirect to login page
    header("location: login.html");
    exit();
}
?>