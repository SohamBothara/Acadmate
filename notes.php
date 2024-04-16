<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notes Forum</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
  <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap"
      rel="stylesheet"
    />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./notes.css">
</head>
<body>
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
                <a class="nav-link" href="./index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./forum.php">Forum</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="./notes.php">Notes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Search</a>
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
<div class="app">
    <div class="container">
      <div class="form-container">
        <div class="form-group">
          <div class="select-wrapper">
            <select id="semester" onchange="updateBranches()">
              <option value="" disabled selected>Select Semester</option>
              <option value="sem1">Semester 1</option>
              <option value="sem2">Semester 2</option>
              <option value="sem3">Semester 3</option>
              <option value="sem4">Semester 4</option>
              <option value="sem5">Semester 5</option>
              <option value="sem6">Semester 6</option>
              <option value="sem7">Semester 7</option>
              <option value="sem8">Semester 8</option>
            </select>
          </div>
          <div class="select-wrapper">
            <select id="branch" onchange="updatesubject()">
              <option value="" disabled selected>Select Branch</option>
              <!-- <option value="comps">Comps</option>
              <option value="it">IT</option>
              <option value="extc">Extc</option>
              <option value="excp">EXCP</option> -->
            </select>
          </div>
          <div class="select-wrapper">
            <select id="subject">
              <option value="" disabled selected>Select Subject</option>
              <!-- <option value="sub1">Subject 1</option>
              <option value="sub2">Subject 2</option>
              <option value="sub3">Subject 3</option>
              <option value="sub4">Subject 4</option> -->
            </select>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-submit">Submit</button>
        </div>
        <div class="form-actions">
          <button class="btn btn-outline" id="postResourcesBtn">Post Resources</button>
          <div id="success-message" class="hidden">Thank you for contributing, your resource was uploaded!</div>
        </div>
      </div>

      <div class="notes-container">
        <div class="sort-options">
          <label for="sortBy">Sort by:</label>
          <select id="sortBy">
            <option value="upvotes-desc">Upvotes (Descending)</option>
            <option value="upvotes-asc">Upvotes (Ascending)</option>
          </select>
        </div>
        <div class="notes-grid">
          <!-- Notes will be dynamically inserted here -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal hidden">
    <div class="modal-content">
      <h3>Add Resource</h3>
      <form enctype="multipart/form-data" action="resource_manager.php" method="POST">
        <div class="form-group">
          <div class="select-wrapper">
            <select id="modal-semester" name="semester" onchange="updateBranches('modal-semester'); updatesubject('modal-branch');">
              <option value="" disabled selected>Semester</option>
              <option value="sem1">Semester 1</option>
              <option value="sem2">Semester 2</option>
              <option value="sem3">Semester 3</option>
              <option value="sem4">Semester 4</option>
              <option value="sem5">Semester 5</option>
              <option value="sem6">Semester 6</option>
              <option value="sem7">Semester 7</option>
              <option value="sem8">Semester 8</option>
            </select>
          </div>
          <div class="select-wrapper">
            <select id="modal-branch" name="branch" onchange="updatesubject('modal-branch')">
              <option value="" disabled selected>Branch</option>
              <!-- <option value="comps">Comps</option>
              <option value="it">IT</option>
              <option value="extc">Extc</option>
              <option value="excp">EXCP</option> -->
            </select>
          </div>
          <div class="select-wrapper">
            <select id="modal-subject" name="subject">
              <option value="" disabled selected>Select Subject</option>
              <!-- <option value="sub1">Subject 1</option>
              <option value="sub2">Subject 2</option>
              <option value="sub3">Subject 3</option>
              <option value="sub4">Subject 4</option> -->
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="file-upload">Upload File (PDF, DOC, TXT)</label>
          <input type="file" id="file-upload" name="file" accept=".pdf,.doc,.txt" required>
        </div>
        <div class="form-group">
          <textarea id="description" name="description" placeholder="Description" required></textarea>
        </div>
        <div class="form-actions">
          <button class="btn btn-outline" id="closeModalBtn" type="button">Cancel</button>
          <button class="btn" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./notes.js"></script>
</body>
</html>