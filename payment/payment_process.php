<?php
  // Include database connection
  include 'partials/_dbconn.php';
  
// Perform a SELECT query to retrieve payment data
$sql = "SELECT * FROM `payment` ORDER BY sno DESC LIMIT 1";

  // Execute the query
  $result = $conn->query($sql);

  // Check if the query was successful
  if ($result) {
    // Fetch and display payment data
    while ($row = $result->fetch_assoc()) {
      // echo "Username: " . $row['username'] . "<br>";
      // echo "Email: " . $row['email'] . "<br>";
      // echo "Mobile: " . $row['mobile'] . "<br>";
      // echo "Address: " . $row['address'] . "<br>";
      // echo "City: " . $row['city'] . "<br>";
      // echo "Zip: " . $row['zip'] . "<br>";
      // echo "Card Number: " . $row['cn_no'] . "<br>";
      // echo "Exp Month: " . $row['exp_month'] . "<br>";
      // echo "CVV: " . $row['cvv'] . "<br>";
      // echo "Fee: " . $row['fee'] . "<br>";
      // echo "Payment Date: " . $row['payment_date'] . "<br>";

   echo "
  <div class= 'container my-3'>
  <div class='alert alert-success' role='alert'>
  <h4 class='alert-heading'>". $row['username'] .", You have sucessfully completed the payment process!</h4>
  <p>We are pleased to inform you that your recent payment for SoobinSolution Services you had booked has been successfully processed on " . $row['payment_date'] . "
  <br> Our team is committed to delivering top-quality service with integrity, expertise, and reliability</p>
  <hr>
  <p class='mb-0'>To get the Payment Receipt please <a href='feeReceipt.php'>click here</a>.</p>
</div>
<a href='/homeServices/landingPage.html'>Go Back to Home</a>
</div>

";
    }
  } else {
    echo "Error retrieving payment data: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Payment Processing</title>
  <link rel="stylesheet" href="style.css">
</head>
<body style ="background-color:#487f78;">
  <div class="container">
  <div class="container">
    <?php if (isset($message)): ?>
      <div class="alert <?php echo ($message == "Payment Processing succeeded!") ? "alert-success" : "alert-danger"; ?>" role="alert">
        <h4 class="alert-heading"><?php echo ($message == "Payment Processing succeeded!") ? "Success!" : "Error!"; ?></h4>
        <p><?php echo $message; ?></p>
        <hr>
        <p class="mb-0"><?php echo ($message == "Payment Processing succeeded!") ? "Payment done!" : ""; ?></p>
      </div>
    <?php endif; ?>
  </div>
  </div>
</body>
</html>
