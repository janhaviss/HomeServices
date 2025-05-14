<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://localhost/pathology//user/styles.css"/>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">SoobinSolutions</span>
</nav>
    <!-- navbar end -->
  <!-- db connection -->
  <?php
require 'partials/_dbconn.php';

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $zip= $_POST['zip'];
    
  $query = "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname',
 `city`='$city', `state`='$state',`phone`='$phone',`zip`='$zip',`email`='$email',`address`='$address'
                  WHERE `users`.`firstname` = '$firstname'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                ?>
                 <script type="text/javascript">
        alert("Update Successfull.");
        window.location = "profileupdate.php";
    </script>
    <?php
         }
                      

// Starting the session, necessary
// for using session variables
session_start();
if (isset($_SESSION['firstname'])){
    $firstname = $_SESSION['firstname'];
      $sql = "SELECT * FROM `users` WHERE `firstname` = '$firstname'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $firstname = $row['firstname']; 
      $lastname = $row['lastname'];
      $address = $row['address']; 
      $email = $row['email'];
      $state = $row['state'];
      $phone= $row['phone'];
      $city = $row['city'];
      $zip= $row['zip'];

echo'

<hr class="mt-0 mb-4">
    <div class="row">

        <div class="col-xl-8" style="background-color:#f2f2f2; box-shadow: 10px 10px 5px grey; position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 10px;">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header"><strong>Account Details</strong></div>
                <div class="card-body">
                <form action="profileupdate.php" method="post">
                        <!-- Form Group (username)-->
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text" name="firstname" placeholder="Enter your full name" value=' . $firstname .'>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">lastname</label>
                                <input class="form-control" id="inputLastName" type="text" name="lastname" placeholder="Enter your lastname" value="' . $lastname .'">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                  
                            <div class="col-md-6">
                                <label class="small mb-1" for="city">City</label>
                                <input class="form-control" id="city" type="text" name="city" placeholder="Enter your city" value="' . $city .'">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="state">State</label>
                                <input class="form-control" id="state" type="text" name="state" placeholder="Enter your state" value="' . $state .'">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Phone</label>
                                <input class="form-control" id="phone" type="text"  name="phone" placeholder="Enter your phone" value="' . $phone .'">
                            </div>
                            <div class="col-md-6">
                            <label class="small mb-1" for="zip">Zip</label>
                            <input class="form-control" id="zip" type="text"  name="zip" placeholder="Enter your zip" value="' . $zip .'">
                        </div>
                        </div>
                        <div class="row gx-3 mb-3">
                  
                            <div class="col-md-6">
                                <label class="small mb-1" for="address">Address</label>
                                <input class="form-control" id="address" type="text" name="address" placeholder="Enter your adresss" value="' . $address .'">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control" id="email" type="text" name="email" placeholder="Enter your email" value="' . $email .'">
                            </div>
                            <!-- Form Group (location)-->
                           
                        </div>
                        <!-- Form Group (email address)-->
                        <!-- Save changes button-->
                        <div class="text-center">
                        <button class="btn" style="background-color:#151c48; color:white; width:150px; font-size:16px; border-radius: 12px;" type="submit" name="submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
   ';
    } else {
        echo "User not found."; // Handle the case when the user is not found in the database.
      }
    }
    else {
      echo "Username not found in the session.";}
    ?>

<div class="footer-copyright text-center py-0 fixed-bottom" style="background-color: #f2f2f2"> All Right Reserved © 2024 Copyright:
    <a href="/landingPage.html" style="color: #FA4364 "> SoobinSolutions</a>
  </div> 
</body>
</html>


            