<!-- ADD THAT TODO LIST THING -->
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

$delete = false;

//for GET DELETE
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `manageservices` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Link for CSS From DataTables jQuery Site -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>Delete Service </title>

    <style>
    /* table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;} */
    </style>
  </head>
  <body>

  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your service has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Service Name</th>
      <th scope="col">Services Description</th>
      <th scope="col">Category</th>
      <th scope="col">Time Require</th>
      <th scope="col">Fees</th>
      <th scope="col">Added on</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $service_id = $_SESSION['service_id'];
    $sql = "SELECT * FROM `manageservices` where service_id = $service_id";
    $result = mysqli_query($conn,$sql);
    $sno = 0 ; //so even if the gap come or got anything deleted it will be in order its come from here and not database

    while($row = mysqli_fetch_assoc($result)){
    $sno = $sno + 1;
    echo  "<tr>
      <th scope='row'>". $sno . " </th>
      <td>". $row['service_name'] . "</td>
      <td>". $row['services_description'] . "</td>
      <td>". $row['sub_services'] . "</td>
      <td>". $row['time_require'] . "</td>
      <td>". $row['fees'] . "</td>
      <td>". $row['timestamp'] . "</td>
<td>      
      <button class='delete btn btn-sm btn-primary' id=d". $row['sno'] .">Delete</button></td>
      </tr>"; 
    }
    ?>
  
 
  </tbody> 
</table>
<a href="welcome.php" class="button">Back</a>
</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


     <!-- Data table sites jQuery -->
     <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
     
    <script>
      let table = new DataTable('#myTable');
    </script>
 <script>
// For deleting the record
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete " );
        sno = e.target.id.substr(1); //substr is JS ka method which 1 ko fetch karke baki sab show karega

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `deleteServices.php?delete=${sno}`; 
         
        }
        else {
          console.log("no");
        }
      })
    })
    </script>
    
    <?php
// Output the user's appointments and add a delete button for each
while ($row = $result->fetch_assoc()) {
    echo "<p>Servie name: " . $row['service_name'] . "</p>";
    echo "<p>services description: " . $row['services_description'] . "</p>";
    echo "<p>Category: " . $row['sub_services'] . "</p>";
    echo "<p>timeTRequire: " . $row['time_require'] . "</p>";
    echo "<p>Fees: " . $row['fees'] . "</p>";
    echo "<p>Added on: " . $row['timestamp'] . "</p>";
    echo "<a href='delete_appointment.php?delete=" . $row['appointment_id'] . "'>Delete</a>";
}
?>


</body>
</html>

