<?php
session_start();
$delete = false;
$mail = false;
//connect to database
include 'partials/_dbconn.php';


//for GET DELETE
if(isset($_GET['delete'])){
    $booking_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `booking` WHERE `booking_id` = $booking_id";
    $result = mysqli_query($conn, $sql);
}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['confirm'])) {
   $booking_id = $_POST['booking_id'];
   // Update the status of the booking to "Confirmed" in the database
   $updateQuery = "UPDATE booking SET bookingstatus = 'Confirmed' WHERE booking_id = $booking_id";
   mysqli_query($conn, $updateQuery);
 } elseif (isset($_POST['reject'])) {
   $booking_id = $_POST['booking_id'];
   // Update the status of the booking to "Pending" in the database
   $updateQuery = "UPDATE booking SET bookingstatus = 'Pending' WHERE booking_id = $booking_id";
   mysqli_query($conn, $updateQuery);
 }
 }

 
?>
<?php
$service_id = $_SESSION['service_id'];
$sql_service = "SELECT * FROM manageservices WHERE `service_id` = $service_id";
$result_service = mysqli_query($conn, $sql_service);
$row_service = mysqli_fetch_assoc($result_service);

include 'partials/_dbconn.php';
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;
use Twilio\Rest\Client;

require  '\autoload.php';


//session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['getmsg'])) {  
        $sp_id=$_SESSION['sp_id'];
        $sql = "SELECT * FROM `service_provider` where sp_id=$sp_id";
        $result_sp = mysqli_query($conn,$sql);
        while ($row_sp = mysqli_fetch_assoc($result_sp)){
        // ##### FIRST IMP VAR ###### 
        $sp_name = $row_sp['sp_name']; 
        }

        $service_id = $_SESSION['service_id'];
        $sql_service = "SELECT * FROM manageservices WHERE `service_id` = $service_id";
        $result_service = mysqli_query($conn, $sql_service);
        $row_service = mysqli_fetch_assoc($result_service);
        // ##### SEC IMP VARs ###### 
        $service_name = $row_service['service_name']; 

        $sql_booking = "SELECT * FROM `booking` where sp_id=$sp_id";
          $result_booking = mysqli_query($conn,$sql_booking);         
          while ($row_booking = mysqli_fetch_assoc($result_booking)){
          // ##### THIRD IMP VARs ###### 
            $user_id = $row_booking['user_id'];
            $date=$row_booking['Date'];
            $timeslot=$row_booking['timeslot'];
          }

            $sql_user = "SELECT * FROM `users` WHERE user_id = $user_id";
            $result_user = mysqli_query($conn, $sql_user);
            while ($row_user = mysqli_fetch_assoc($result_user)){
            // ##### FOURTH IMP VARs ###### 
              $firstname = $row_user['firstname'];
              $message='Hello '.$firstname.' Your '.$service_name.' service has been sucessfully confirmed by SoobinSolutions Service Provider '.$sp_name.' for Date '.$date.' of '.$timeslot.' slot. You may proceed with the payment by logging in our website SoobinSolutions.com and visiting Booking Section in Profile. Welcome to a world where home maintenance is hassle-free. Thank you for choosing SoobinSolutions';
              $phone = $row_user['phone']; 
              $countrycode=91;
              $op='+';
              $number=$op. strval($countrycode). strval($phone);


  $account_id = "YOUR_INFOBIP_ACCOUNT_ID";
  $auth_token = "YOUR AUTH TOKEN";

  $client = new Client($account_id, $auth_token);

  $twilio_number = "+YOUR_TWILIO_NUMBER";

    $client->messages->create(
        $number,
        [
            "from" => $twilio_number,
            "body" => $message
        ]
        );
// echo "Message sent.";
      } 
}
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous"
    />
    <!-- Link for CSS From DataTables jQuery Site -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    
    <title>Booking</title>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mb-0 h1" href="/provider/welcome.php">soobinsolutions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

  <div class="modal fade" id="mailModal" tabindex="-1" aria-labelledby="mailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mailModalLabel">Send Mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="send_mail.php" method="post">
        <input type="hidden" name="booking_idEdit" id="booking_idEdit">
        <div class="form-group">
          <label for="firstnameEdit">firstname</label>
          <input
            type="text"
            name="firstnameEdit"
            class="form-control"
            id="firstnameEdit"
            aria-describedby="emailHelp"
          />
        </div>
        <div class="form-group">
          <label for="emailEdit">Email</label>
          <input
            type="text"
            name="emailEdit"
            class="form-control"
            id="emailEdit"
            aria-describedby="emailHelp"
          />
        </div>
       
        <div class="form-group">
          <label for="servicenameEdit">Service</label>
          <input
            type="text"
            name="servicenameEdit"
            class="form-control"
            id="servicenameEdit"
            aria-describedby="emailHelp"
          />
        </div>

        <div class="form-group">
          <label for="feesEdit">Fees</label>
          <input
            type="number"
            name="feesEdit"
            class="form-control"
            id="feesEdit"
            aria-describedby="emailHelp"
          />
        </div>
        
        <div class="form-group">
          <label for="DateEdit">Date</label>
          <input
            type="varchar"
            name="DateEdit"
            class="form-control"
            id="DateEdit"
            aria-describedby="emailHelp"
          />
        </div>

        <!-- try provider name and phone number start -->
        <div class="form-group">
          <label for="spnameEdit">Service Provider</label>
          <input
            type="text"
            name="spnameEdit"
            class="form-control"
            id="spnameEdit"
            aria-describedby="spnameHelp"
          />
        </div>


        <div class="form-group">
          <label for="contactEdit">Contact</label>
          <input
            type="number"
            name="contactEdit"
            class="form-control"
            id="contactEdit"
            aria-describedby="contactHelp"
          />
        </div>
        <!-- try provider name and phone number  end-->

        <button type="submit" class="btn btn-primary" onclick="sendMail()">Send Mail</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- For showing the alert -->
     <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  if($mail){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Email have been sent successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}
  ?>
 

    <div class="m-2">

      <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">b_id</th>
            <th scope="col">User</th>
            <th scope="col">Services</th>
            <th scope="col">Date</th>
            <th scope="col">TimeSlot</th>
            <th scope="col">Addresss</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Request</th>
            <th scope="col">fees</th>
            <th scope="col" style='display:none;'>Provider Name</th>
            <th scope="col" style="display:none;">Contact Number</th>
            <th scope="col">Booking Status</th>
            <th scope="col">Delete</th>
            <th scope="col">Mail</th>
            <th scope="col">Send SMS</th>

          </tr>
        </thead>
        <tbody>
    <?php


        // Fetch and display booking details
        $sp_id = $_SESSION['sp_id'];
        $sql = "SELECT * FROM `booking` where sp_id = $sp_id";
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

            $spname = false;
            $contact= false;
            // Check if user details were fetched successfully
            if (mysqli_num_rows($result_user) > 0) {
                // Fetch user details
                $row_user = mysqli_fetch_assoc($result_user);
                // Display user details
                $booking_id = $booking_id + 1;

                echo "<tr>
                    <td>". $booking_id . " </td>
                    <td>". $row_user['firstname'] . "</td>
                    <td>". $row_service['service_name'] . "</td>          
                    <td>". $row['Date'] . "</td>
                    <td>". $row['timeslot'] . "</td>
                    <td>". $row['address'] . "</td>
                    <td>". $row['email'] . "</td>
                    <td>". $row['phone'] . "</td>
                    <td>". $row['specialrequests'] . "</td>
                    <td >". $row['fees'] . "</td>
                    <td style='display:none;'>". $spname. "</td>
                    <td style='display:none;'>". $contact. "</td>
                   
                    <td>
                    ". $row['bookingstatus'] . "
                    <form method='post'>
                      <input type='hidden' name='booking_id' value='{$row['booking_id']}'>
                      <button type='submit' name='confirm'>Confirm</button>
                      <button type='submit' name='reject'>Reject</button>
                    </form>
                </td>
                

                <td>
                    <button class='delete btn btn-sm btn-primary' id=d". $row['booking_id'] .">Delete</button>
                    </td>
                <td>
                    <button class='mail btn btn-sm btn-primary' id=d". $row['booking_id'] .">Mail</button>
                    </td>
                    <td>
                    <form method='post' action='bookingManagement.php'>
                    <input type='submit' name='getmsg' value='Send SMS' class='btn btn-info'>
                    </form>
                    </td>
                </tr>";
            }
        }

        // var_dump($_SESSION);
    ?>
</tbody>

      </table>
      
    </div>
    <hr>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
     <!-- Data table sites jQuery -->
     <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
      let table = new DataTable('#myTable');
    </script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const mailButtons = document.querySelectorAll('.mail');

    mailButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const tr = event.target.closest("tr");
            const firstname = tr.querySelector("td:nth-child(2)").textContent;
            const email = tr.querySelector("td:nth-child(7)").textContent;
            const service_name = tr.querySelector("td:nth-child(3)").textContent;
            const fees = tr.querySelector("td:nth-child(10)").textContent;         
            const bookingDate = tr.querySelector("td:nth-child(4)").textContent;
            const spname  = tr.querySelector("td:nth-child(12)").textContent;
            const contact = tr.querySelector("td:nth-child(13)").textContent;
            const bookingId = event.target.id;

            document.querySelector("#firstnameEdit").value = firstname;
            document.querySelector("#emailEdit").value = email;
            document.querySelector("#feesEdit").value = fees;
            document.querySelector("#servicenameEdit").value = service_name;
            document.querySelector("#DateEdit").value = bookingDate;
            document.querySelector("#booking_idEdit").value = bookingId;
            document.querySelector("#spnameEdit").value = spname;
            document.querySelector("#contactEdit").value = contact;

            $('#mailModal').modal('toggle');

            console.log('Click event triggered');
        });
    });

    // Function to send the email
    function sendMail() {
        const email = document.querySelector("#emailEdit").value;
        const subject = "Your booking confirmation";
        const message = "Your booking has been confirmed.";

        // Use AJAX to send the email data to a PHP script on the server
        $.ajax({
            url: 'send_mail.php', // Replace with your email sending script
            type: 'POST',
            data: {
                email: email,
                subject: subject,
                message: message
            },
            success: function (response) {
                if (response === 'success') {
                    alert("Email sent successfully!");
                    $('#mailModal').modal('hide');
                } else {
                    alert("Failed to send email. Please try again later.");
                }
            },
            error: function (error) {
                console.error("Error:", error);
                alert("An error occurred while sending the email.");
            }
        });
    }
});

</script>



    <script>
      

      // For deleting the record
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete " );
        booking_id = e.target.id.substr(1); //substr is JS ka method which 1 ko fetch karke baki sab show karega

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `bookingManagement.php?delete=${booking_id}`; 
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
