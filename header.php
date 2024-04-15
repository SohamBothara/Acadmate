<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="#">
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
         <a class="nav-link" href="./index.php">Home</a>
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
 <style>
    /* Custom Header */
.navbar {
 background-color: #D2B48C;
 height: 60px; /* Adjust height as needed */
 padding-top: 5%;
}

.navbar-brand {
 font-weight: bold;
 display: flex;
 align-items: center;
 font-size: 25px;
}

.navbar-brand img {
 margin-right: 10px;
}

.nav-link {
 color: #ffffff;
 font-size: 18px;
}

.nav-link.btn {
 border-radius: 20px;
 padding: 8px 16px;
 transition: background-color 0.3s ease, color 0.3s ease;
}

.nav-link.btn-primary {
 background-color: #D2B48C;
 border-color: #9E7B42;
}

.nav-link.btn-primary:hover {
 background-color: #9E7B42;
 border-color: #856741;
 font-weight: bold;
}

.nav-link.btn-outline-light {
 color: #fff;
 border-color: #fff;
}

.nav-link.btn-outline-light:hover {
 background-color: #fff;
 color: #9E7B42;
}
 </style>