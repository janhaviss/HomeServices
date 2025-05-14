<!-- localhost/pathology/admin/offerupdate_table.php -->
<?php
$insert = false;
$update = false;
$delete = false;

include 'partials/_dbconn.php';

//for GET DELETE
  if(isset($_GET['delete'])){
    $offer_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `offers` WHERE `offer_id` = $offer_id";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['offer_idEdit'])){
  // Update the record
  $offer_id = $_POST['offer_idEdit'];
  $offer_name=$_POST['offer_nameEdit'];
  $description=$_POST['descriptionEdit'];
  $start_date=$_POST['start_dateEdit'];
  $end_date=$_POST['end_dateEdit'];
  $discount=$_POST['discountEdit'];
  $conditions=$_POST['conditionsEdit'];
  $availability=$_POST['availabilityEdit'];
  $status=$_POST['statusEdit'];
//   $created_by='admin';
//   $last_updated_by='admin';
  

  $sql = "UPDATE `offers` SET `offer_name`='$offer_name', `description`='$description', `start_date`='$start_date', `end_date`='$end_date', `discount`='$discount', `conditions`='$conditions', `availability`='$availability', `status`='$status', `last_updated_at`=current_timestamp() WHERE `offers`.`offer_id` = $offer_id";


  
  $result = mysqli_query($conn,$sql);
  if($result){
    $update = true;
   
  }
  else{
      echo "We could not update the record successfully";
  }
}
else{
$offer_id = $_POST['offer_id'];
  $offer_name=$_POST['offer_name'];
  $description=$_POST['description'];
  $start_date=$_POST['start_date'];
  $end_date=$_POST['end_date'];
  $discount=$_POST['discount'];
  $conditions=$_POST['conditions'];
  $availability=$_POST['availability'];
  $status=$_POST['status'];
//   $created_by='admin';
//   $last_updated_by='admin';

  $service_id=$_POST['service_id'];

    // $sql_service = "SELECT * FROM `services` WHERE `services_name` = 'Salon'";
    // $result_service = mysqli_query($conn, $sql_service);
    // $row_service = mysqli_fetch_assoc($result_service);
    // $service_id=$row_service['service_id'];
    // echo $service_id;
    
    
    
    //sql query
    
    $sql = "INSERT INTO `offers` (`offer_id`,`offer_name`,`service_id`, `description`, `start_date`, `end_date`,`discount`,`conditions`, `availability`, `status`, `created_at`,`created_by`,`last_updated_by`,`last_updated_at`) VALUES ('$offer_id','$offer_name','$service_id','$description','$start_date','$end_date','$discount','$conditions','$availability','$status',current_timestamp(),'admin','admin', current_timestamp())";
    $result = mysqli_query($conn,$sql);

    if($result){
      // echo "record successfully inserted<br>";
      $insert=true;
    }
    else{
      echo "not inserted -->" . mysqli_connect_error($conn);
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
    fieldset {
  background-color: #eeeeee;
}

legend {
  background-color: grey;
  color: black;
  padding: 8px 15px;
}


.table thead th  {
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

  th{
    background-color:grey;
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
  <a class="navbar-brand mb-0 h1" href="welcome.php">SoobinSolutions</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit offer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="updatemaint_offers.php" method="post">
        <input type="hidden" name="offer_idEdit" id="offer_idEdit">
        <div class="form-group">
        <div class="row gx-3 mb-3">
        <div class="col-md-6">
            <label class="small mb-1" for="offer_nameEdit">Offer Name</label>
            <input class="form-control" id="offer_nameEdit" type="text" name="offer_nameEdit">
            </div>
            
            <div class="col-md-6">
            <label class="small mb-1" for="service_nameEdit">Service Name</label>
            <input class="form-control" id="service_nameEdit" type="text" name="service_nameEdit">
            </div> 
            <!-- Form Group (last name)-->
           
          </div>
                        <!-- Form Row        -->
          <div class="row gx-3 mb-3">
                  
          <div class="col-md-6">
          <label for="start_dateEdit">Start End</label>
        <input class="form-control" id="start_dateEdit" name="start_dateEdit" type="date">
          </div>

          <div class="col-md-6">
        <label class="small mb-1" for="end_dateEdit">End date</label>
        <input class="form-control" id="end_dateEdit" type="date" name="end_dateEdit">
        </div>
          
                            <!-- Form Group (location)-->
          <div class="col-md-6">
        <label class="small mb-1" for="discountEdit">Discount</label>
        <input class="form-control" id="discountEdit" type="text"  name="discountEdit">
        </div>

        <div class="col-md-6">
          <label for="statusEdit">Status</label>
        <input class="form-control rounded-0" id="statusEdit" name="statusEdit" type="text">
          </div>
    
        </div>
                  
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (created_at number)-->
                            <div class="col-md-6">
                            <label class="small mb-1" for="availabilityEdit">Availablity</label>
                            <input class="form-control" id="availabilityEdit" type="text" name="availabilityEdit">
                        </div>

                        <div class="col-md-6">
                            <label class="small mb-1" for="conditionsEdit">Conditions</label>
                            <input class="form-control" id="conditionsEdit" type="text" name="conditionsEdit">
                        </div>
                        
                        </div>
                        <div class="col-md-10">
              <label class="small mb-1" for="descriptionEdit">Description</label>
              <textarea class="form-control" id="descriptionEdit" type="text" name="descriptionEdit"></textarea>
            </div>
        </div>
        </div>

        <button type="submit" class="btn btn-info">Update</button>
      </form>
      </div>
      
    </div>
  </div>
</div>

    <!-- For showing the alert -->
    <?php
    if($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Added Successfully!</strong> offer has been Added.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    }
    ?>
     <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your offer has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your offer has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

<!-- #######3 add offer ####### -->

    <div class="my-4" style="margin: 0 50px 0 50px">
      <h4> Plumbing-1 Salon-2 Electrician-3 Carpenter-4 Cleaning-5 Painter-6</h4>
  <form action="updatemaint_offers.php" method="post">
  <input type="hidden" name="offer_id" id="offer_id">
  <fieldset >
      <legend>Add offer:</legend>
        <div class="form-group">

        <div class="row gx-3 mb-3">
            <div class="col-md-6" >
            <label class="small mb-1" for="offer_name">Offer Name</label>
            <input class="form-control" id="offer_name" type="text" name="offer_name">
            </div>

            <div class="col-md-6">
            <label class="small mb-1" for="service_id">Service Id</label>
            <input class="form-control" id="service_id" type="number" name="service_id">
            </div> 
            
          </div>
                        <!-- Form Row        -->
          <div class="row gx-3 mb-3">
                  
          <div class="col-md-6">
          <label for="start_date">Start Date</label>
          <input class="form-control" id="start_date" name="start_date" type="date">
          </div>

          <div class="col-md-6">
        <label class="small mb-1" for="end_date">End date</label>
        <input class="form-control" id="end_date" type="date" name="end_date">
        </div>

          </div>
          
          <div class="row gx-3 mb-3">                <!-- Form Group (location)-->
        <div class="col-md-6">
        <label class="small mb-1" for="discount">Discount</label>
       <input class="form-control" id="discount" type="text"  name="discount">
        </div>

        <div class="col-md-6">
          <label for="status">Status</label>
            <input class="form-control" id="status" name="status" type="text">
          </div>
            
        </div>
                       
                        <!-- Form Row-->
        <div class="row gx-3 mb-3">
                            <!-- Form Group (created_at number)-->
            <div class="col-md-6">
            <label class="small mb-1" for="availability">Availablity</label>
            <input class="form-control" id="availability" type="type" name="availability">
            </div>

            <div class="col-md-6">
            <label class="small mb-1" for="conditions">Conditions</label>
            <input class="form-control" id="conditions" type="type" name="conditions">
            </div>
                        </div>


            <div class="col-md-12">
              <label class="small mb-1" for="description">Description</label>
              <input class="form-control" id="description" type="text" name="description">
            </div>

        </div>
        <div class="text-center">
        <button type="submit" class="btn" style="background-color:#151c48; color:white; width:150px; font-size:16px; border-radius: 12px; margin-bottom:10px;">Add</button>
</div>
        </fieldset>
      </form>
    </div>
<hr>
    <div style="margin: 50px 50px 50px 50px">

      <table class="table" id="myTable">
      <thead>
    <tr>
  <th scope="col">S.N</th>
   <th scope="col">Service</th>
   <th scope="col">Offer Name</th>
   <th scope="col">Description</th>
   <th scope="col">Start Date</th>
   <th scope="col">End Date</th>
   <th scope="col">Discount</th>
   
   <th scope="col">Availablity</th>
   <th scope="col">Conditions</th>
   <th scope="col">Status</th>
   <th scope="col">Created At</th>
   <th scope="col">Last Updated At</th>
   <th scope="col">Created By</th>
   <th scope="col">Last Updated By</th>
   <th scope="col">Edit</th>
   <th scope="col">Delete</th>
   
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
      
      <td>". $row['availability'] . "</td>
      <td>". $row['conditions'] . "</td>
      <td>". $row['status'] . "</td>
      <td>". $row['created_at'] . "</td>
      <td>". $row['last_updated_at'] . "</td>
      <td>". $row['created_by'] . "</td>
      <td>". $row['last_updated_by'] . "</td>
      <td><button class='edit btn btn-sm btn-info' id=". $row['offer_id'] .">Edit</button></td>
      <td><button class='delete btn btn-sm btn-danger' id=". $row['offer_id'] .">Delete</button></td>



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
          service_name= tr.getElementsByTagName("td")[1].innerText;
          offer_name= tr.getElementsByTagName("td")[2].innerText;
          description= tr.getElementsByTagName("td")[3].innerText;
          start_date= tr.getElementsByTagName("td")[4].innerText;
          end_date= tr.getElementsByTagName("td")[5].innerText;
          discount= tr.getElementsByTagName("td")[6].innerText;
          
          availability= tr.getElementsByTagName("td")[7].innerText;
          conditions= tr.getElementsByTagName("td")[8].innerText;
          status= tr.getElementsByTagName("td")[9].innerText;
        //   created_at= tr.getElementsByTagName("td")[10].innerText;
        //   last_updated_at= tr.getElementsByTagName("td")[11].innerText;
        //   created_by= tr.getElementsByTagName("td")[12].innerText;
        //   last_updated_by= tr.getElementsByTagName("td")[13].innerText;


        //   console.log(offer_name,description);
        service_nameEdit.value = service_name;
          offer_nameEdit.value = offer_name;
          descriptionEdit.value  = description;
          start_dateEdit.value=start_date;
          end_dateEdit.value  = end_date;
          discountEdit.value  = discount;
          conditionsEdit.value = conditions;
          availabilityEdit.value  = availability;
          statusEdit.value  = status;
        //   created_atEdit.value  = created_at;
        //   last_updated_atEdit.value = last_updated_at;
        //   created_byEdit.value = created_by;
        //   last_updated_byEdit.value = last_updated_by;

          offer_idEdit.value = e.target.id;
          console.log(e.target.id);
          $('#editModal').modal('toggle')

        })
      })

      // For deleting the record
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit " );
        offer_id = e.target.id.substr(); //substr is JS ka method which 1 ko fetch karke baki sab show karega

        if (confirm("Are you sure you want to delete this offer!")) {
          console.log("yes");
          window.location = `offers_table.php?delete=${offer_id}`; 
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