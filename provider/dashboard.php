<!-- db connection -->
<?php
require 'partials/_dbconn.php';
?>


   <div class="container">
   <!-- <h2>Services</h2> -->
   <h2 class="mx-4">Manage Services</h2>
   <a href="manageServices.php"><button type="button" class="btn btn-outline-info my-3">Add Services</button><a>
   <a href="deleteServices.php"><button type="button" class="btn btn-outline-info my-3">Delete Services</button><a>

<div class="row">
    <ul class="service-list">

<?php
// to ensure the login persons dashboard is only visible

if (isset($_SESSION['sp_name'])){
  $sp_name= $_SESSION['sp_name'];
  // $sql = "SELECT `service_id`, `service_name`, `services_description`, `sub_services`, `time_require`, `fees` from `manageservices`where sp_id = $sp_id";

  // $sql = "SELECT ms.`service_id`, ms.`service_name`, ms.`services_description`, ms.`sub_services`, ms.`time_require`, ms.`fees`, sp.`sp_name` FROM `manageservices` ms INNER JOIN `service_provider` sp ON ms.`sp_id` = sp.`sp_id` WHERE ms.`sp_id` = $sp_id";


  $sql = "SELECT * FROM manageservices WHERE sp_name = '$sp_name'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        $service_name = $row['service_name'];
        $services_description = $row['services_description'];
        $sub_services = $row['sub_services'];
        $time_require = $row['time_require'];
        $fees = $row['fees'];
    
        // Display each service item
        echo '
            <li class="service-item">
                <h2>' . $service_name . '</h2>
                <p><b>Description of </b>' . $services_description . '</p>
                <p><b>Category: </b>' . $sub_services . '</p>
                <p><b>Time Required: </b>' . $time_require . '</p>
                <p><b>Price: </b>Rs. ' . $fees . '</p>
            </li>
        ';
    }
  } else {
    echo '
    
   <div class="container my-3">
   <div class="jumbotron jumbotron-fluid" style="border-radius: 5px;">
   <div class="container">
     <h1 class="display-4">No Services Avaliable</h1>
     <p class="lead">Let start the journey with SoobinSolution. Please enter the service you want to provide</p>
   </div>
 </div>
   </div>
  
    '; // Handle the case when no services are found
  }
} else {
echo '
     <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Services not found in the session.</li>
  </ol>
</nav>

'; // Handle the case when session data is not set
}

?>

        <!-- <li class="service-item">
            <h2>Service 2</h2>
            <p>Description of Service 2.</p>
            <p>Price: $75</p>
        </li>
        <li class="service-item">
            <h2>Service 3</h2>
            <p>Description of Service 3.</p>
            <p>Price: $100</p>
        </li> -->
     </ul>

    </div>

   </div>


  


   </div>
   <!-- services-Avalibale - by this particular provider END -->

   