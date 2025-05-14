<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

     <!-- awesome font -->
     <script
      src="https://kit.fontawesome.com/351dd8f265.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <title>Services</title>
    <style>

      body{

        background-color:#487f78;
      }
/* CARD FOR THE SUB-SERVICES */
      /* CARDS */

      .cards {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .card {
        margin: 20px;
        padding: 20px;
        width: 500px;
        min-height: 200px;
        display: grid;
        grid-template-rows: 20px 50px 1fr 50px;
        border-radius: 10px;
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
        transition: all 0.2s;
      }

      .card:hover {
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
        transform: scale(1.01);
      }

      .card__link,
      .card__exit,
      .card__icon {
        position: relative;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.9);
      }

      .card__link::after {
        position: absolute;
        top: 25px;
        left: 0;
        content: "";
        width: 0%;
        height: 3px;
        background-color: rgba(255, 255, 255, 0.6);
        transition: all 0.5s;
      }

      .card__link:hover::after {
        width: 100%;
      }

      .card__exit {
        grid-row: 1/2;
        justify-self: end;
      }

      .card__icon {
        grid-row: 2/3;
        font-size: 30px;
      }

      .card__title {
        grid-row: 3/4;
        font-weight: 400;
        color: #ffffff;
      }

      .card__apply {
        grid-row: 4/5;
        align-self: center;
      }

      /* CARD BACKGROUNDS */

      .card-1 {
        background: radial-gradient(#1fe4f5, #3fbafe);
      }

      .card-2 {
        background: radial-gradient(#fbc1cc, #fa99b2);
      }

      .card-3 {
        background: radial-gradient(#76b2fe, #b69efe);
      }

      .card-4 {
        background: radial-gradient(#60efbc, #58d5c9);
      }

      .card-5 {
        background: radial-gradient(#f588d8, #c0a3e5);
      }

      /* RESPONSIVE */

      @media (max-width: 1600px) {
        .cards {
          justify-content: center;
        }
      }
/* CARD FOR THE SUB-SERVICES - END */

/* jumbotron  start*/
.jumbotron{
  background-image: linear-gradient( 174.2deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );

box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.2s;

  border-radius: 15px;
}
/* jumbotron  end*/

.seven h3 {
    text-align: center;
        font-size:30px; font-weight:300; color:#222; letter-spacing:1px;
        text-transform: uppercase;
    font-weight: bold;
        display: grid;
        grid-template-columns: 1fr max-content 1fr;
        grid-template-rows: 27px 0;
        grid-gap: 20px;
        align-items: center;
        color:white;
    }
    
    .seven h3:after,.seven h3:before {
        content: " ";
        display: block;
        border-bottom: 2px solid #487f78;
        border-top: 2px solid #487f78;
        height: 5px;
      background-color:#f8f8f8;
    }
    </style>
  </head>
  <body>

  <!-- <div style ="background-color: #487f78;"> -->

  <?php
      // connection
      include 'partials/_dbconn.php'; 
    ?>

    <?php
    //header
    // include 'partials/_navbar.php';
    ?>


    <?php
      $id = $_GET['serviceid'];
      $sql = "SELECT * FROM `services` WHERE `service_id` = $id";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $services_name = $row['services_name'];
        $services_desc = $row['services_desc'];

      }
    ?>


<!-- comment -->
<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    if($method == 'POST'){
      // insert into db
      $comment =$_POST['comment'];
    
      $sql =" INSERT INTO `comments` ( `comment_content`, `service_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '0', current_timestamp())";

      $result = mysqli_query($conn, $sql);
      $showAlert = true;
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Comment has been added!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

      }
    }
    ?>

    <!-- background-color: #8BC6EC;
background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%); -->
<div>
     <div class="container my-3" >
     <div class="jumbotron " >
      <div class="container">
        <h1 class="display-4"><?php echo $services_name ;?></h1>
        <p class="lead"><?php echo $services_desc  ;?></p>
      </div>
    </div>
     </div>
    
</div>
    <hr>


    <div >


    <div class="" >
    <div class="container my-3">
     
    <div class="seven">
    <h3 class="my-3" style="text-align: center;">Services</h3>
  </div>
     <div class="row">
    <?php

      $sql = "SELECT * FROM `sub_services` WHERE `fk_service_id` = $id";
      
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $subservices_name = $row['subservices_name'];
        $subservice_desc = $row['subservice_desc'];


        // Array of CSS class names for background colors
      $bgClasses = ['card-1', 'card-2', 'card-3', 'card-4', 'card-5'];
        // Randomly select a class name from $bgClasses
       $bgClass = $bgClasses[array_rand($bgClasses)];

       echo '

      <div class="cards">
    <div class="card card '.$bgClass.'">
      <div class="card__icon"><i class="fas fa-bolt"></i></div>
      <p class="card__exit"><i class="fa-solid fa-thumbtack"></i></p>
      <h2 class="card__title">'.$subservices_name .'</h2>
      <p class="card__apply">
        <a  style= "color: black" class="card__link" href="sub_servicesBooking.php?subservices_name=' . $subservices_name .'">Browse <i class="fas fa-arrow-right"></i></a>
      </p>
    </div>
    </div>

      
  ';

     }
    ?>

  </div>
  </div>
  </div>

  </div>


  <div style="background-color:#fff">
  <hr style=" border: 0;height: 1px;background-color: #ccc; margin: 20px 0;">


  <!-- comment -->

  <?php
// this means if you are logged in then and then only you can post comment
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == True){    
    echo'
    <div class="container">
    <h2 class="py-2">Post a comment</h2>
    <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
      <div class="form-group">
    <label for="desc">Type Your Comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="1" Required></textarea>
    <input type="hidden" name="comment_id" value="'.$_SESSION['comment_id'].'">
  </div>
      <button type="submit" class="btn btn-success">Post Comment</button>
    </form>

    </div>
';
  }
  // else this part will be shown
  else{
    echo '<div class="container">
    <h2 class="py-2">Post a comment</h2>
     <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">You are not logged in! Please Login to post comments</li>
  </ol>
</nav>
    </div>';
  }
?>

    <div class="container">
    <?php
      $id = $_GET['serviceid'];
      $sql = "SELECT * FROM `comments` WHERE service_id = $id";
      $result = mysqli_query($conn, $sql);
      $noResult = true;
      while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
          $id = $row['comment_id'];
          $content = $row['comment_content'];
          $comment_time = $row['comment_time'];

          $comment_by=$row['comment_by'];

          $sql2 = "SELECT firstname FROM `users` WHERE user_id = '$comment_by' ";
          $result2 = mysqli_query($conn, $sql2);
          $row2=mysqli_fetch_assoc($result2);
          

          
          echo '<div class="media my-3">
            <img src="img/defaultProfile.jpg" width="54px" class="mr-3" alt="default profile">
            <div class="media-body">

            <p class=" font-weight-bold my-0">'. $row2['firstname'].'  at '. $comment_time .'</p>
              '. $content .'
              </div>
              </div>
              <hr>
              ';
              

            }

            if($noResult){
              echo '<div class="my-3" style="border-radius: 10px;background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);">
              <div class="container">
              <h3 >No comments found</h3>
              <p class="lead">Be the first person to comment. </p>
              </div>
            </div>';
          }
            ?>
      
</div>
 





    <!-- footer -->
    <?php
      include 'partials/_footer.php';
    ?>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>


