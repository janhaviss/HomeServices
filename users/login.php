<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

<!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">

<!-- awesome font -->
<script src="https://kit.fontawesome.com/351dd8f265.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="styles.css"> -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>OHS</title>

    <style>
    body{
      background-color: #f2f2f2;
    }
        .center {
  box-shadow: 5px 5px;
  border-radius:15px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
  width: 900px;
  height: 450px;
}


.kanit-regular {
  font-family: "Kanit", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.img-with-text {
    text-align: justify;
    width: 450px;
    color:black;
}

.img-with-text img {
    display: block;
    margin: 0 auto;
}

    </style>
</head>
<body>

<!-- LOGIN-php -->
<?php
include "partials/_handlelogin.php";
?>

<?php 
   if($login){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your Logged In.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
   }
   if($showDanger){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid Credentials.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

   }
   
    ?>
    <nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">SoobinSolution</span>
</nav>

    <div class="center" style="background-color: #fff; box-shadow:15px" >
        <div id="over" style="float: left;width: 50%;height: 400px; background-color: #fff;"> 
        <a href="/homeservices/index.php"><i class="fa-solid fa-arrow-left"></i></a>
        <h2 class="kanit-regular" style="margin-top:7px; margin-left:15px;">Login</h2>
            <form action="/homeservices/users/login.php" method="post" class="g-3 needs-validation" novalidate> 

                <div class="form-group my-4 col-md-10"> <!--col-md-6  [for small box]-->
                  <label for="firstname" ><b>User Name</b> </label>
                  <input type="text" class="form-control" id="firstname" aria-describedby="firstnameHelp" name="firstname" required style="border: 1px solid #000;" placeholder="Enter your Username">
                  <div class="invalid-feedback">
                        Invalid firstname.
                  </div>
                </div>
                <div class="my-3 col-md-10">
                  <label for="password" ><b>Password</b></label>
                  <input type="password" name="password" class="form-control" id="password" required style="border: 1px solid #000;" placeholder="Enter your Password">
                  <div class="invalid-feedback">
                        Invalid password.
                  </div>
                  <input type="checkbox" onclick="myFunction()" style="width:10px;"><small style="font-size:14px;">&nbspShow Password </small>
                  <br>
                  
                </div>
                <div class="text-center">
                <button type="submit" class="btn" style="background-color:#febb24; color:black; width:200px; font-size:16px; border-radius: 12px; margin-top:12px;">Login</button><br>
                <small><b>Forgot Password?</b> <a href="forgot_password.php">click here.</a></small>  
              </div>
            </form>
        </div>
    <div id="right" style="float:right; width: 50%; height: 400px; position: relative; color:#f2f2f2; background-color: #fff;">
      <div class="img-with-text">
        <img src="loginimg.png" style="width:450px; height:350px;">
        <div class="text-center">
        <p>Do not have account? <a href="signup.php">Create an account.</a></p>
        </div>
      </div>   
    </div>
    <div class="footer-copyright text-center py-0" style="background-color: #ffffff"> All Right Reserved © 2024 Copyright:
    <a href="/homeservices/landingPage.html" style="color: #FA4364 "> SoobinSolutions</a>
  </div> 
  </div>

      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
  </script>

  <script>
  function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>

  <script>
    function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
    </script>


</body>
</html>