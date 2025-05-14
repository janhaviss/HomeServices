<?php
// session_start();

$_SESSION['loggedin'] = true;
// $_SESSION['firstname'] = 'mruna'; 

?>

<?php
echo '
    <div >
      <nav class="navbar navbar-expand-lg navbar-light mx-4" style="background: #487f78;">
        <a
          class="navbar-brand"
          href="index.php"
          style="font-family: "Sofia", sans-serif; font-size: 25px">
          <img src="img/logo.png" alt="" style="
          height : 100%;
          width : 100%;
          margin-top: 1px;">
       
          
          </a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
          <ul class="navbar-nav ml-auto mx-4">
            <li class="nav-item mx-2" >
              <a class="nav-link" href="/homeservices/index.php" style="color:#fff"><b >Home</b></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="/homeservices/about.html" style="color:#fff"><b>About</b></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="contactUs.php" style="color:#fff"><b>Contact</b></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" data-toggle="modal" href="#exampleModalCenter" style="color:#fff"><b>Login</b></a>
            </li>

          
          </ul>


          </div>


        </div>
      </nav>
    </div>

';

?>
  

<!-- 

  <button  type="button" class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Signup</button> -->


 <!-- Modal for three modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
         <button type="button" class="btn" id="modbtn" onclick="window.location.href='users/login.php';"><i class="far fa-user pr-2" aria-hidden="true"></i>User</button><br>
        <button type="button" class="btn" id="modbtn"  onclick="window.location.href='admin/login.php';"><i class="fa-solid fa-user-tie" aria-hidden="true"></i>Admin</button><br>
    <button type="button" class="btn" id="modbtn" onclick="window.location.href='provider/login.php';"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>Service Provider</button>
       
  </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>