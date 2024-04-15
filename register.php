<?php

    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
      }
      // else if ($_GET["error"] == "invaliduid") {
      //   echo "<p>Choose a proper username!</p>";
      // }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords doesn't match!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
      }
    }
    // Include database connection
    include_once 'db_connect.php';
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $college = mysqli_real_escape_string($conn, $_POST['college']);
        $branch = mysqli_real_escape_string($conn, $_POST['branch']);
        $semester = mysqli_real_escape_string($conn, $_POST['semester']);

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into database
        $sql = "INSERT INTO users (name, username, email, password, college, branch, semester) VALUES ('$name', '$username', '$email',  '$hashed_password', '$college', '$branch', '$semester')";
        if (mysqli_query($conn, $sql)) {
            // Registration successful
            $_SESSION['registration_success'] = true;
            header("Location: login.html");
            exit();
        } else {
            // Registration failed
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>