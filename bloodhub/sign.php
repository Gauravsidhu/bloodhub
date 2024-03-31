<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Links -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Project Title -->
  <title>Sign Up</title>
  <!-- Ttitle Logo -->
  <link rel="shortcut icon" href="images/bloodhub_icon.png" type="image/x-icon">
  <!-- Bootstrap Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Project Css -->
  <link rel="stylesheet" href="stylesheet/bloodhub.css">
  <!-- Eye icon link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" />

</head>

<body id="sign">

  <div class="row">

    <div class="col-12">

      <section>

        <article>

          <div class="welcome-message">
            <h2 class="Welcome">Welcome to Blood Hub!</h2>
            <p class="Discover">Discover available blood donations, connect with donors, and access valuable resources for your healthcare journey.</p>
            <p class="Fill">Fill in your details below to sign up:</p>
          </div>

        </article>

      </section>

    </div>

  </div>

  <div class="row">

    <div class="col-12">

      <form action="sign_ins.php" method="post" class="sign-form">

        <div class="mb-3">
          <input type="text" class="form-control" id="fname" name="firstname" placeholder="First name" required>
        </div>

        <div class="mb-3">
          <input type="text" class="form-control" id="lname" name="lastname" placeholder="Last name" required>
        </div>

        <div class="mb-3">
          <input type="email" class="form-control" id="mail" name="email" placeholder="Email Address" required>
        </div>

        <div class="mb-3">
          <select class="form-control" id="user-roles" name="role" required>
            <option value="">Select Role</option>
            <option value="hospital">Hospital User</option>
            <option value="normal_user">Normal User</option>
          </select>
        </div>


        <div class="mb-3">
          <input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required>
          <div class="sign-icon">
            <i class="fas fa-eye" id="togglePassword"></i>
          </div>
        </div>

        <div class="mb-3">
          <input type="text" class="form-control" id="add" name="address" placeholder="Address" required>
        </div>

        <div class="sign-btn">
          <button type="submit" class="login-button">Sign Up</button>
        </div>

      </form>

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
    // Password eye icon

    document.addEventListener('DOMContentLoaded', () => {
      const passwordInput = document.querySelector('#pswd'); // Updated ID to match the input field
      const togglePassword = document.querySelector('#togglePassword');

      togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
      });
    });
  </script>

</body>

</html>