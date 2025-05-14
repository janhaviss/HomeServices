<?php
require 'partials/_dbconn.php'
?>
<!DOCTYPE html>
<html>
<head>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
#head, #btnn{
  display: inline-block;
}
.table thead th  {
    vertical-align: bottom;
    border: 0.5px solid black;
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
<div class="container">
 <div class="row">
   <div class="col-lg-12">
    <div class="table-responsive">
    <h3 id="head" class="text-center">Offers of SoobinSolutions</h3>
      <button id="btnn" type="button" onclick="window.location.href = 'offers_table.php';" class="btn" style="float: right; background-color:#151c48; color:white; width:150px; font-size:12px; border-radius: 12px;">Manage offers</button>
      <table  class="table table-bordered table-hover">
  <thead>
    <tr>
  <th scope="col">S.N</th>
   <th scope="col">Service</th>
   <th scope="col">Offer Name</th>
   <th scope="col">Description</th>
   <th scope="col">Start Date</th>
   <th scope="col">End Date</th>
   <th scope="col">Discount</th>
   <th scope="col">Conditions</th>
   <th scope="col">Availablity</th>
   <th scope="col">Status</th>
   <th scope="col">Created At</th>
   <th scope="col">Last Updated At</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM `offers`";
    $result = mysqli_query($conn,$sql);
    $offer_id = 0 ; //so even if the gap come or got anything deleted it will be in order its come from here and not database


    while($row = mysqli_fetch_assoc($result)){
      $service_id = $row['service_id'];
      $sql_service = "SELECT * FROM `services` WHERE service_id = $service_id";
      $result_service = mysqli_query($conn, $sql_service);
      $row_service = mysqli_fetch_assoc($result_service);
      $service_name=$row_service['services_name'];

    $offer_id = $offer_id + 1;
    echo  "<tr>
    <td>". $offer_id . " </td>
      <td>". $service_name . "</td>
      <td>". $row['offer_name'] . "</td>
      <td>". $row['description'] . "</td>
      <td>". $row['start_date'] . "</td>
      <td>". $row['end_date'] . "</td>
      <td>". $row['discount'] . "</td>
      <td>". $row['conditions'] . "</td>
      <td>". $row['availability'] . "</td>
      <td>". $row['status'] . "</td>
      <td>". $row['created_at'] . "</td>
      <td>". $row['last_updated_at'] . "</td>

      </tr>
      "; 
    }
    ?>
    </tbody>
</table>
      </div>
      </div>
      </div>
      </div>

      


</body>
</html>
