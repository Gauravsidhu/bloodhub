<?php
session_start();

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
  <title>Blood Info</title>
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
                        <p class="dashboard_blood">Blood Info</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="available_samples.php">
                        <p class="dashboard_requests">Requests</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="view_requests.php">
                        <p class="dashboard_view">View requests</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="contact.php">
                        <p class="dashboard_contact">Contact Us</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">
                        <p class="dashboard_name"><?php
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
                                                  ?>
                        </p>
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

  <div class="container-fluid">

    <div class="row" id="contact-row">
      <div class="col-12">
        <div class="contact-heading">
          <h3 class="Contact">Contact Us</h3>
        </div>
        <div class="contact-content">
          <p class="If you want">If you want to ask any questions you can contact me</p>
        </div>
      </div>
    </div>

    <div class="row" id="contact-row">
      <div class="col-12">
        <div class="contact-form">
          <form action="contact.php" method="post">

            <div class="mb-3">

              <input type="text" class="form-control contact" name="firstname" aria-describedby="emailHelp" required placeholder="First name">
            </div>
            <div class="mb-3">

              <input type="text" class="form-control contact" name="lastname" aria-describedby="emailHelp" required placeholder="Last name">
            </div>
            <div class="mb-3">

              <input type="email" class="form-control contact" name="email" aria-describedby="emailHelp" required placeholder="Email">
            </div>
            <div class="mb-3">

              <input type="tel" class="form-control contact" name="number" aria-describedby="emailHelp" required placeholder="Mobile Number">
            </div>
            <div class="contact-form">
              <button type="submit" class="btn btn-primary contact-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="row">
      <div class="col-12">
        <section>
          <article>
            <div class="row">
              <div class="col-12">
                <div class="footer-journey">
                  <h4 class="footer-journey">Blood Hub</h4>
                  <p class="embark">Experience a lifeline of hope with Blood Bank</p>
                  <div class="footer-icons">
                    <button type="button" class="btn btn-outline-primary" onclick="alert('Sorry try later')"><img src="images/facebook-logo.png" alt="facebook-logo" class="facebook-logo"></button><button type="button" class="btn btn-outline-primary" onclick="alert('Sorry try later')"><img src="images/insta.webp" alt="insta-logo" class="insta-logo"></button><button type="button" class="btn btn-outline-primary" onclick="alert('Sorry try later')"><img src="images/linkdin-logo.png" alt="linkdin-logo" class="linkdin-logo"></button><button type="button" class="btn btn-outline-primary" onclick="alert('Sorry try later')"><img src="images/twitter.png" alt="linkdin-logo" class="linkdin-logo"></button>
                  </div>
                  <div class="footer-copyright">
                    <p class="Copyright">Copyright ©2024 All rights reserved</p>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </section>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 

</body>


</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bloodhub";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $stmt = $conn->prepare("INSERT INTO contact (firstname, lastname, email, number) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $firstname, $lastname, $email, $number);

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $number = $_POST['number'];

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>