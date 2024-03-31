<?php
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
  $blood_type = $_POST['blood_type'];
  $blood_text = $_POST['blood_text'];

  $query = "INSERT INTO blood_info (blood_type, blood_text) VALUES (?, ?)";

  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, "ss", $blood_type, $blood_text);

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['blood_info_success'] = true;
    header("Location: blood_info.php"); // Redirect to success page
    exit();
  } else {
    echo "Failed to add blood information";
  }

  mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>