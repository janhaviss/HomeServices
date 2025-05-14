<?php
$insert = false;
$update = false;
$delete = false;
 
include 'partials/_dbconn.php'; 

//for GET DELETE
  if(isset($_GET['delete'])){
    $sp_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `service_provider` WHERE `sp_id` = $sp_id";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['sp_id'])){
  // Update the record
  $sp_id=$_POST['sp_id'];
  $sp_name = $_POST['sp_name'];
  $occupation = $_POST['occupation'];
  $state = $_POST['state'];
//   $email = $_POST['email'];;
  $city = $_POST['city'];
  $phone = $_POST['phone'];
  
 
  //sql query
  $sql = "UPDATE `service_provider` SET `sp_name` ='$sp_name',`occupation`= '$occupation',`city`='$city',`phone`='$phone',`state`='$state' WHERE `service_provider`.`sp_id` = $sp_id";
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
    <!-- Edit Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
Edit Modal
</button> -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">service_provider Management</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="provider_table.php" method="post">
        <input type="hidden" name="sp_id" id="sp_id">
        <div class="form-group">
        <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="sp_name">Full name</label>
            <input class="form-control" id="sp_name" type="text" name="sp_name">
            </div>
                            <!-- Form Group (last name)-->
            <div class="col-md-6">
              <label class="small mb-1" for="occupation">Occupation</label>
              <input class="form-control" id="occupation" type="text" name="occupation">
            </div>
          </div>
                        <!-- Form Row        -->
          <div class="row gx-3 mb-3">
          <div class="col-md-6">
          <label class="small mb-1" for="city">City</label>
          <input class="form-control" id="city" type="text" name="city">
          </div>

                            <!-- Form Group (location)-->
                 <div class="col-md-6">
                            <label class="small mb-1" for="state">state</label>
                            <input class="form-control" id="state" type="text" name="state">
                        </div>

                        </div>
                        <!-- Form Group (email address)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <!-- <div class="col-md-6">
                            <label class="small mb-1" for="email">Email address</label>
                            <input class="form-control" id="email" type="email" name="email">
                        </div> -->
                        <div class="col-md-6">
                                <label class="small mb-1" for="phone">phone number</label>
                                <input class="form-control" id="phone" type="tel" name="phone">
                            </div>
</div>


        </div>
        </div>
        <button type="submit" class="btn btn-info">Update</button><br>
        </div>
        
      </form>



    </div>
  </div>
</div>

    <!-- For showing the alert -->
    <?php
    if($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Added Successfully!</strong> User has been Added.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    }
    ?>
     <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Provider has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Provider has been updated successfully
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
        <th scope="col">SP_Id</th>
         <th scope="col">Full Name</th>
         <th scope="col">Occupation</th>
         <th scope="col">City</th>
         <th scope="col">State</th>
         <!-- <th scope="col">Email</th> -->
         <th scope="col">phone</th>
         <th scope="col">Edit</th>
         <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT * FROM `service_provider`";
          $result = mysqli_query($conn,$sql);
          $sp_id = 0 ; //so even if the gap come or got anything deleted it will be in order its come from here and not database

          while($row = mysqli_fetch_assoc($result)){
          $sp_id = $sp_id + 1;
          echo  "<tr>
          <td>". $sp_id . " </td>
            <td>". $row['sp_name'] . "</td>
            <td>". $row['occupation'] . "</td>
            <td>". $row['city'] . "</td>
            <td>". $row['state'] . "</td>
            <td>". $row['phone'] . "</td>

            <td><button class='edit btn btn-sm btn-info' id=". $row['sp_id'] .">Edit</button> </td>
            <td><button class='delete btn btn-sm btn-danger' id=". $row['sp_id'] .">Delete</button></td>
            </tr>"; 
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
          sp_nameEdit= tr.getElementsByTagName("td")[1].innerText;
          occupationEdit= tr.getElementsByTagName("td")[2].innerText;
          cityEdit=tr.getElementsByTagName("td")[3].innerText;
          stateEdit=tr.getElementsByTagName("td")[4].innerText;
          // emailEdit=tr.getElementsByTagName("td")[6].innerText;          
          phoneEdit=tr.getElementsByTagName("td")[5].innerText;          


          //console.log(sp_name,occupation);
          sp_name.value = sp_nameEdit;
          occupation.value  = occupationEdit;
          state.value = stateEdit;
          // email.value = emailEdit;
          city.value = cityEdit;
          phone.value = phoneEdit;
          
          sp_id.value = e.target.id;
          console.log(e.target.id);
          $('#editModal').modal('toggle')

        })
      })

      // For deleting the record
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit " );
        service_provider_id = e.target.id.substr(); //substr is JS ka method which 1 ko fetch karke baki sab show karega

        if (confirm("Are you sure you want to delete this service provider!")) {
          console.log("yes");
          window.location = `provider_table.php?delete=${service_provider_id}`; 
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