<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<?php
// $path="<script type='text/javascript'> 
// window.location.href='/provider/updateProfile.php' 
// </script>";
 
?>
  <?php
require 'partials/_dbconn.php';

// Starting the session, necessary
// for using session variables
session_start();
if (isset($_SESSION['sp_name'])){
    $sp_name = $_SESSION['sp_name'];
      $sql = "SELECT * FROM `service_provider` WHERE sp_name = '$sp_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $sp_name = $row['sp_name']; 
      $occupation = $row['occupation'];
      // $gender = $row['gender']; 
      // $email = $row['email'];
      $state = $row['state'];
      $phone= $row['phone'];
      $city = $row['city'];
    

echo'
    <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <form action="updateProfile.php" method="">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          
            <img src="profile.png" alt="avatar" style="width: 72px; height:72px;">
              <class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">' . $sp_name .'</h5>
            <p class="text-muted mb-1">' . $occupation .'</p>
            <p class="text-muted mb-4">' . $city .'</p>
            <div class="d-flex justify-content-center mb-2">
              <button type="submit" class="btn btn-primary" id="updateProfile" onclick="updateProfile.php">Update</button>
            </div>
            
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $sp_name .'</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">example@example.com</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $phone .'</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">City</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $city .'</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">State</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">' . $state .'</p>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>';
} else {
  echo "User not found."; // Handle the case when the user is not found in the database.
}
}
else {
echo "name not found in the session.";}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>