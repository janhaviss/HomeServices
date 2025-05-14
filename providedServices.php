

<?php
           
  //         // Check if the 'add' button is clicked
  //   if(isset($_POST['add_to_cart'])) {
  //     // Get the service ID from the POST data
  //     $service_id = $_POST['service_id'];
      
  //     // Check if the service ID is valid
  //     if($service_id !== "") {
  //         // Add the service ID to the cart session variable
  //         $_SESSION['cart'][] = $service_id;
  //         echo '<script>alert("Service added to cart.");</script>'; // Alert user that the service has been added to the cart
  //     }
  // }

             $sql = "SELECT * FROM manageservices WHERE sub_services = '$subservices_name ' ";
           
             $result = $conn->query($sql);
           
             if ($result->num_rows > 0) {
               // Loop through each row of the result set
               while ($row = $result->fetch_assoc()) {
                   $service_name = $row['service_name'];
                   $service_id = $row['service_id'];
                   $services_description = $row['services_description'];
                   $sub_services = $row['sub_services'];
                   $time_require = $row['time_require'];
                   $fees = $row['fees'];
                   $sp_name = $row['sp_name'];
                   $phone = $row['phone'];
               
                   // Display each service item
                   echo '
                 

                    <div class="container my-3">
                    

                    <div class="card">
                    <div class="card-body">
                        <h2>' . $service_name . '</h2>
                        <p><b>Description of </b>' . $services_description . '<br>
                        <b>Price: </b>Rs. ' . $fees . '</p>
                        <button class="btn btn-outline-warning" type="button" data-toggle="collapse" data-target="#detials" aria-expanded="false" aria-controls="collapseExample">
                        Details
                        </button>

                        <a href="loader.html"><button type="button" class="btn btn-outline-warning my-1">Book Service</button></a>



                   
                      <div class="collapse" id="detials">
                      <div class="card card-body">
                        <p>
                        <b>Service Provided By: </b>'.$sp_name.'<br>
                        <b>Service Provider Contact: </b>'.$phone.'<br>
                        <b>Category: </b>'. $sub_services .'<br>
                       <b>Time Required: </b>'.$time_require.' <br>
                       
                       <b></b></p>
                      </div>
                    </div>
                      

                     

                    </div>
                    </div>
                    
                  
                    </div>  ';
                 
               }
             } else {
                 
             //   echo "No Services found."; // Handle the case when no services are found
               echo '
               
               <div class="card">
                 <div class="card-body">
                 No Services found
                 </div>
             </div>

               ';
             }
           
    
            ?>

