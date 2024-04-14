<?php
// Start the session
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

// Handle note upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $semester = $_POST['semester'];
        $branch = $_POST['branch'];
        $subject = $_POST['subject'];
        $description = $_POST['description'];
        $tags = isset($_POST['tags']) ? $_POST['tags'] : '';

        // Define the upload directory
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($file['name']);

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            // Save the note information to the database
            $sql = "INSERT INTO notes (title, semester, branch, subject, description, tags, file_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $title, $semester, $branch, $subject, $description, $tags, $uploadFile);

            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to save note to the database.']);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to upload the file.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'No file was uploaded.']);
    }
    exit;
}

// Fetch notes based on filters
if (isset($_GET['semester'], $_GET['branch'], $_GET['subject'])) {
    $semester = $_GET['semester'];
    $branch = $_GET['branch'];
    $subject = $_GET['subject'];

    $sql = "SELECT * FROM notes WHERE semester = ? AND branch = ? AND subject = ? ORDER BY upvotes DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $semester, $branch, $subject);

    if (!$stmt->execute()) {
        error_log("Error executing SQL query: " . $stmt->error);
        echo json_encode(['error' => 'Failed to fetch notes']);
        exit;
    }

    $result = $stmt->get_result();

    $notes = [];
    while ($row = $result->fetch_assoc()) {
        $row['tags'] = $row['tags'] ? explode(',', $row['tags']) : [];
        $notes[] = $row;
    }

    echo json_encode($notes);
    exit;
}

// Update upvote/downvote count
if (isset($_POST['noteId'], $_POST['voteType'], $_POST['action'])) {
 $noteId = $_POST['noteId'];
 $voteType = $_POST['voteType'];

 $sql = "";
 if ($voteType === 'upvote') {
    $sql = "UPDATE notes SET upvotes = upvotes + 1 WHERE id = ?";
 } else {
    $sql = "UPDATE notes SET downvotes = downvotes + 1 WHERE id = ?";
 }

 $stmt = $conn->prepare($sql);
 $stmt->bind_param("i", $noteId);

 if ($stmt->execute()) {
    // Fetch the updated note to get the new vote count
    $stmt = $conn->prepare("SELECT upvotes, downvotes FROM notes WHERE id = ?");
    $stmt->bind_param("i", $noteId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    echo json_encode(['success' => true, 'voteCount' => $row['upvotes']]);
 } else {
    echo json_encode(['success' => false, 'error' => 'Failed to update vote count.']);
 }

 $stmt->close();
 exit;
}

$conn->close();
