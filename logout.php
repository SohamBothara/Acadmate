<?php
// Start session
session_start();

// End session
session_unset();
session_destroy();

// Redirect to login page
header("Location: login.html");
exit();
?>
