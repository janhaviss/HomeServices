<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Forgot Password</title>
    <style>
      fieldset {
      background-color: #a2d0ca;
      border: 2px solid grey;
      border-radius: 10px ;
      background-size: cover; 
      height: 480px;
     /* background-repeat: no-repeat; #487f78*/
      }

      legend {
      background-color:#a2d0ca;
      color:#000;
      padding: 5px 10px;
      display: block;
      padding-left: 2px;
      padding-right: 2px;
      border:2px solid grey;
      border-radius: 5px;
      width: auto;
      
    }
    </style>
  </head>
  <body style="background: #fdf2e7;"> 
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mb-0 h1" href="/users/login.php">soobinsolutions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
<!-- <?php
 //require 'partials/_navbar.php';
?>  -->
<?php
// connection
require 'partials/_dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  
  // Retrieve the firstname associated with the provided email
  $sql = "SELECT firstname FROM users WHERE email='$email'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstname = $row["firstname"];
    
    // Generate a random password
    $newPassword = substr(md5(time()), 0, 8);

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the users's password in the database
    $sql = "UPDATE users SET password='$hashedPassword' WHERE email='$email'";

    
}

if ($conn->query($sql) === TRUE) {
  // Send the new password to the users's email address
  $to = $email;
  $subject = "Password Reset Request";
  $message = "
  
  Dear $firstname,

  We have received a request to reset your password for your account at SoobinSolutions.

  To complete the password reset process, please follow the instructions below:

  Your Email: $email
  New Password: $newPassword
  You can use this new password to log in to your account. We recommend changing your password to something more memorable after logging in.

  If you did not request a password reset, please disregard this email. Your account remains secure.

  Thank you for choosing SoobinSolutions.

  Sincerely,
  The SoobinSolutions Team
  ";
  $headers = "From: thepatholabmj@gmail.com"; 

  // Use a working SMTP server to send the email
  if (mail($to, $subject, $message, $headers)) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Password reset mail is already set. Please check your email for the new password. please <a href='login.php'> login </a>.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  } else {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Email sending error.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
} else {
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Error!</strong> Error updating password: " . $conn->error;"
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
} else {
echo "
<div class='alert alert-info alert-dismissible fade show' role='alert'>
    <strong>Notice!</strong> No users found with the provided email address.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
";
}
?>
<!-- for mail part -->


  <!-- Password Reset form -->
<div class="container my-3 ">
    <fieldset class='col-md-6 container-fluid'>
      <legend>&nbsp; Password Reset &nbsp;</legend>
    
    <!-- After clicking on btn where it will go is the path in actions -->
      <form action="/homeServices/users/forgot_password.php" method="post" class="g-3 needs-validation" novalidate > 
      <div class="form-group my-4 "> <!--col-md-6  [for small box]-->
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" aria-describedby="firstnameHelp" name="email" required style="border: 1px solid #000;">
            <small>Write the same email filled during registration.</small><br>
            <small><mark style="color:red"><b>Note:</b></mark><br>
                You will soon receive an email at the provided email address containing a newly generated password.<br>
                We kindly request that you use this new password when logging in. Your security is important to us, and this password reset ensures the safety of your account.
                <br>
                If you have any further questions or need assistance, please feel free to <a href="/homeServices/index.php">contact us</a>.<strong> Thank you for choosing our services!</strong></small>
            <div class="invalid-feedback">
              Invalid email.
            </div>
          </div>
          <div class="text-center">
          <button type="submit" class="btn" style="background-color:#487f78; color:white; width:150px; font-size:16px; border-radius: 12px;">Reset Password</button>

          <hr>
          <small>Do not have an account? <a href="signup.php">Create an account.</a></small>
</div>
        </form>
    </div>
    <br>
    </fieldset>

    <!-- footer -->
    <?php
    require 'partials/_footer.php';
  ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>