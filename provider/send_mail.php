<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Include Bootstrap CSS and JavaScript libraries -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

<!-- MAIN  -->
<div class="container my-3">

<?php


 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['firstnameEdit']) && isset($_POST['emailEdit'])) {
        $firstname = $_POST['firstnameEdit'];
        $email = $_POST['emailEdit'];
        $fees = $_POST['feesEdit'];
        $spname = $_POST['spnameEdit'];
        $contact = $_POST['contactEdit'];
        $service_name = $_POST['servicenameEdit'];
        $bookingDate = $_POST['DateEdit'];
        $currentDate = date('Y-m-d'); 
   
       

        // Email details
        $to_email = $email;
        // $to_email = "mrunaliparsekar18@gmail.com";
        $subject = "Your Service Request is Confirmed!";
        $body = 
        "
        Dear $firstname,

        We are delighted to inform you that your service request on SoobinSolution has been successfully confirmed! 🎉

        At SoobinSolution, we understand the importance of efficient and reliable home services, and we're committed to ensuring your satisfaction every step of the way.

        Here are the details of your confirmed service request:

        - Service: $service_name
        - Date Issued: $currentDate
        - Due Date: $bookingDate
        - Fees of service Rs. $fees.00
        - Total Amount Due: Rs. $fees.00
        - Provider: $spname
        - Contact Number: $contact

        Rest assured, our dedicated provider will arrive promptly at the scheduled time to deliver top-notch service and cater to your needs.

        Should you have any questions or require further assistance, feel free to reach out to us at SooBinSolutionContactUs.

        Thank you for choosing SoobinSolution for your home service needs. We look forward to serving you!

        Best regards,
        SoobinSolution Team
        ";
        $headers = "From: thepatholabmj@gmail.com";

        // Attempt to send the email
        if (mail($to_email, $subject, $body, $headers)) {
            echo "<div class='jumbotron'>
            <h1 class='display-4'>To, user $firstname!</h1>
            <p class='lead'><b>The Email successfully sent to $to_email...</b></p>
            <hr class='my-4'>
            <a class='btn btn-info btn-lg' href='bookingManagement.php' role='button'>Back</a>
            </div>";
        } else {
            echo "Email sending failed...";
        }
    }
 }
?>


<?php
// $to_email = "mrunaliparsekar18.gmail.com";
// $subject = "Simple Email Test via PHP";
// $body = "Hi, This is test email send by PHP Script";
// $headers = "From: thepatholabmj@gmail.com";

// if (mail($to_email, $subject, $body, $headers)) {
//     echo "Email successfully sent to $to_email...";
// } else {
//     echo "Email sending failed...";
// }
?>

</div>

</body>
</html>
