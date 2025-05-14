<?php
include 'partials/_dbconn.php';
session_start();
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;
use Twilio\Rest\Client;

require  '\autoload.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['getmsg'])) {
        if (isset($_SESSION['booking_details'])) {
          $booking_details = $_SESSION['booking_details'];
          $service_name=$booking_details['service_name'];
        }  
        
        if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `users` WHERE user_id = '$user_id'";
        $result = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $firstname = $row['firstname']; 
          $message='Hello '.$firstname.' you have sucessfully booked your '.$service_name.' service! And your confirmation request has been sent. Within next 12 hours your booking status be updated. Please await for the notification through Email. Thank you for choosing SoobinSolutions';

          //  $phone = $row['phone']; 
              $phone = $row['phone']; 
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        .booking-details {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .booking-details h3 {
            margin-bottom: 10px;
            color: #333;
        }
        .booking-details p {
            margin: 5px 0;
            color: #666;
        }
        .button-container {
            text-align: center;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }

/* Modal title */
.modal-title {
  font-weight: bold;
  color: #333;
  font-size: 24px;
}

/* Modal body */
.modal-body {
  font-size: 18px;
  color: #555;
}

/* Modal footer */
.modal-footer {
  justify-content: center; /* Center the buttons */
  background-color: #f7f7f7;
  border-top: 1px solid #ddd;
}

/* Close button */
.close {
  color: #888;
  opacity: 0.7;
  transition: opacity 0.3s ease;
}

.close:hover {
  opacity: 1;
}

/* Modal content */
.modal-content {
  border-radius: 10px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

/* Modal header background */
.modal-header {
  background-color: #f0f0f0;
  border-bottom: 1px solid #ddd;
  border-radius: 10px 10px 0 0;
}

/* Modal body padding */
.modal-body {
  padding: 20px;
}

/* Close button positioning */
.close {
  position: absolute;
  top: 10px;
  right: 20px;
}

/* Close button styling */
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* Button styles */
.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
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
        <h2>Booking Confirmation</h2>
        <div class="booking-details">
            <h3>Booking Details</h3>
            <?php
            //session_start();
            if (isset($_SESSION['booking_details'])) {
                $booking_details = $_SESSION['booking_details'];
                foreach ($booking_details as $key => $value) {
                    echo "<p><strong>" . ucfirst(str_replace('_', ' ', $key)) . ":</strong> $value</p>";
                }
            } else {
                echo "<p>No booking details found.</p>";
            }
            ?>
        </div>
        <div class="button-container">
    <form method="post" action="confirmation.php" id="confirmationForm">
        <input type='submit' name='getmsg' value='Click for Confirmation' class="btn btn-info" data-toggle="modal" data-target="#confirmationModal" id="confirmationButton">
    </form>
    <button type="button" class="btn btn-info" onclick="window.location.href='welcome.php'"   id="homeButton" >Back to Home</button>
      </div>

    </div>

   


<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Booking Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Thank you for booking! You will receive an email confirmation once the service provider confirms your appointment.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        // Enable the "Back to Home" button when the confirmation button is clicked
document.getElementById("confirmationButton").addEventListener("click", function() {
    document.getElementById("homeButton").disabled = false;
});

    </script>
</body>
</html>
