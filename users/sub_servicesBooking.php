
    
    
    <?php
        // connection
        include 'partials/_dbconn.php'; 
        ?>


<?php include 'partials/_navbar.php';?>



<?php

if(isset($_GET['subservices_name'])){
  $subservices_name = $_GET['subservices_name'];

  // Prepare the statement
  $sql = "SELECT * FROM `sub_services` WHERE `subservices_name` = ?";
  $stmt = mysqli_prepare($conn, $sql);

  // Bind the parameter
  mysqli_stmt_bind_param($stmt, "s", $subservices_name);

  // Execute the query
  mysqli_stmt_execute($stmt);

  // Store the result
  $result = mysqli_stmt_get_result($stmt);

  // Fetch the rows as an associative array
  while($row = mysqli_fetch_assoc($result)){
    $subservices_name = $row['subservices_name'];
    $subservice_desc = $row['subservice_desc'];
    $steps = $row['steps'];
  }

  // Close the statement
  mysqli_stmt_close($stmt);
}
else {
  // Handle the case when subservices_name is not set in the URL
  echo "Subservices name is not set in the URL.";
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous">
        <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <title>Services: <?php echo $subservices_name ;?></title>


    <!-- css for Static_navbar -->
    <style>
  .wrapper {
            display: flex;
            width: 100%;
        }
        .left, .right {
            width: 350px;
            background-color: #f0f0f0;
            padding: 20px;
            top: 300px;
        }
        .left {
            margin-right: 20px;
        }
        .right {
            margin-left: 20px;
        }
        .middle {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
        }

   
        
/* jumbotron */
.jumbotron {
    background-color: #FBAB7E;
    background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
    transition: all 0.2s;
    border-radius: 15px;
}


</style>

</head>

<body style ="background-color:#487f78;">

<div class="container">
    <div class="jumbotron ">
        <div class="container ">
            <h1 class="display-4"><?php echo $subservices_name ;?></h1>
            <p class="lead"><?php echo $subservice_desc  ;?></p>
        </div>
    </div>
 </div>





<!-- content portion -->

<div class="wrapper" style="margin-bottom:10px;">
        <div class="left"  style= "background: #fdf2e7; border-radius: 5px">
        <h3>Here are the service guidelines: </h3>
        <p>
        <?php echo $steps  ;?>

        </p>
        </div>

       <!-- the provided service details and to add  -->
       <div class="middle"  style= "background: #f2f2f2f2; border-radius:10px">
            <?php
        include 'providedServices.php' ;
               ?>
        </div>

        <!-- cart -->
        <div class="right"  style= "background: #fdf2e7; border-radius: 5px">
           
        
        <!-- offers -->
        <div style= "background-color: "> 
             <?php include 'offers.php'; ?>
        </div>
        <br>
        
        <!-- promise -->
        <div  style= "background-color: pink; border: 2px solid gray; ">
        
        <img src="img/promise.gif" alt="" width=100%>

        </div>
        </div>
    </div>






    <!-- footer -->
    <div >
    <?php
        include 'partials/_footer.php';
    ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

        

</body>

</html>
