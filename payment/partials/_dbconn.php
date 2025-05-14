<?php
$servername = "localhost";
$username = "root";
$password ="";
$database="ohs";

// Create Connections
$conn = mysqli_connect($servername,$username,$password,$database);


//If Connection Failed
if(!$conn){
  die("Sorry we failed to connect: ". mysqli_connect_error());

}
// else{
//   echo "Connected Successfully!!!!!!!!";
// }
?>

