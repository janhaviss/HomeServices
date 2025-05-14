<?php
  // connection
  include 'partials/_dbconn.php'; 
//Navbar
  include 'partials/_navbar.php';
  
  ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Welcome</title>
    <style>

      body{
        background:#487f78;
      }
           nav ul a{
    text-decoration: none;
    padding: 0.3rem 1.3rem;
    /* font-size: 17px; */
    color: #494234;
    position: relative;
    font-family: 'Open Sans', sans-serif;
    /* z-index: 1; */
}


        .ag-format-container {
    width: 1142px;
    margin: 0 auto;
  }

  .ag-courses_box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;

    padding: 50px 0;
  }
  .ag-courses_item {
    -ms-flex-preferred-size: calc(33.33333% - 30px);
    flex-basis: calc(33.33333% - 30px);
    margin: 0 15px 30px;
    overflow: hidden;
    border-radius: 28px;
  }
  .ag-courses-item_link {
    display: block;
    padding: 30px 20px;
    background-color: #fdf2e7;

    overflow: hidden;

    position: relative;
  }
  .ag-courses-item_link:hover,
  .ag-courses-item_link:hover .ag-courses-item_date {
    text-decoration: none;
    color: #000;
  }
  .ag-courses-item_link:hover .ag-courses-item_bg {
    -webkit-transform: scale(10);
    -ms-transform: scale(10);
    transform: scale(10);
  }
  .ag-courses-item_title {
    min-height: 87px;
    margin: 0 0 25px;

    overflow: hidden;

    font-weight: bold;
    font-size: 30px;
    color: #000;

    /* z-index: 2; */
    position: relative;
  }
  .ag-courses-item_date-box {
    font-size: 18px;
    color: #000;

    /* z-index: 2; */
    position: relative;
  }
  .ag-courses-item_date {
    font-weight: bold;
    color: #f9b234;

    -webkit-transition: color .5s ease;
    -o-transition: color .5s ease;
    transition: color .5s ease
  }
  .ag-courses-item_bg {
    height: 128px;
    width: 128px;
    background-color: #f9b234;

    /* z-index: 1; */
    position: absolute;
    top: -75px;
    right: -75px;

    border-radius: 50%;

    -webkit-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
  }
  .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
    background-color: #3ecd5e;
  }
  .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
    background-color: #e44002;
  }
  .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
    background-color: #952aff;
  }
  .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
    background-color: #cd3e94;
  }
  .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
    background-color: #4c49ea;
  }



  @media only screen and (max-width: 979px) {
    .ag-courses_item {
      -ms-flex-preferred-size: calc(50% - 30px);
      flex-basis: calc(50% - 30px);
    }
    .ag-courses-item_title {
      font-size: 24px;
    }
  }

  @media only screen and (max-width: 767px) {
    .ag-format-container {
      width: 96%;
    }

  }
  @media only screen and (max-width: 639px) {
    .ag-courses_item {
      -ms-flex-preferred-size: 100%;
      flex-basis: 100%;
    }
    .ag-courses-item_title {
      min-height: 72px;
      line-height: 1;

      font-size: 24px;
    }
    .ag-courses-item_link {
      padding: 22px 40px;
    }
    .ag-courses-item_date-box {
      font-size: 16px;
    }
}

.twelve h1 {
  font-size:26px; font-weight:700;  letter-spacing:1px; text-transform:uppercase; width:160px; text-align:center; margin:auto; white-space:nowrap; padding-bottom:13px; color:#fff;
}
.twelve h1:before {
    background-color: #d1baa1;
    content: '';
    display: block;
    height: 3px;
    width: 75px;
    margin-bottom: 5px;
}

    </style>
    
  </head>
  <body>
            
 
  <?php //include 'C:\xampp\htdocs\homeServices\bookServices.php';?>
  <?php //include 'sideNavbar.php';?>



  <!-- SERVICES -->         
 <?php
    // Display user ID if logged in
    // if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    //     echo '<p>User ID: ' . $_SESSION['user_id'] . '</p>';
    // }
    ?>
    
    <div class="twelve">
          <h1>Services Provided</h1>
        </div>

  
<div class="container"  >
  <div class="ag-format-container">
        <div class="ag-courses_box">
          
  <?php
      $sql = "SELECT * FROM `services`";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['service_id'];
        $services_name = $row['services_name'];
        $services_desc = $row['services_desc'];

        echo '
        
       
      
      <div class="ag-courses_item">
          <a href="services.php?serviceid=' . $id .' " class="ag-courses-item_link">
            <div class="ag-courses-item_bg"></div>
    
            <div class="ag-courses-item_title">
            ' . $services_name.'</div>
          </a>
    </div>
        
        
        ';
     }
    ?>
</div>
</div>

<!-- footer-->

<div style="background-color:#d0c4aa ">
    <!-- footer -->

    <?php
    //include 'partials/_footer.php';
    ?>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  
  </body>
</html>