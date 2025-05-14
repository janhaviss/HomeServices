<?php
session_start();
// connection
include 'partials/_dbconn.php'; 


$showAlert = false;
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

// Retrieve service_id from session
if (!isset($_SESSION['service_id'])) {
    echo "ERROR: Necessary session data (service_id) not set.";
    exit;
}

$service_id = $_SESSION['service_id'];

// Retrieve service_name from URL parameters
$service_name = isset($_GET['service_name']) ? $_GET['service_name'] : '';
$sub_services = isset($_GET['sub_services']) ? $_GET['sub_services'] : '';
$fees = isset($_GET['fees']) ? $_GET['fees'] : '';
$sno = isset($_GET['sno']) ? $_GET['sno'] : '';

// Debug output
// echo "Debug sno: " . $sno;

// Ensure $sno is not empty and properly sanitized
if (empty($sno)) {
    echo "ERROR: Necessary session data (sno) is empty.";
    exit;
}

$sno = mysqli_real_escape_string($conn, $sno); // Sanitize $sno

// Retrieve user details
$user_id = $_SESSION['user_id'];
include 'partials/_dbconn.php';
$sql_user = "SELECT * FROM `users` WHERE user_id = $user_id;";
$result_user = mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_assoc($result_user);

// Retrieve 'sno', 'service_name', and 'sp_id' parameters from URL
$sno = isset($_GET['sno']) ? $_GET['sno'] : '';
$service_name = isset($_GET['service_name']) ? $_GET['service_name'] : '';
$sp_id = isset($_SESSION['sp_id']) ? $_SESSION['sp_id'] : '';

// Store 'sno', 'service_name', and 'sp_id' parameters in session
$_SESSION['sno'] = $sno;
$_SESSION['service_name'] = $service_name;
$_SESSION['sp_id'] = $sp_id;


$sql_service = "SELECT * FROM manageservices WHERE `service_id` = $service_id AND `sno` = $sno";
$result_service = mysqli_query($conn, $sql_service);

// Check if the query was successful
if (!$result_service) {
    // Handle query error
    echo "Query error: " . mysqli_error($conn) . "<br>";
    echo "Query: " . $sql_service; // Display the query that caused the error
    exit;
}

// Check if any rows were returned
if (mysqli_num_rows($result_service) == 0) {
    echo "Error: Unable to retrieve service details.";
    exit;
}

$row_service = mysqli_fetch_assoc($result_service);

// Set sp_id in session
$_SESSION['sp_id'] = $row_service['sp_id'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST["date"];
    $time = $_POST["time"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $notes = $_POST["notes"];
    $terms = isset($_POST["terms"]) ? "Agreed" : "Not Agreed"; // Check if terms are agreed
    $fees = $_POST["fees"];

    // Retrieve session data
    $sp_id = $_SESSION['sp_id'];
    $phone = $_SESSION['phone'];

    // Insert booking into database
    $sql_booking = "INSERT INTO `booking` (`user_id`, `sp_id`, `service_id`, `sno`, `Date`, `timeslot`, `address`, `email`, `phone`, `specialrequests`, `bookingstatus`, `fees`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending', ?)";
    $stmt = mysqli_prepare($conn, $sql_booking);

    mysqli_stmt_bind_param($stmt, "iiissssssss", $user_id, $sp_id, $service_id, $sno, $date, $time, $address, $email, $phone, $notes, $fees);

    $result_booking = mysqli_stmt_execute($stmt);


    if ($result_booking) {
        // Store form data in session
        $_SESSION['booking_details'] = array(
            'service_name' => $service_name,
            'date' => $date,
            'time' => $time,
            'address' => $address,
            'email' => $email,
            'notes' => $notes,
            'fees' => $fees
        );

        // Redirect to confirmation page
        header("Location: confirmation.php");
        exit;
    } else {
        echo "ERROR! Booking submission failed: " . mysqli_error($conn);
    }
}

// var_dump($_SESSION['sno']);
// var_dump($row_service['sno']);

// var_dump($_SESSION);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Home Service Booking Form</title>
    <style>
      body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: 50px auto;
    padding: 20px;
    background-color: #fffDebug sno:;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="date"],
select,
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

select {
    appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%236c757d" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12L6 8h8l-4 4z"/></svg>');
    background-repeat: no-repeat;
    background-position-x: calc(100% - 10px);
    background-position-y: center;
    background-color: #fff;
}

textarea {
    height: 100px;
    resize: vertical;
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

input[type="checkbox"] {
    margin-right: 10px;
    vertical-align: middle;
}

    </style>

</head>
<body>
<?php
 if($showAlert){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Success!</strong> Booking submitted successfully! 
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
}
?>

    <div class="container">
        <h2>Book a Home Service</h2>
        <p style= "text-align: center">
            <?php  
            echo $row_user['firstname'];
           echo " <br>";
            echo $row_user['phone'];
            
            ?>
        </p>
        <form action="booking.php?service_name=<?php echo urlencode($service_name) ?>&sno=<?php echo urlencode($sno); ?>" method="POST">


             <div class="form-group">
                <label for="service">Service Type:  </label>
                <?php echo $service_name?>
                <label for="sno">SNO:  </label>
                <?php echo $sno?>

                <!-- <label for="sub_services">Category:</label> -->
                <?php //echo $sub_services ?>
                <?php if (isset($sub_services)): ?>
                 <label for="sub_services">Category:</label>
                    <?php echo $sub_services ?>
                <?php endif; ?>


                <label for="fees">Fees:  </label>
                Rs.<input type="hidden" id="fees" name="fees" value=" <?php echo $fees ?> "><?php echo $fees?> /-



                <label for="sp_name">Service Provider Name:</label>
                <?php echo $row_service['sp_name'];?>

               


            </div>
            
            <div class="form-group">
                <label for="email"><b>Email:</b></label>
                <input type="text" id="email" name="email" placeholder="Enter your Email. Confirmation will be sent on this Email." required>
            </div>
            

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" min="2024-05-07" max="2024-08-31" required>
            </div>
            <div class="form-group">
                <label for="time">Preferred Time Slot:</label>
                <select id="time" name="time" required>
                    <option value="" disabled selected>Select a time slot</option>
                    <option value="morning">Morning</option>
                    <option value="afternoon">Afternoon</option>
                    <option value="evening">Evening</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <!-- <input type="text" id="address" name="address" placeholder="Enter your address" required> -->
                <textarea type="text" id="address" name="address" placeholder="Enter your address. Provider will visit this address." required></textarea>
            </div>
            <div class="form-group">
                <label for="notes">Special Requests:</label>
                <textarea id="notes" name="notes" placeholder="Enter any special requests"></textarea>
            </div>

            <input type="hidden" id="sp_id" name="sp_id" value="<?php echo $sp_id; ?>">
            <!-- <input type="hidden" id="sno" name="sno" value="<?php //echo $sno; ?>"> -->
            <input type="hidden" name="sno" value="<?php echo htmlspecialchars($sno); ?>">

            <input type="hidden" id="service_id" name="service_id" value="<?php echo $service_id; ?>">

            <div class="form-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>


