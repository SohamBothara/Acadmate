<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AcadMate</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./styles.css" />
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <!-- <img src="logo.png" alt="AcadMate Logo" style="width: 40px;"> -->
            AcadMate
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link active" href="./index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./forum.php">Forum</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./notes.php">Notes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./profile.php">Profile</a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <?php
              include 'login_check.php';
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Main Content -->
    <main>
      <!-- Your content goes here -->
      <div id="banner">
        <h1>AcadMate!</h1>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p>&copy; 2023 AcadMate. All rights reserved.</p>
          </div>
          <div class="col-md-6 text-md-right">
            <a href="./aboutus.html" class="mr-3">About Us</a>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
