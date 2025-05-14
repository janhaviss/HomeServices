<?php
$insert = false;
$update = false;
$delete = false;
 
include 'partials/_dbconn.php'; 

//for GET DELETE
  if(isset($_GET['delete'])){
    $booking_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `booking` WHERE `booking_id` = $booking_id";
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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <!-- Link for CSS From DataTables jQuery Site -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<style>

.table thead th  {
    vertical-align: top;
    border-top: 1px solid #dee2e6;
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
  <a class="navbar-brand mb-0 h1" href="welcome.php">soobinsolutions</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
   
    <!-- For showing the alert -->
    
     <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Booking has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>


    <div class=" my-4" style="margin: 0 50px 0 50px;backgroud-color: #f2f2f2">

      <table class="table" id="myTable">
      <thead>
    <tr>
  <th scope="col">S.N</th>
   <th scope="col">User</th>
   <th scope="col">Service</th>
   <th scope="col">Date</th>
   <th scope="col">TimeSlot</th>
   <th scope="col">Address</th>
   <th scope="col">Phone</th>
   <th scope="col">Special Request</th>
   <th scope="col">Booking Status</th>
   <th scope="col">Fees</th>
   <!-- <th scope="col">Payment Status</th> -->
   <th scope="col">Created At</th>
   <th scope="col">Updated At</th>
   <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
        // Fetch and display booking details
        $sql = "SELECT * FROM `booking`";
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

            // Check if user details were fetched successfully
            if (mysqli_num_rows($result_user) > 0) {
                // Fetch user details
                $row_user = mysqli_fetch_assoc($result_user);
                // Display user details
                $booking_id = $booking_id + 1;

                echo "<tr>
                    <th scope='row'>". $booking_id . " </th>
                    <td>". $row_user['firstname'] . "</td>
                    <td>". $row_service['service_name'] . "</td>          
                    <td>". $row['Date'] . "</td>
                    <td>". $row['timeslot'] . "</td>
                    <td>". $row['address'] . "</td>
                    <td>". $row['phone'] . "</td>
                    <td>". $row['specialrequests'] . "</td>
                    <td>". $row['bookingstatus'] . "</td>
                    <td>". $row['fees'] . "</td>
                    
                    <td>". $row['createdAt'] . "</td>
                    <td>". $row['updatedAt'] . "</td>
                    <td><button class='delete btn btn-sm btn-danger' id=". $row['booking_id'] .">Delete</button></td>
               
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

      // For deleting the record
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit " );
        booking_id = e.target.id.substr(); //substr is JS ka method which 1 ko fetch karke baki sab show karega

        if (confirm("Are you sure you want to delete this booking!")) {
          console.log("yes");
          window.location = `user_booking_table.php?delete=${booking_id}`; 
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
<!-- <td>". $row['paymentstatus'] . "</td> -->