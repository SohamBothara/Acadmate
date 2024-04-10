

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AcadMate - Register</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./register.css" />
  </head>
  <body>
    <h1>AcadMate!</h1>
    <div class="container">
      <br />
      <h2>Register</h2>
      
      <form action="includes/signup.inc.php" method="post">
        <label for="name">Name</label>
        <input
          type="text"
          id="name"
          placeholder="Enter your name"
          name="name"
          required
        />
        </form>
        

        <label for="username">Username</label>
        <input
          type="text"
          id="username"
          placeholder="Enter a username"
          name="uid"
          required
        />

        <label for="email">Student Email</label>
        <input
          type="email"
          id="email"
          placeholder="Enter your email"
          name="email"
          required
        />

        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          placeholder="Enter a password"
          name="pwd"
          required
        />

        <label for="confirm-password">Confirm Password</label>
        <input
          type="password"
          id="confirm-password"
          placeholder="Confirm your password"
          name="pwdrepeat"
          required
        />

        <label for="college">College Name</label>
        <input
          type="text"
          id="college"
          placeholder="Enter your college name"
          name="college"
          required
        />

        <label for="branch">Branch</label>
        <select id="branch" name="branch" required>
          <option value="">Select Branch</option>
          <option value="1">Computers</option>
          <option value="2">IT</option>
          <option value="3">EXCP</option>
          <option value="4">EXTC</option>
        </select>

        <label for="semester">Current Semester</label>
        <select id="semester" name="semester" required="">
          <option value="">Select Semester</option>
          <option value="1">Semester 1</option>
          <option value="2">Semester 2</option>
          <option value="3">Semester 3</option>
          <option value="4">Semester 4</option>
          <option value="5">Semester 5</option>
          <option value="6">Semester 6</option>
          <option value="7">Semester 7</option>
          <option value="8">Semester 8</option>
        </select>

        <button type="submit">Register</button>
      </form>
      <?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper username!</p>";
      }
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
  ?>

      
      <div class="additional-links">
        <a href="./login.html">Already a User ?</a>
      </div>
    </div>

    <script src="./register.js"></script>
  </body>
</html>
