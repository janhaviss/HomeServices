
<?php
// session_start();

// connection
include 'partials/_dbconn.php'; 


// Retrieve subservices_name from URL parameter
if(isset($_GET['subservices_name'])) {
    $subservices_name = $_GET['subservices_name'];
    
    // Debugging output
    // echo "Subservices name from URL: " . $subservices_name . "<br>";

    // Retrieve service ID based on subservices_name from the database
    $sql = "SELECT fk_service_id FROM sub_services WHERE subservices_name = '$subservices_name'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $service_id = $row['fk_service_id'];

        // Debugging output
        // echo "Service ID retrieved from database: " . $service_id . "<br>";

        // Store service ID in the session
        $_SESSION['service_id'] = $service_id;
    } else {
        echo "No matching service ID found for the provided subservices_name.<br>";
        echo "Error: " . $conn->error;
        exit(); 
    }
} else {
    echo "Subservices name is missing in the URL.";
    exit();
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Services Offers</title>
    <style>
        .container1 {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .offer {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .offer:hover {
            transform: translateY(-5px);
        }

        .offer h2 {
            margin-top: 0;
            font-size: 20px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .offer p {
            margin: 0;
            font-size: 14px;
            color: #333333;
            line-height: 1.6;
        }

        .offer strong {
            font-weight: bold;
            color: #333333;
        }

        .card{
            border: 2px solid #f2f2f2f2;
            border-radius: 10px;
            background-color: #f2f2f2f2;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            
        }
    </style>
</head>
<body>

<div class="container1">
    <h5>Home Services Offers</h5>

    <?php

$sql = "SELECT * FROM offers WHERE service_id = $service_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='offer'>";
        echo "<h2 style='color: #007bff;'>" . $row["offer_name"] . "</h2>";
        echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
        echo "<p><strong>Start Date:</strong> " . $row["start_date"] . "</p>";
        echo "<p><strong>End Date:</strong> " . $row["end_date"] . "</p>";
        echo "<p><strong>Discount:</strong> " . ($row["discount"] * 100) . "%</p>"; // Display discount as percentage
        echo "<p><strong>Conditions:</strong> " . $row["conditions"] . "</p>";
        echo "<p><strong>Availability:</strong> " . $row["availability"] . "</p>";
        echo "<p><strong>Status:</strong> " . $row["status"] . "</p>";
        echo "</div>";
    }
} else {
    echo "
    <div class='card'>
  <div class='card-body'>
  <h5> No offers available </h5>
  </div>
</div>
    
    ";
}




    ?>

</div>
      
</body>
</html>
