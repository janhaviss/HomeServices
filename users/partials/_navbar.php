<?php 
// session_start();
// // Initialize session variables if they are not set
// if (!isset($_SESSION['loggedin'])) {
//     $_SESSION['loggedin'] = false;
// }
// if (!isset($_SESSION['user_id'])) {
//     $_SESSION['user_id'] = "";
// }
// if (!isset($_SESSION['firstname'])) {
//     $_SESSION['firstname'] = "";
// }

// var_dump($_SESSION);

?>

<?php
include "partials/_handlelogin.php";
// var_dump($_SESSION);
?>

<?php
if(isset($_GET['cancel'])){
    $booking_id = $_GET['cancel'];
    $delete = true;
    $sql = "DELETE FROM `booking` WHERE `booking_id` = $booking_id";
    $result = mysqli_query($conn, $sql);
}
?>


<?php
// $login = false;
// $showDanger = false;
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     include 'partials/_dbconn.php';

//     // Check if firstname and password are set
//     if (isset($_POST['firstname']) && isset($_POST['password'])) {
//         $firstname = $_POST['firstname'];
//         $password = $_POST['password'];
        
        // $sql = "SELECT * FROM users WHERE firstname = '$firstname'";
        
        // $result = mysqli_query($conn, $sql);
        // $num = mysqli_num_rows($result);



//         if ($num == 1) {
//           $row = mysqli_fetch_assoc($result); 
//           // var_dump($row);
//           if (password_verify($password, $row['password'])) {
//               $login = true;
//               $_SESSION['loggedin'] = true;
//               $_SESSION['user_id'] = $row['user_id']; 
//               $_SESSION['firstname'] = $firstname;
//               echo "logged in " . $firstname;
             
//               header("location: welcome.php");
//           } else {
//               $showDanger = "Invalid Credentials";
//           }
//       } else {
//           $showDanger = "Invalid Credentials";
//       }

//     }

        
// }

// Debugging output
// var_dump($_SESSION); 
?>


<?php
echo '
    <div>
      <nav class="navbar navbar-expand-lg navbar-light mx-4">
        <a
          class="navbar-brand"
          href="landingPage.html"
          style="font-family: "Sofia", sans-serif; font-size: 25px">
          <img src="img/logo.png" alt="" style="
          height : 100%;
          width : 100%;
          margin-top: 1px;">
       
          
          </a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mx-4">
            ';

            // var_dump($_SESSION['user_id']);

          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            if (isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])) {
              echo '<li class="nav-item mx-2">
              <a href="logout.php" class="nav-link">Logout</a>
              </li>
              <p class="text-dark my-2 mx-2"> WELCOME ' . $_SESSION['firstname'] . '</p>
              <span onclick="openNav()"><i class="fa-solid fa-circle-user fa-xl" style="margin-top:20px; margin-left:10px;"></i></span>

              ';

          }
            
            // echo '<li class="nav-item mx-2">
            // <a href="logout.php" class="nav-link">Logout</a>
            // </li>';

        } else {
            echo '<li class="nav-item mx-2">
                    <a class="nav-link" href="/homeservices/"><b>Login</b></a>
                  </li>';
        }
        

        
           echo '
          </ul>


          </div>


        </div>
      </nav>
    </div>

';

?>
  

<!-- 

  <button  type="button" class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Signup</button> -->
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
  /* The side navigation menu */
.sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    /* left: 0; */
    background-color: #f2f2f2; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
    right: 0;
  }
  
  /* The navigation menu links */
  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #000;
    display: block;
    transition: 0.3s;
    text-align: center;
  }
  
  /* When you mouse over the navigation links, change their color */
  .sidenav a:hover {
    color: #696868;
  }
  
  /* Position and style the close button (top right corner) */
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  
  /* Style page content - use this if you want to push the page content to the right when you open the side navigation*/
  #main {
    transition: margin-left .5s;
    padding: 20px;
  } 
  
  /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }


  /* body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
     
      height: 100vh;
      margin: 0;
    } */

    .card1 {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      width: 300px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .no-coupons {
      background-color: #668f66;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .message {
      font-size: 24px;
      margin: 0;
    }

    .details {
      padding: 20px;
      text-align: center;
    }
/* 
    .btn {
      background-color: #2980b9;
      border: none;
      border-radius: 4px;
      color: #fff;
      cursor: pointer;
      font-size: 16px;
      padding: 10px 0;
      width: 80%;
      transition: background-color 0.3s;
    } */

    /* .btn:hover {
      background-color: #2574a9;
    } */

    .image {
      display: block;
      margin: 20px auto;
      width: 60%;
    }

    .sad-face {
      margin-bottom: 20px;
      font-size: 60px;
    }

  </style>
  </head>


 <!-- Modal for three modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
         <button type="button" class="btn" id="modbtn" onclick="window.location.href='users/login.php';"><i class="far fa-user pr-2" aria-hidden="true"></i>User</button><br>
        <button type="button" class="btn" id="modbtn"  onclick="window.location.href='admin/login.php';"><i class="fa-solid fa-user-tie" aria-hidden="true"></i>Admin</button><br>
    <button type="button" class="btn" id="modbtn" onclick="window.location.href='provider/login.php';"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>Service Provider</button>
       
  </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div id="mySidenav" class="sidenav">
  
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <!-- ##### USER ##### -->
        <a href="#"><h3><i class="fa-solid fa-user-gear" style="color: #668f66;">&nbsp;</i>Hello <u><?php echo '' . $_SESSION['firstname'] . '' ?></u>!</h3></a>
        
        
        <!-- ######## PROFILE #######--> 
        <a class="btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">Profile</a>
              <?php
            if (isset($_SESSION['firstname'])){
    $firstname = $_SESSION['firstname'];
      $sql = "SELECT * FROM users WHERE firstname = '$firstname'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
      $row = $result->fetch_assoc();
      $lastname = $row['lastname'];
      $address = $row['address']; 
      $email = $row['email'];
      $state = $row['state'];
      $phone= $row['phone'];
      $city = $row['city'];
      $zip = $row['zip'];
    }
  }
    ?>

        <div class="collapse" id="collapseExample">
        <div class="container py-2">
        <form action="profileupdate.php" method="">
        <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          
            <img src="img\defaultProfile.jpg" alt="avatar" style="width: 72px; height:72px;" class="rounded-circle img-fluid">
            <h5 class="my-3"><?php echo $firstname;?></h5>
            <div class="d-flex justify-content-center mb-2">
              <button type="submit" class="btn btn-primary" id="updateProfile" onclick="updateProfile.php">Update</button>
            </div>
            
          </div>
        </div>
        
      </div>
            <div class="col-lg-8">
        <div class="card mb-2">
          <div class="card-body">
            
          <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $firstname." ".$lastname ;?></p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $email;?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $phone;?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $address;?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">City</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $city." ".$state." ".$zip ;?></p>
              </div>
            </div><!-- crow closed -->


          </div>
        </div>
</div>
</div>
</form>
          </div> <!--conatiner-->
          </div> <!-- collaspe div -->

          <!--############ BOOKING ##########  -->
        <a class="btn" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">Bookings</a>
        <div class="collapse" id="collapseExample1">

         <div class="container my-4">
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Services</th>
      <th scope="col">Date</th>
      <th scope="col">TimeSlot</th>
      <th scope="col">Request</th>
      <th scope="col">Fees</th>
      <th scope="col">Booking Status</th>
      <th scope="col">Payment</th>
      <th scope="col">Cancel</th>


    </tr>
    <?php 
        require 'partials/_dbconn.php';
        if (isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM booking WHERE user_id = '$user_id'";
            $result = mysqli_query($conn,$sql);
             
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $bookingstatus=$row['bookingstatus'];
                    $sno = $row['sno'];
                    $sql_service = "SELECT service_name FROM manageservices WHERE sno = $sno";
                    $result_service = mysqli_query($conn, $sql_service);
                    $row_service = mysqli_fetch_assoc($result_service);
        
                    echo "<tr>
                        <td>". $row_service['service_name'] . "</td>
                        <td>". $row['Date'] . "</td>
                        <td>". $row['timeslot'] . "</td>
                        <td>". $row['specialrequests'] . "</td>
                        <td>". $row['fees'] . "</td>
                        <td>". $row['bookingstatus'] . "</td>";
                        
                    if ($bookingstatus=='Confirmed'){
                        echo "
                        <form action='\homeServices\payment\option.php' method='post'>
                            <td> 
                                <button class='payment btn btn-sm btn-primary' id='". $row['booking_id'] ."' name='payment'>Payment</button>
                            </td>
                        </form>";
                    } else {
                        echo "<td>wait for confirmation</td>";
                    }
                        
                    echo "
                    <form action='cancelation.php' method='post'>
                    <td>
                    <button class='cancel btn btn-sm btn-primary' id='". $row['booking_id'] ."' name='cancel' >Cancel</button>
                    </td>
                    </form>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No bookings yet</td></tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No bookings yet</td></tr>";
        }
        ?>
        

</tbody> 
      </table>    
    </div>
  </div>


        
        <!-- ####### USER PAYMENT ###### -->
        <a class="btn" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">Payments History</a>
        <div class="collapse" id="collapseExample3">
          <div class="container">
        <table  class="table table-bordered table-hover">
  <thead>
    <tr>
  <th scope="col">S.N</th>
   <th scope="col">User Email</th>
   <th scope="col">Mobile</th>
   <th scope="col">Payment Date</th>
    </tr>
  </thead>
  <tbody>
    
  <?php
if (isset($_SESSION['firstname'])){
    $username = $_SESSION['firstname'];
    $sql = "SELECT * FROM payment WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    $msg_id = 0; //so even if the gap comes or anything gets deleted, it will be in order it comes from here and not the database

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $msg_id++;
            echo  "<tr>
                    <td>". $msg_id . "</td>
                    <td>". $row['email'] . "</td>
                    <td>". $row['mobile'] . "</td>
                    <td>". $row['payment_date'] . "</td>
                  </tr>"; 
        }
    } else {
        echo "<tr><td colspan='4'>No payments yet</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>No payments yet</td></tr>";
}
?>

    </tbody>
</table>
</div>
        </div>

        <a class="btn" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">Coupons</a>
        <div class="collapse" id="collapseExample4">
          <div class="container my-3" style="justify-content: center; display: flex;">
          <div class="card1">
            <div class="no-coupons">
              <span class="sad-face">😢</span>
              <p class="message">Oops! No Coupons Available</p>
            </div>
            <div class="details">
              <p>Don't worry! Check back later for more offers.</p>
              
            </div>
          </div>
          </div>
        </div>
        
        <a href="logout.php">Logout</a>
    </div>

<script>
        /* Open the sidenav */
        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";
        }

        /* Close/hide the sidenav */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script>
      

      // For deleting the record
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("cancel " );
        booking_id = e.target.id.substr(1); //substr is JS ka method which 1 ko fetch karke baki sab show karega

        if (confirm("Are you sure you want to cancel your booking?!")) {
          console.log("yes");
          window.location = `_navbar.php?cancel=${booking_id}`; 
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
    </script>