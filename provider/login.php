
<?php
// session_start();


// $login = false;
// $showDanger = false;
//     if($_SERVER['REQUEST_METHOD'] == 'POST'){
//       include 'partials/_dbconn.php';
    
//       $sp_name= $_POST['sp_name'];
//       $password = $_POST['password'];
//       $sp_id =$_POST['sp_id'];

//       $sql = " SELECT * FROM `service_provider` WHERE sp_name = '$sp_name' " ;
//       $result = mysqli_query($conn,$sql);
//       //for record to fetch
//       $num = mysqli_num_rows($result);
//       if($num == 1){
//         while ($row = mysqli_fetch_assoc($result)) {
//           if (password_verify($password,$row['password'])){
//             $login = true;
//             // session start
//             // session_start();
//             $_SESSION['loggedin'] = true;
//             $_SESSION['sp_name'] = $sp_name;
//             $_SESSION['sp_id'] = $sp_id;
//             $_SESSION['service_id'] = $service_id;
            
            
 
  
//             // to redirect the page
//             header("location: welcome.php ");
  
//           }
//           else  {
//             $showDanger = "Invalid Credentials";
//           }
//         }
//           }

//   else  {
//     $showDanger = "Invalid Credentials";
//   }
//  }
        


?>


<?php

session_start();

$login = false;
$showDanger = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconn.php';
    
    $sp_name = $_POST['sp_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `service_provider` WHERE sp_name = '$sp_name'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;

                // Retrieve sp_id and service_id
                $sp_id = $row['sp_id'];
                $service_id = $row['service_id'];

                // Assign values to session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['sp_name'] = $sp_name;
                $_SESSION['sp_id'] = $sp_id;
                $_SESSION['sno'] = $sno;
                $_SESSION['service_id'] = $service_id;
                $_SESSION['user_id'] = $user_id;
                

                // Redirect to welcome.php
                header("location: welcome.php");
                exit;
            } else {
                $showDanger = "Invalid Credentials";
            }
        }
    } else {
        $showDanger = "Invalid Credentials";
    }
}


?>


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
      background-color: #d9dddc;
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
            <form action="/homeservices/provider/login.php" method="post" class="g-3 needs-validation" novalidate> 

            <div class="form-group my-4  col-md-10"> <!--col-md-6  [for small box]-->
          <label for="sp_name" ><b>Name</b> </label>
          <input type="text" class="form-control" id="sp_name" aria-describedby="sp_nameHelp" name="sp_name" required style="border: 1px solid #000;" placeholder="Enter your Name">
          <div class="invalid-feedback">
                Invalid sp_name.
          </div>
          
        </div>
        <div class="my-3  col-md-10">
          <label for="password" ><b>Password</b></label>
          <input type="password" name="password" class="form-control" id="password" required style="border: 1px solid #000;" placeholder="Enter your Password">
          <div class="invalid-feedback">
                Invalid password.
          </div>
          <input type="checkbox" onclick="myFunction()"><small>Show Password </small>
          <br>
          
        </div>
        <!-- <div class="text-center"> -->
        <div class="my-3 col-md-11">
        <button type="submit" class="btn" style="background-color:#435661; color:white; width:200px; font-size:16px; border-radius: 12px; margin-top:12px;">Login</button><br>
        <small><b>Forgot Password?</b> <a href="forgot_password.php" style="color: #435661"><b><u>click here.</u></b></a></small>  
      </div>
    </form>
        </div>
        <!-- right side div -->
    <div id="right" style="float:right; width: 50%; height: 400px; position: relative; color:#f2f2f2; background-color: #fff;">
      <div class="img-with-text">
        <img src="proimglogin.png" style="width:350px; height:350px;">
        <div class="text-center">
        <p>Do not have account? <a href="signup.php" style="color:#435661"><b>Create an account.</b></a></p>
        </div>
      </div>   
    </div>
    <div class="footer-copyright text-center py-0" style="background-color: #ffffff"> All Right Reserved © 2024 Copyright:
    <a href="/homeservices/landingPage.html" style="color: #435661 "><b>SoobinSolutions</b></a>
  </div> 
  </div>

      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
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
  </body>
</html>


