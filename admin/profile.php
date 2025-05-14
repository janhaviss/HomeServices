<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="http://localhost/pathology//user/styles.css"/> -->
   <style type=text/css>
    #you {
   font-size: 6em !important;
 }
 #cardp{
  margin-top:65px;
  display: inline-flex;
    justify-content: center;
    align-items: center;
  background-color:#BFD5B9;
  box-shadow: 5px 5px #000;
 }


 </style>
</head>
<body>
  <!-- db connection -->
<?php
require 'partials/_dbconn.php';

 
// Starting the session, necessary
// for using session variables
session_start();
if (isset($_SESSION['admin_name'])){
    $admin_name = $_SESSION['admin_name'];
      $sql = "SELECT `admin_id`, `admin_name`, `password` FROM `admin` WHERE admin_name = '$admin_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $admin_name = $row['admin_name']; 
      $admin_pass = $row['password'];
      $sno = $row['admin_id'];
      

echo'<div class="container d-flex justify-content-center>
    <div class="card p-3 py-4" id="cardp" style="width:650px; height:350px;">
        <div class="text-center"> 
		<i class="fa fa-user" aria-hidden="true" id="you" class="rounded-circle"></i>
            <h3 class="mt-2">'.$admin_name.'</h3>
			<span class="mt-1 clearfix">Administrator</span>
			
			<div class="row mt-3 mb-3">
			
			  <div class="col-md-5">
				<h5>Join date</h5>
				<span class="num">10 August 2023</span>
			  </div>
			  <div class="col-md-6">
			  <h5>Email</h5>
				<span class="text">soobinsolutions@gmail.com</span>
			  </div>
			
			</div>
			
			<hr class="line">
			
			<small class="mt-4">Welcome '.$admin_name.' to The Patho Lab. Please provide our users with best experiences</small>
               </div>
    </div>
</div>';
    } else {
        echo "User not found."; // Handle the case when the user is not found in the database.
      }
    }
    else {
      echo "Username not found in the session.";}
    ?>
</body>
</html>
