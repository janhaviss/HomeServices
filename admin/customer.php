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
    <h3 id="head" class="text-center">Users Messages</h3>
      <button id="btnn" type="button" onclick="window.location.href = 'cust_message_table.php';" class="btn" style="float: right; background-color:#151c48; color:white; width:150px; font-size:12px; border-radius: 12px;">Manage Messages</button>
      <table  class="table table-bordered table-hover">
  <thead>
    <tr>
  <th scope="col">S.N</th>
   <th scope="col">User Name</th>
   <th scope="col">User Email</th>
   <th scope="col">Message</th>
   <th scope="col">Timestamp</th>
   <th scope="col">Admin Reply</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM `contactUs`";
    $result = mysqli_query($conn,$sql);
    $msg_id = 0 ; //so even if the gap come or got anything deleted it will be in order its come from here and not database

    while($row = mysqli_fetch_assoc($result)){
    $msg_id = $msg_id + 1;
    echo  "<tr>
    <td>". $msg_id . " </td>
      <td>". $row['user_name'] . "</td>
      <td>". $row['user_email'] . "</td>
      <td>". $row['message'] . "</td>
      <td>". $row['tstamp'] . "</td>
      <td>". $row['admin_reply'] . "</td>
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

      <hr style=" border: 0;height: 1px;background-color: #ccc; margin: 20px 0;">     
<div class="container">
 <div class="row">
   <div class="col-lg-12">
    <div class="table-responsive">
    <h3 id="head" class="text-center">Users Comments</h3>
      <button id="btnn" type="button" onclick="window.location.href = 'cust_comment_table.php';" class="btn" style="float: right; background-color:#151c48; color:white; width:150px; font-size:12px; border-radius: 12px;">Manage Comment</button>
      <table  class="table table-bordered table-hover">
    
      <tr>
  <th scope="col">S.N</th>
   <th scope="col">Comment</th>
   <th scope="col">Service Id</th>
   <th scope="col">Comment By</th>
   <th scope="col">Timestamp</th>
   
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM `comments`";
    $result = mysqli_query($conn,$sql);
    $comm_id = 0 ; //so even if the gap come or got anything deleted it will be in order its come from here and not database

    while($row = mysqli_fetch_assoc($result)){
        $user_id = $row['comment_by'];
        $sql_user = "SELECT * FROM `users` WHERE user_id = $user_id";
        $result_user = mysqli_query($conn, $sql_user);
        if (!$result_user) {
          die("no user found " . mysqli_error($conn));
      }
        $row_user = mysqli_fetch_assoc($result_user);
        $firstname=$row_user['firstname'];

       

        $service_id=$row['service_id'];
        $sql_sp = "SELECT * FROM `services` WHERE service_id = $service_id";
        $result_sp = mysqli_query($conn, $sql_sp);
        $row_sp = mysqli_fetch_assoc($result_sp);
    $services_name=$row_sp['services_name'];

    
    $comm_id = $comm_id + 1;
      
    echo  "<tr>
    <td>". $comm_id . " </td>
      <td>". $row['comment_content'] . "</td>
      <td>".$services_name. "</td>
      <td>".$firstname."</td>
      <td>". $row['comment_time'] . "</td>
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
