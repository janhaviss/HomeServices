<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="styles_a.css">

    

    <title>Dashbaord</title>
    <style type="text/css">
      .panel-default > .panel-heading {
    color: #333;
    background-color: #fcfcfc;
    border-color: #ddd;
    border-color: rgba(221,221,221,0.85);
}
 
/* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.wrapper{
  width: 95%;
  /* height: 300px; */
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.12);
}
.wrapper header{
  display: flex;
  align-items: center;
  /* background-color:#000; */
  padding: 25px 30px 10px;
  justify-content: space-between;
}
header .icons{
  display: flex;
}
header .icons span{
  height: 38px;
  width: 38px;
  margin: 0 1px;
  cursor: pointer;
  color: #878787;
  text-align: center;
  line-height: 38px;
  font-size: 1.9rem;
  user-select: none;
  border-radius: 50%;
}
.icons span:last-child{
  margin-right: -10px;
}
header .icons span:hover{
  background: #000;
}
header .current-date{
  font-size: 1.45rem;
  font-weight: 500;
}
.calendar{
  padding: 20px;
}
.calendar ul{
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  text-align: center;
}
.calendar .days{
  margin-bottom: 30px;
}
.calendar li{
  color: #333;
  width: calc(100% / 7);
  font-size: 1.20rem;  /* 1.07rem; */
}
.calendar .weeks li{
  font-weight: 600;
  cursor: default;
}
.calendar .days li{
  z-index: 1;
  cursor: pointer;
  position: relative;
  margin-top: 30px;
}
.days li.inactive{
  color: #aaa;
}
.days li.active{
  color: #fff;
}
.days li::before{
  position: absolute;
  content: "";
  left: 50%;
  top: 50%;
  height: 40px;
  width: 40px;
  z-index: -1;
  border-radius: 50%;
  transform: translate(-50%, -50%);
}
.days li.active::before{
  background: #9B59B6;
}
.days li:not(.active):hover::before{
  background: #f2f2f2;
}
</style>
  </head>
  <body>
    <!-- DB connection -->
  <?php
  require 'partials/_dbconn.php';
  ?> 
  
    <section>
    <div class="col-lg-12">
  <div class="card-deck">

    <!-- Visited Patient Card -->
  <?php
$sql = "SELECT * from users";
if ($result = mysqli_query($conn, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    echo' <a href="reportgen_table.php" style="color: #6c757d">
<div class="card text-white bg-secondary mb-3" style="width: 10.9rem; height:12rem;">
  <div class="card-header"><i class="fa-solid fa-hospital-user" style="color: #f5f9ff;"></i></div>
  <div class="card-body">
    <h5 class="card-title">Users</h5>
    <p class="card-text">Total: ' . $rowcount .'</p>
  </div>
</div> </a>';
}
?>

<!-- Users Card-->
<?php
$sql = "SELECT * from service_provider";
if ($result = mysqli_query($conn, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
 echo'<a href="userupdate_table.php" style="color: #dc3545">
 <div class="card text-white bg-danger mb-3" style="width: 10.9rem; height:12rem;">
  <div class="card-header"><i class="fa fa-user-plus" aria-hidden="true"></i></div>
  <div class="card-body">
    <h5 class="card-title">Providers</h5>
    <p class="card-text">Total: ' . $rowcount .'</p>
  </div>
</div></a>';
}
?>

<!-- Lab appoinment card -->
<?php
$sql = "SELECT * from comments";
if ($result = mysqli_query($conn, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    echo'<a href="apt_management.php" style="color:#ffc107">
<div class="card text-white bg-warning mb-3" style="width: 10.9rem; height:12rem;">
  <div class="card-header"><i class="fa-solid fa-flask" style="color: #f2f6fc;"></i></div>
  <div class="card-body">
    <h5 class="card-title">Comments</h5>
    <p class="card-text">Total: ' . $rowcount .'</p>
  </div>
</div></a>';
}
?>

<?php
$sql = "SELECT * from booking";
if ($result = mysqli_query($conn, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    echo' <a href="reportgen_table.php" style="color: #6c757d">
<div class="card text-white bg-secondary mb-3" style="width: 10.9rem; height:12rem;">
  <div class="card-header"><i class="fa-solid fa-hospital-user" style="color: #f5f9ff;"></i></div>
  <div class="card-body">
    <h5 class="card-title">Bookings</h5>
    <p class="card-text">Total: ' . $rowcount .'</p>
  </div>
</div> </a>';
}
?>
</div>
</div>
</section>


<hr>
<!-- calendar -->
<div class="card-deck" style= "margin-right: 100px; margin-left: 100px">
    <div class="wrapper ml-3">
      <header>
        <p class="current-date"></p>
        <div class="icons">
          <span id="prev" class="material-symbols-rounded">chevron_left</span>
          <span id="next" class="material-symbols-rounded">chevron_right</span>
        </div>
      </header>
      <div class="calendar">
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days"></ul>
      </div>
    </div>
  
    
</div>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="calendar.js" defer></script>
  </body>
</html>