<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  
  header("location: login.php");
  exit;
}
?>


<?php
// Connect to your database 
include 'partials/_dbconn.php';

$showAlert = false;
$showDanger = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $service_name = $_POST['service_name'];
    $services_description = $_POST['services_description'];
    $sub_service_id = $_POST['sub_services'];
    $time_require = $_POST['time_require'];
    $fees = $_POST['fees'];
    $phone = $_POST['phone'];

    // Retrieve session data for the logged-in user
    $sp_id = $_SESSION['sp_id'];
    $sp_name = $_SESSION['sp_name'];
    $service_id = $_SESSION['service_id'];

    // echo "Session service_id: " . $service_id . "<br>";

    if (!$service_id) {
        $showDanger = "Error: Service ID not found in session.";
    } else {
        // Fetch sub-service name based on sub-service ID
        $sql_subservice = "SELECT subservices_name FROM `sub_services` WHERE `sub_id` = $sub_service_id";
        $result_subservice = mysqli_query($conn, $sql_subservice);
        $row_subservice = mysqli_fetch_assoc($result_subservice);
        $sub_service_name = $row_subservice['subservices_name'];

        // Insert data into the database
        $sql = "INSERT INTO `manageservices` (`sp_id`, `service_id`, `sp_name`,`phone`, `service_name`, `services_description`, `sub_services`, `time_require`, `fees`) VALUES ('$sp_id', '$service_id', '$sp_name','$phone' ,'$service_name', '$services_description', '$sub_service_name', '$time_require', '$fees')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $showAlert = true;
        } else {
            $showDanger = "ERROR! Services not added: " . mysqli_error($conn);
        }
    }
}
// var_dump($_SESSION);

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<title>Manage Services</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }
    h1 {
        text-align: center;
        margin-bottom: 35px;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .button:hover {
        background-color: #0056b3;
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        font-weight: bold;
    }
    input[type="text"], textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
    }
</style>
</head>
<body>
<?php 
   if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Services Added. 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
   }
   if($showDanger){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '. $showDanger.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

   }
   
    ?>

<?php
$sp_name =$_SESSION['sp_name'] ;

$sql = "SELECT * FROM `service_provider` where sp_name ='$sp_name'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  $sp_id = $row['sp_id'];
  $sp_name = $row['sp_name'];
  $occupation = $row['occupation'];
  $phone = $row['phone'];
  $service_id = $row['service_id'];

}
?>



<div class="container">
    <h1>Service Management</h1>
    <p>Service Provider:<b style=" text-transform: uppercase;"> <?php echo'' . $_SESSION['sp_name'] . ''?></b></p>
    <p>Category:<b style=" text-transform: uppercase;"> <?php echo''. $occupation .''?></b></p>
    
    
<hr>

    <h2>Add New Service</h2>

 <?php   // Debug session data
// echo "Session sp_id: " . $_SESSION['sp_id'] . "<br>";
// echo "Session sp_name: " . $_SESSION['sp_name'] . "<br>";
// echo "Session service_id: " . $_SESSION['service_id'] . "<br>";
// echo "occupation: ".$occupation."";
?>


    <form action="manageServices.php" method="post">
        <div class="form-group">
            <label for="phone">Service Provider Contact</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="service_name">Service Name</label>
            <input type="text" id="service_name" name="service_name" required>
        </div>
        <div class="form-group">
            <label for="services_description">Service Description</label>
            <textarea id="services_description" name="services_description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="sub_services">Select Sub-Service</label>
            <select id="sub_services" name="sub_services" required>
                <option value="">Select Sub-Service</option>

                <?php
         
         $sql2 = "SELECT * FROM `sub_services` WHERE `fk_service_id` = $service_id";
         $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) > 0) {
                // Loop through each row to generate option elements
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo '<option value="' . $row2['sub_id'] . '">' . $row2['subservices_name'] . '</option>';
                }
            } else {
                echo '<option value="" disabled>No sub-services available</option>';
            }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="fees">Fees</label>
            <input type="text" id="fees" name="fees" required>
        </div>
        <div class="form-group">
            <label for="time_require">Time Required</label>
            <input type="text" id="time_require" name="time_require" required>
        </div>
        
        <!-- Hidden input fields for sp_id and service_id -->
    <input type="hidden" id="sp_id" name="sp_id" value="<?php echo $sp_id; ?>">
    <input type="hidden" id="service_id" name="service_id" value="<?php echo $service_id; ?>">

        <button type="submit" class="button">Add Service</button>
        <a href="welcome.php" class="button">Back</a>
        <!-- <a href="logout.php" class="button">
            
            Logout</a> -->
            
    </form>
</div>

</body>
</html>





