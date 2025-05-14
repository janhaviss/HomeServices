<?php
  include 'partials/_dbconn.php';
  $showAlert = false;
  $showDanger = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = $_POST['firstname'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    //phone one please try to fetch noworking

    $existSql = "SELECT * FROM `users` WHERE phone= '$phone' ";
    $result= mysqli_query($conn,$existSql);
 
    $numExistsRows = mysqli_num_rows($result);
    if ($numExistsRows > 0 ){
        // $exists = true;
        $showDanger = "This Moblie number is already registerd ";
    }
    else {

      
        $exists = false;
        if(($password == $cpassword)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
      
        $sql = "INSERT INTO `users` ( `firstname`, `lastname`, `phone`, `state`, `city`, `zip`,`email`, `password`, `address`, `timestamp`) VALUES ('$firstname', '$lastname', '$phone', '$state', '$city','$zip','$email', '$hash', '$address', current_timestamp()); ";
        
        $result = mysqli_query($conn,$sql);

        if($result){
            $showAlert = true;
          }
      
      }
      else {
        $showDanger = "Incorrect Password.";
      }
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
      background-color: #487f78;
    }
        .center {
  box-shadow: 5px 5px;
  border-radius:15px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
  width: 950px;
  height: 630px;
}

#message {
  display:none;
  color: #000;
  position: relative;
  padding: 10px;
  line-height: 1pt;
}

#message p {
  /* padding: 10px 35px; */
  font-size: 10px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
  
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.img-with-text {
    text-align: center;
    width: 450px;
    color:black;
}

.img-with-text img {
    display: block;
    margin: 0 auto;
}

.kanit-regular {
  font-family: "Kanit", sans-serif;
  font-weight: 400;
  font-style: normal;
}


        </style>
        </head>

<body>

  

  <?php  
   if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your Account Is Created. You can now <a href="login.php"> login </a>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
   }
   if($showDanger){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '. $showDanger.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

   }
   
    ?>

<div class="center" style="background-color: #fff; box-shadow:15px" >
        <div id="over" style="float: left;width: 50%;height: 550px; background-color: #fff;"> 
        <a href="/index.html"><i class="fa-solid fa-arrow-left"></i></a>
        <h2 class="kanit-regular" style="margin-top:7px; margin-left:15px;">SignUp: <small style="font-size:20px;"> Enter User details below</small></h2>
        <form action="/homeservices/users/signup.php" method="post" class="g-3 needs-validation" novalidate>
        <div class="form-group my-4 ml-4">

        <div class="row gx-3 mb-2">
        <div class="col-md-5">
            <label for="firstname">First Name </label>
            <input type="text" maxlength="20" class="form-control" id="firstname" aria-describedby="firstnameHelp"
              name="firstname" required style="border: 2px solid #ccc" placeholder="FirstName">
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          <div class="col-md-5">
            <label for="lastname">Last Name </label>
            <input type="text" maxlength="20" class="form-control" id="lastname" aria-describedby="lastnameHelp"
              name="lastname" required style="border: 2px solid #ccc;" placeholder="LastName">
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        </div> <!--row gx-3....closed-->
        <div class="row gx-3 mb-1">
        <div class="form-group md-3 col-md-10">
            <label for="email">Email </label>
            <input type="email" class="form-control" id="email" name='email' required style="border: 2px solid #ccc;" placeholder="Enter your correct Email">
            <div class="invalid-feedback">
              Please provide a valid email.
            </div>
          </div>
</div>
<div class="row gx-3 mb-1">
        <div class="form-group md-4 col-md-10">
            <label for="address">Address </label>
            <input type="text" class="form-control" id="address"  name='address' required style="border: 2px solid #ccc;" placeholder="Enter your Address">
            <div class="invalid-feedback">
              Please provide a valid address.
            </div>
          </div>
</div>
          <div class="form-row">
          <div class="form-group col-md-6">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" required style="border: 2px solid #ccc" placeholder="City">
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>

            <div class="form-group col-md-4">
              <label for="zip">Pin Code</label>
              <input type="text" class="form-control"  name ="zip" id="zip" pattern="^[1-9][0-9]{5}$" style="border: 2px solid #ccc;" placeholder="Pincode">
            <div class="invalid-feedback">
              Please provide a valid Pin.
            </div>
          </div>
          </div>
          <!--form row closed-->
          <div class="form-row">
          <div class="form-group col-md-6">
              <label for="state">State</label>
              <select id="state" class="form-control"  name="state" required style="border: 2px solid #ccc;" placeholder="Select your State">
                <option> </option>
                <option>Maharastra</option>
                <option>Delhi</option>
                <option>Kerla</option>
                <option>Goa</option>
                <option>Uttar Pradesh</option>
              </select>
              </div>
              <div class="col-md-4">
               <label for="phone">Phone </label>
              <input type="text" class="form-control" id="phone" name='phone' pattern="[1-9]{1}[0-9]{9}" required style="border: 2px solid #ccc;" placeholder="Mobile Number">
                <div class="invalid-feedback">
                 Please provide a valid Phone Number.
                </div>
</div>
</div>
            
</div><!--form grp closed-->
</div>

<div id="right" style="float:right; width: 50%; height: 550px; position: relative; background-color: #fff;">
<div class="img-with-text">
<img src="signupimg.png" style="width:250px; height:250px;">
<div class="form-group my-2">

  <div class="md-3 col-md-11 mb-2">
            <!-- <label for="password">Password</label> -->
            <input
              type="password"
              maxlength="20"
              name="password"
              class="form-control"
              id="password"
              style="border: 2px solid #ccc;"
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
              required
              placeholder="Enter your Password"
              >
              <div id="message">
              <p>Password must contain the following:</p>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
              </div>
            <div class="md-3 col-md-11">
              <!-- <label for="cpassword">Confirm Password</label> -->
              <input type="password" name="cpassword" class="form-control" id="cpassword" required style="border: 2px solid #ccc;" placeholder="Confirm your password">
              <div id="cpasswordError" class="form-text"><small>Write the same password written above.</small></div>
            </div>
</div><!--form grp closed-->
<div class="text-center">
            <button type="submit" class="btn" style="background-color: #28d6b8; color:#000; width:300px; font-size:16px; border-radius: 12px; margin-top:20px;">SignUp</button>
          </div>
          <small>Already have account? <a href="login.php" style="color: #28d6b8 ">login</a></small>
</form>

</div>


</div>

<div class="footer-copyright text-center py-1 margin-bottom:10px;" style="background-color: #fff"> All Right Reserved © 2024 Copyright:
    <a href="/landingPage.html" style="color: #28d6b8 "> SoobinSolutions</a>
  </div> 
</div> <!--main center civ closed-->

<!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
  </script>

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
  var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
</body>

</html>
</body>
</html>