<?php
session_start(); // Start the session

// Connect to your database 
include 'partials/_dbconn.php';




// if (mysqli_num_rows($result)) {
//   // Loop through each row to generate option elements
//   while ($row = mysqli_fetch_assoc($result)) {
//     $comment_id = $row["comment_id"];
//     $comment_content = $row["comment_content"];
//     $comment_by = $row["comment_by"];

//     // echo $comment_id;
//     // echo $comment_content;
//     // echo $service_id;
//     // echo $comment_by;

    
// }
// } else {
//   echo 'no comments';
// }



// var_dump($row);
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


    <title>Comments </title>

<div class="container my-4">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Content</th>
      <th scope="col">Commented By</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
  <?php
  //  if (mysqli_num_rows($result)) {
  //   // Loop through each row to generate option elements
  //   $service_id = $_SESSION['service_id'];
  //   // $service_id = $row["service_id"];
  //   // $sql = "SELECT * FROM comments WHERE service_id = $service_id";
  //   $sql = "SELECT c.comment_id, c.comment_content, u.firstname, c.comment_time 
  //   FROM comments c 
  //   INNER JOIN users u ON c.comment_by = u.user_id 
  //   WHERE c.service_id = $service_id";
  
  //   $result = mysqli_query($conn,$sql);
  //   $sno = 0 ; //so even if the gap come or got anything deleted it will be in order its come from here and not database

  //   while ($row = mysqli_fetch_assoc($result)) {
  //     $comment_id = $row["comment_id"];
  //     $comment_content = $row["comment_content"];
  //     // $comment_by = $row["comment_by"];
  //     $comment_by = $row["firstname"];
  //     $comment_time = $row["comment_time"];

  //      $sno = $sno + 1;
  //     echo  "<tr>
  //     <th scope='row'>". $sno . " </th>
  //     <td>". $comment_content. "</td>
  //     <td>".$comment_by. "</td>
  //     <td>". $comment_time . "</td>
  //     </tr>"; 
  //   }
    
  // }
  // else{

  //   echo 'no comments';
  // }

    ?>

<?php
// Check if $_SESSION['service_id'] is set and not empty
if (isset($_SESSION['service_id']) && !empty($_SESSION['service_id'])) {
    // Proceed with the query execution
    $service_id = $_SESSION['service_id'];
    $sql = "SELECT c.comment_id, c.comment_content, u.firstname, c.comment_time 
            FROM comments c 
            INNER JOIN users u ON c.comment_by = u.user_id 
            WHERE c.service_id = $service_id";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query execution was successful
    if ($result !== false) {
        // Check if there are any rows returned by the query
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row to generate option elements
            $sno = 0; // Initialize counter
            while ($row = mysqli_fetch_assoc($result)) {
                $sno++;
                $comment_id = $row["comment_id"];
                $comment_content = $row["comment_content"];
                $comment_by = $row["firstname"]; // Fetch firstname instead of user_id
                $comment_time = $row["comment_time"];

                echo  "<tr>
                        <td>". $sno . " </td>
                        <td>". $comment_content. "</td>
                        <td>".$comment_by. "</td>
                        <td>". $comment_time . "</td>
                       </tr>"; 
            }
        } else {
            echo 'No comments found.';
        }
    } else {
        // Handle the case where the query execution failed
        echo 'Error executing the query: ' . mysqli_error($conn);
    }
} else {
    // Handle the case where $_SESSION['service_id'] is not set or empty
    echo 'Error: $_SESSION[\'service_id\'] is not set or empty.';
}
?>

  
 
  </tbody> 
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


     <!-- Data table sites jQuery -->
     <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
     
    <script>
      let table = new DataTable('#myTable');
    </script>

<?php
// Output the user's appointments and add a delete button for each
while ($row = $result->fetch_assoc()) {
    echo "<p>Content: " . $row['comment_content'] . "</p>";
    echo "<p>Comment By: " . $row['comment_by'] . "</p>";
    echo "<p>Time: " . $row['comment_time'] . "</p>";
    
}
?>

</body>
</html>


