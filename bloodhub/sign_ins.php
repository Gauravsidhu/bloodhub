<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodhub";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $role = $_POST['role']; // Retrieve the selected role from the dropdown menu
  $raw_password = $_POST['password'];
  $address = $_POST['address'];

  // Hash the password
  $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

  // Prepare and execute your SQL INSERT statement, including the role column
  $query = "INSERT INTO user (firstname, lastname, email, role, password, address) VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $role, $hashed_password, $address);
  mysqli_stmt_execute($stmt);

  if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Registration successful
    $_SESSION['registration_success'] = true;
    header("Location: login.php");
    exit();
  } else {
    // Registration failed
    echo "Registration failed. Please try again.";
  }

  mysqli_stmt_close($stmt);
}

// Close your database connection
mysqli_close($con);
?>