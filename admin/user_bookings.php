<?php
session_start();

require 'partials/_dbconn.php'
?>
<!DOCTYPE html>
<html>
<head>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
#head, #btnn{
  display: inline-block;
}
.table thead th  {
    vertical-align: bottom;
    border: 0.5px solid black;
}

  th{
    background-color: grey;
    color: black;
  }
    td{
            background-color:#f2f2f2;
           
        }

        .table-bordered td, .table-bordered th {
    border: 0.5px solid black;
}
        </style>

</head>
<body>
<div class="container">
 <div class="row">
   <div class="col-lg-12">
    <div class="table-responsive">
    <h3 id="head" class="text-center">Bookings</h3>
      <button id="btnn" type="button" onclick="window.location.href = 'user_booking_table.php';" class="btn" style="float: right; background-color:#151c48; color:white; width:150px; font-size:12px; border-radius: 12px;">Manage Bookings</button>
      <table  class="table table-bordered table-hover">
  <thead>
    <tr>
  <th scope="col">S.N</th>
   <th scope="col">User</th>
   <th scope="col">Service</th>
   <th scope="col">Date</th>
   <th scope="col">TimeSlot</th>
   <th scope="col">Address</th>
   <th scope="col">Phone</th>
   <th scope="col">Special Request</th>
   <th scope="col">Booking Status</th>
   <th scope="col">Fees</th>
   <!-- <th scope="col">Payment Status</th> -->
   <th scope="col">Created At</th>
   <th scope="col">Updated At</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
        // Fetch and display booking details
        $sql = "SELECT * FROM `booking`";
        $result = mysqli_query($conn, $sql);
        $booking_id = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['user_id'];
            $sql_user = "SELECT * FROM `users` WHERE user_id = $user_id";
            $result_user = mysqli_query($conn, $sql_user);

            if (!$result_user) {
                die("Error fetching user details: " . mysqli_error($conn));
            }

            // sno
            $sno = $row['sno'];
            $sql_service = "SELECT `service_name` FROM `manageservices` WHERE sno = $sno";
            $result_service = mysqli_query($conn, $sql_service);

            if (!$result_service) {
                die("Error fetching service name: " . mysqli_error($conn));
            }

            if (mysqli_num_rows($result_service) > 0) {
                $row_service = mysqli_fetch_assoc($result_service);
            } else {
                $row_service['service_name'] = "Service not found"; // Or any default value you prefer
            }

            // Check if user details were fetched successfully
            if (mysqli_num_rows($result_user) > 0) {
                // Fetch user details
                $row_user = mysqli_fetch_assoc($result_user);
                // Display user details
                $booking_id = $booking_id + 1;

                echo "<tr>
                    <th scope='row'>". $booking_id . " </th>
                    <td>". $row_user['firstname'] . "</td>
                    <td>". $row_service['service_name'] . "</td>          
                    <td>". $row['Date'] . "</td>
                    <td>". $row['timeslot'] . "</td>
                    <td>". $row['address'] . "</td>
                    <td>". $row['phone'] . "</td>
                    <td>". $row['specialrequests'] . "</td>
                    <td>". $row['bookingstatus'] . "</td>
                    <td>". $row['fees'] . "</td>
                 
                    <td>". $row['createdAt'] . "</td>
                    <td>". $row['updatedAt'] . "</td>
                  
               
                </tr>";
            }
        }

        // var_dump($_SESSION);
    
    ?>
    </tbody>
</table>
      </div>
      </div>
      </div>
      </div>

</body>
</html>
<!--    <td>". $row['paymentstatus'] . "</td> -->