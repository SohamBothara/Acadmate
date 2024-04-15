

<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["username"])) {
    header("location: login.html");
    exit();
}

// Logout logic
if (isset($_POST['logout'])) {
    // Destroy session
    session_destroy();
    // Redirect to login page
    header("location: login.html");
    exit();
}

// Retrieve user details
$userUid = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="style-profile.css" />
    <title>Profile Dropdown</title>
  </head>
  <body>
    <nav class="navbar">
      <!-- <img src="./assets/logo.png" class="navbar-logo" alt="logo" /> -->
      <div class="navbbar-logo">Acadmate</div>
      <ul class="navbar-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Notes</a></li>
        <li><a href="#">Groups</a></li>
        <li><a href="#">Community</a></li>
        <li><a href="#">About</a></li>
      </ul>

      <div class="profile-dropdown">
        <div onclick="toggle()" class="profile-dropdown-btn">
          <div class="images/profile-pic.png">
            <i class="fa-solid fa-circle"></i>
          </div>

          <span
            ><h1> <?php echo $userUid; ?>!</h1> </span>
            <i class="fa-solid fa-angle-down"></i>
          </span>
        </div>

        <ul class="profile-dropdown-list">
          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-user"></i>
              Edit Profile
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-envelope"></i>
              Inbox
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-solid fa-chart-line"></i>
              Analytics
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-solid fa-sliders"></i>
              Settings
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-circle-question"></i>
              Help & Support
            </a>
          </li>
          <hr />

          <form method="post">
          <button type="submit" name="logout" class="logout-btn">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              Log out
            </a>
            </form>
          
        </ul>
      </div>
    </nav>

    <div class="container">
    <h1>Welcome to your profile, <?php echo $userUid; ?>!</h1>
      <div class="profile-box">
          <img src="images/menu.png" class="menu-icon">
          <!-- <div class="dropdown-menu" id="menuDropdown">
              <a href="#">Home</a>
              <a href="#">About</a>
              <a href="#">Services</a>
          </div> -->
          <img src="images/setting.png" class="setting-icon">
          <div class="dropdown-menu" id="settingsDropdown">
              <!-- <a href="#">Profile</a>
              <a href="#">Settings</a>
              <a href="#">Logout</a> -->
          </div>
          <img src="images/profile-pic.png" class="profile-pic">
          <h1> <?php echo $userUid; ?>!</h1>
          <p>Web Developer</p>
          <div class="social-media">
              <a href="'https://www.instagram.com/'" id="instagram"><img src="images/instagram.png"></a>
              <a href="https://web.telegram.org/" id="telegram"><img src="images/telegram.png"></a>
              <a href="https://dribbble.com/" id="dribble"><img src="images/dribble.png"></a>
          </div>
          <button type="button" id="followBtn">Follow</button>
          <div class="profile-bottom">
              <p>Learn More About My Profile</p>
              <img src="images/arrow.png">
          </div>
      </div>
  </div>

    <script src="script-profile.js"></script>
  </body>
</html>

