<?php
$insert = false;
$update = false;
$delete = false;
 
include 'partials/_dbconn.php'; 

//for GET DELETE
  if(isset($_GET['delete'])){
    $msg_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `contactus` WHERE `msg_id` = $msg_id";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['msg_id'])){
      // Update the record
      $msg_id=$_POST['msg_id'];
      $admin_reply = $_POST['admin_reply'];
    
     
      //sql query
      $sql = "UPDATE `contactus` SET `admin_reply`='$admin_reply' WHERE `contactus`.`msg_id` = $msg_id";
      $result = mysqli_query($conn,$sql);
      if($result){
        $update = true;
       
    }
    else{
        echo "We could not update the record successfully";
    }
    }
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
    <strong>Success!</strong> Message has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Message has been sent successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Reply To User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="message_table.php" method="post">
        <input type="hidden" name="msg_id" id="msg_id">
        <div class="form-group">
        <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="user_name">User Name</label>
            <input class="form-control" id="user_name" type="text" name="user_name" disabled>
            </div>
                            <!-- Form Group (last name)-->
            <div class="col-md-6">
              <label class="small mb-1" for="user_email">User Email</label>
              <input class="form-control" id="user_email" type="text" name="user_email" disabled>
            </div>
          </div>

                            <!-- Form Group (location)-->
                 <div class="col-md-12">
                            <label class="small mb-1" for="tstamp">Timestamp</label>
                            <input class="form-control" id="tstamp" type="text" name="tstamp" disabled>
</div>

                        <div class="col-md-12">
          <label class="small mb-1" for="message">message</label>
          <textarea class="form-control" id="message" type="text" name="message" disabled></textarea>
          </div>

                        <div class="col-md-12">
          <label class="small mb-1" for="admin_reply">Reply</label>
          <textarea class="form-control" id="admin_reply" type="text" name="admin_reply"></textarea>
          </div>

        </div>
        </div>
        <button type="submit" class="btn btn-info">Update</button><br>
        </div>
        
      </form>



    </div>
  </div>
</div>

    <div class=" my-4" style="margin: 0 50px 0 50px;backgroud-color: #f2f2f2">

      <table class="table" id="myTable">
        <thead>
        <tr>
  <th scope="col">S.N</th>
   <th scope="col">User Name</th>
   <th scope="col">User Email</th>
   <th scope="col">Message</th>
   <th scope="col">Timestamp</th>
   <th scope="col">Admin Reply</th>
   <th scope="col">Reply</th>
    <th scope="col">Delete</th>
   
    </tr>
  </thead>
  <tbody>
  <?php
    $sql = "SELECT * FROM `contactus`";
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
      <td><button class='edit btn btn-sm btn-info' id=". $row['msg_id'] .">Reply</button> </td>
    <td><button class='delete btn btn-sm btn-danger' id=". $row['msg_id'] .">Delete</button></td>
      </tr>
      ";  
          }
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

      edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=> {
        element.addEventListener("click",(e) =>{
          console.log("edit ", );
          tr = e.target.parentNode.parentNode;
          user_nameEdit= tr.getElementsByTagName("td")[1].innerText;
          user_emailEdit= tr.getElementsByTagName("td")[2].innerText;
          messageEdit=tr.getElementsByTagName("td")[3].innerText;
          tstampEdit=tr.getElementsByTagName("td")[4].innerText;
          admin_replyEdit=tr.getElementsByTagName("td")[5].innerText;                  


          //console.log(sp_name,user_email);
          user_name.value = user_nameEdit;
          user_email.value  = user_emailEdit;
          message.value = messageEdit;
          tstamp.value = tstampEdit;
          admin_reply.value = admin_replyEdit;
         
          msg_id.value = e.target.id;
          console.log(e.target.id);
          $('#editModal').modal('toggle')

        })
      })
      // For deleting the record
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit " );
        msg_id = e.target.id.substr(); //substr is JS ka method which 1 ko fetch karke baki sab show karega

        if (confirm("Are you sure you want to delete this message!")) {
          console.log("yes");
          window.location = `message_table.php?delete=${msg_id}`; 
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