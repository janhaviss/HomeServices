<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  
  header("location: login.php");
  exit;
}
?>

<!-- fect the service providers details -->
<?php
require 'partials/_dbconn.php';


      // $sql = "SELECT * FROM `service_provider`";
      // $result = mysqli_query($conn, $sql);
      // while($row = mysqli_fetch_assoc($result)){
      //   $sp_id = $row['sp_id'];
      //   $sp_name = $row['sp_name'];
      //   $occupation = $row['occupation'];
      //   $phone = $row['phone'];
      // }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- Link for CSS From DataTables jQuery Site -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

   <!-- awesome font -->
    <script src="https://kit.fontawesome.com/351dd8f265.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <title><?php echo''. $_SESSION['sp_name'] .' - Dashboard ';?></title>

    <style>
         .service-list {
        list-style-type: none;
        padding: 0;
    }
    .service-item {
        border: 1px solid #ced4da;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 20px;
        background-color: #fff;
    }
    .service-item h2 {
        margin-top: 0;
    }
    .service-item p {
        margin-bottom: 0;
      }

    
    </style>

  </head>
  <body>
    <div class="content">
    <header style="background-color:#474d78; color:#fff">
      <h1>Welcome  <?php echo $_SESSION['sp_name']?>!</h1>


    </header>

    <!--sidebar  -->      
   <?php
       include 'navBoard.php.';
    ?>
        
    <!-- to show content -->
    <section id="main-content">
    <?php include 'dashboard.php'; ?> <!-- by default welcome page-->
    </section>


    <!-- footer -->
    <div class="footer-copyright text-center py-0 fixed-bottom" style="background-color: #f2f2f2"> All Right Reserved © 2024 Copyright:
    <a href="/landingPage.html" style="color: #435661 "><b>SoobinSolutions</b></a>
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
    <!-- Script for onclicking performance of the dashboard content area -->
    <script src="script.js"></script>

    <!-- Data table sites jQuery -->
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
      let table = new DataTable('#myTable');
    </script>
  </body>
</html>

