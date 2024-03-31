<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION['registration_success']) && $_SESSION['registration_success'] == true) {
  echo '<script>alert("Your account is created now login here.");</script>';
  unset($_SESSION['registration_success']); // Clear the session variable
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodhub";

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $raw_password = $_POST['password']; // Password in plain text

  $query = "SELECT id, password, role FROM user WHERE email = ?";

  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['password'];

    // Verify the password using password_verify
    if (password_verify($raw_password, $stored_password)) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_role'] = $row['role']; // Store user role in session

      // Set a session variable to indicate successful login
      $_SESSION['login_success'] = true;

      header("Location: dashboard.php");
      exit();
    } else {
      echo "<h4>Invalid login credentials.</h4>";
    }
  } else {
    echo "<h4>User not found.</h4>";
  }
}

mysqli_close($con);

?>



<!doctype html>
<html lang="en">

<head>
  <!-- Meta Links -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Project Title -->
  <title>Login</title>
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

  <div class="row" id="login-page">
    <div class="col-12 col-md-6">
      <section>
        <article>
          <div id="imageContainer">
            <img id="mainImage" src="images/login_image_1.jpg" class="img-fluid">
          </div>
        </article>
      </section>
    </div>
    <div class="col-12 col-md-6">
      <section>
        <article>
          <section>
            <article>
              <h2 class="FarmFocusOnline">Welcome to BloodHub</h2>
              <p class="login">Login to support the BloodHub, connect with donors, and access valuable resources for blood donation.</p>


              <div class="login-form">
                <form action="login.php" method="post" onsubmit="submitForm()">
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" required>
                  </div>
                  <div class="mb-3 position-relative">
                    <input type="password" id="exampleInputPassword1" required class="form-control" name="password" placeholder="Password" maxlength="20" required>
                    <div class="eye-icon">
                      <i class="fas fa-eye" id="togglePassword"></i>
                    </div>
                  </div>
                  <div class="login-btn">
                    <button type="submit" class="login-button">Login</button>
                  </div>
                </form>


              </div>

              <div class="new-here">
                <p class="New here?">New here? Click below to create your account and start exploring our website</p>
              </div>

              <div class="click-here">

                <a href="sign.php" class="click-here">
                  <p class="click-here-a">Click here to open your account</p>
                </a>

              </div>

            </article>
          </section>
        </article>
      </section>
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script>
    // image change code 

    let images = ['images/login_image_3.jpg', 'images/login_image_2.jpg', 'images/login_image_1.jpg', ];
    let imageIndex = 0;

    function changeImage() {
      const currentImage = document.querySelector('#mainImage');
      currentImage.classList.remove('visible');
      currentImage.classList.add('hidden');
      setTimeout(() => {
        currentImage.src = images[imageIndex];
        currentImage.classList.remove('hidden');
        currentImage.classList.add('visible');
        imageIndex = (imageIndex + 1) % images.length;
      }, 1000);
    }

    setInterval(changeImage, 3000);

    // login message code 

    function submitForm() {
      let email = document.querySelector('#exampleInputEmail1');
      let password = document.querySelector('#exampleInputPassword1');

      if (email.value.trim() === '' || password.value.trim() === '') {
        alert('Oops! It seems you forgot to fill in your details. Please provide both email and password.');
      } else {
        // alert('🎉 Congratulations! Login Successful. Welcome to FarmFocusOnline! 🚜🌾');
      }
    }

    // Password eye icon

    const passwordInput = document.querySelector('#exampleInputPassword1');
    const togglePassword = document.querySelector('#togglePassword');

    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
    });
  </script>

</body>

</html>