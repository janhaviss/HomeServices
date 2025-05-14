<?php

session_start();
require 'partials/_dbconn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-MKiLiCTwq1w8s6kOtK4A3z2ziN+TsAOM6/P4NT0LkFJrL2itNk8j1zxVusYx1S2Kcm61o6sA56tNemL+deYWJA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
            background-color: #ffffff;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px 5px 0 0;
        }

        .card-body {
            padding: 30px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Booking ID</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time Slot</th>
                        <th scope="col">Special Requests</th>
                        <th scope="col">Fees</th>
                        <th scope="col">Booking Status</th>
                        <th scope="col">Cancel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(isset($_GET['cancel'])){
                        $booking_id = $_GET['cancel'];
                        $sql = "DELETE FROM `booking` WHERE `booking_id` = $booking_id";
                        //$sql = "UPDATE booking SET cancellation_status = 'Canclled' WHERE booking_id = $booking_id";
                        $result = mysqli_query($conn, $sql);
                    }
                    
                    if (isset($_SESSION['user_id'])){
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM booking WHERE user_id = '$user_id'";
                        $result = mysqli_query($conn,$sql);
                         
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sno = $row['sno'];
                                $sql_service = "SELECT service_name FROM manageservices WHERE sno = $sno";
                                $result_service = mysqli_query($conn, $sql_service);
                                $row_service = mysqli_fetch_assoc($result_service);
                    
                                echo "<tr>
                                    <td>". $row['booking_id'] . "</td>
                                    <td>". $row_service['service_name'] . "</td>
                                    <td>". $row['Date'] . "</td>
                                    <td>". $row['timeslot'] . "</td>
                                    <td>". $row['specialrequests'] . "</td>
                                    <td>". $row['fees'] . "</td>
                                    <td>". $row['bookingstatus'] . "</td>
                                    <td><button class='cancel btn btn-sm btn-primary' id='". $row['booking_id'] ."'>Cancel</button></td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No bookings yet</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No bookings yet</td></tr>";
                    }
                    ?>
                </tbody> 
            </table>    
        </div>
    </div>

    <script>
        // For deleting the record
        cancels = document.getElementsByClassName('cancel');
        Array.from(cancels).forEach((element) => {
          element.addEventListener("click", (e) => {
            console.log("cancel ");
            booking_id = e.target.id;
            if (confirm("Are you sure you want to cancel your booking?!")) {
              console.log("yes");
              window.location = `cancelation.php?cancel=${booking_id}`; 
              // TODO: Create a form and use post request to submit a form
            }
            else {
              console.log("no");
            }
          })
        })
    </script>
</body>
</html>
