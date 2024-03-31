<?php
session_start();

// Check if the login was successful
if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
  // Display success message
  echo '<script>alert("🎉 Congratulations! You have successfully logged in.");</script>';

  // Reset the session variable to avoid displaying the message again on page refresh
  $_SESSION['login_success'] = false;
}

if (!isset($_SESSION['user_id'])) {
  // User is not logged in, redirect to login.php
  header("Location: login.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Links -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Project Title -->
  <title>Blood hub</title>
  <!-- Ttitle Logo -->
  <link rel="shortcut icon" href="images/bloodhub_icon.png" type="image/x-icon">
  <!-- Bootstrap Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Project Css -->
  <link rel="stylesheet" href="stylesheet/bloodhub.css">
  <!-- Eye icon link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" />

</head>

<body>


  <header>
    <div class="row">
      <div class="col-12">
        <section>
          <article>
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php">Blood Hub</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="dashboard.php">
                        <p class="dashboard_home">Home</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="blood_info.php">
                        <p class="dashboard_link">Blood Info</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="available_samples.php">
                        <p class="dashboard_link">Available Blood Samples</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <p class="dashboard_link">Contact Us</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <p class="dashboard_link"><?php
                                                  // Database connection parameters
                                                  $servername = "localhost";
                                                  $username = "root";
                                                  $password = "";
                                                  $dbname = "bloodhub";

                                                  // Connect to the database
                                                  $con = mysqli_connect($servername, $username, $password, $dbname);

                                                  // Check if the connection is successful
                                                  if (!$con) {
                                                    die("Connection failed: " . mysqli_connect_error());
                                                  }

                                                  // Check if the user ID is set in the session
                                                  if (isset($_SESSION['user_id'])) {
                                                    // Retrieve the user ID from the session
                                                    $userId = $_SESSION['user_id'];

                                                    // Prepare SQL SELECT statement to fetch user's first name
                                                    $query = "SELECT firstname FROM user WHERE id = ?";
                                                    $stmt = mysqli_prepare($con, $query);

                                                    // Bind parameters and execute the statement
                                                    mysqli_stmt_bind_param($stmt, "i", $userId);
                                                    mysqli_stmt_execute($stmt);
                                                    mysqli_stmt_bind_result($stmt, $firstname);

                                                    // Fetch the result
                                                    if (mysqli_stmt_fetch($stmt)) {
                                                      // Display the user's first name
                                                      echo "Welcome, $firstname!";
                                                    } else {
                                                      // User not found
                                                      echo "User not found";
                                                    }

                                                    // Close the statement
                                                    mysqli_stmt_close($stmt);
                                                  } else {
                                                    // User ID not set in session
                                                    echo "User ID not set in session";
                                                  }

                                                  // Close the database connection
                                                  mysqli_close($con);
                                                  ?></p>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </article>
        </section>
      </div>
    </div>
  </header>

  <div class="row">
    <div class="col-12">
      <section>
        <article>
          <div class="request-form">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </article>
      </section>
    </div>




  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>