
<?php
    
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
                   $sno = $row['sno'];

                 
               
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

                      
                      <a href="booking.php?service_name=' . urlencode($service_name) . '&sub_services=' . urlencode($sub_services) . '&fees=' . urlencode($fees) . '&service_id=' . urlencode($service_id) .'&sno='. urlencode($sno) .'">
                        <button type="button" class="btn btn-outline-warning my-1">Book Service</button>
                     </a>

                   
                      <div class="collapse" id="detials">
                      <div class="card card-body">
                        <p>
                        <b>Service Provided by: </b>'.$sp_name.'<br>
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
           
            //  var_dump($_SESSION);
            ?>

<!-- <a href="loader.html"><button type="button" class="btn btn-outline-warning my-1">Book Service</button></a> {can not add this atp giving sno not applicable when added} -->