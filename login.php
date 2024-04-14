<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acadmate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect to the dashboard
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            header("Location: ../dashboard.php");
            exit();
        } else {
            // Password is incorrect, redirect back to the login page with an error message
            header("Location: ./login.php?error=invalidlogin");
            exit();
        }
    } else {
        // User not found, redirect back to the login page with an error message
        header("Location: ./login.php?error=invalidlogin");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcadMate - Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./login.css">
</head>
<body>
  <h1>AcadMate!</h1>
  <div class="container">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <label for="email">Student Email</label>
      <input type="email" id="email" placeholder="Enter your email" name="email" required>
      <label for="password">Password</label>
      <input type="password" id="password" placeholder="Enter your password" name="password" required>
      <a href="./index.html"><button type="submit">Login</button></a>
      
    </form>
    <?php
      // Error handling
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'invalidlogin') {
          echo "<p>Invalid email or password!</p>";
        }
      }
    ?>
    <div class="additional-links">
      <a href="./register.php">New User ?</a>
      <a href="#">Forgot Password</a>
    </div>
  </div>
</body>
</html>