<?php

// Check for empty input signup
function emptyInputSignup($name, $email, $uid, $pwd, $pwdRepeat) {
  $result;
  if (empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwdRepeat)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// Check invalid username
// function invalidUid($uid) {
//   $result;
//   if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
//     $result = true;
//   }
//   else {
//     $result = false;
//   }
//   return $result;
// }

// Check invalid email
function invalidEmail($email) {
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// Check if passwords matches
function pwdMatch($pwd, $pwdrepeat) {
  $result;
  if ($pwd !== $pwdrepeat) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// Check if username is in database, if so then return data
function uidExists($conn, $uid) {
  $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $uid, $uid);
  mysqli_stmt_execute($stmt);

  // "Get result" returns the results from a prepared statement
  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

// Insert new user into database
function createUser($conn, $name, $email, $uid, $pwd, $college, $branch, $semester) {
  $sql = "INSERT INTO users (name, email, uid, pwd, college, branch, semester) VALUES (?, ?, ?, ?, ?, ?, ?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $uid, $hashedPwd, $college, $branch, $semester);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  header("location: ../register.php?error=none");
  exit();
}

// Check for empty input login
function emptyInputLogin($uid, $pwd) {
  $result;
  if (empty($uid) || empty($pwd)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

// Log user into website
function loginUser($conn, $uid, $pwd) {
  $uidExists = uidExists($conn, $uid);

  if ($uidExists === false) {
    header("location: ../login.html?error=wronglogin");
    exit();
  }

  $pwdHashed = $uidExists["pwd"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location: ../login.html?error=wronglogin");
    exit();
  }
  elseif ($checkPwd === true) {
    session_start();
    $_SESSION["userid"] = $uidExists["id"];
    $_SESSION["useruid"] = $uidExists["uid"];
    header("location: ../login.html?error=none");
    exit();
  }
}