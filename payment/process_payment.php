<?php
// Connection to the database
include 'partials/_dbconn.php';

// Fetch payment details from the form
$test_name = $_POST['test_name'];
$fee = $_POST['fee'];

// Process the payment (replace this with your payment gateway integration logic)
// For demonstration purposes, let's assume the payment is successful
$payment_successful = true;

if ($payment_successful) {
    // Insert payment details into the database (replace with your actual database insert query)
    $insert_query = "INSERT INTO payments (test_name, fee, payment_date) VALUES ('$test_name', '$fee', NOW())";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        // Payment and database insertion were successful
        $confirmation_message = "Payment successful! Your appointment for '$test_name' has been confirmed.";
    } else {
        // Database insertion failed
        $confirmation_message = "Payment successful, but there was an issue with confirming your appointment. Please contact support.";
    }
} else {
    // Payment failed
    $confirmation_message = "Payment failed. Please try again or contact support.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
</head>
<body style ="background-color:#487f78;">
    <h2>Payment Confirmation</h2>
    <p><?php echo $confirmation_message; ?></p>
</body>
</html>

