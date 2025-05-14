<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<style>

    body{
        background:#487f78;
    }
    .center {
  border-radius:15px;
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
  width: 700px;
  height: 350px;
  text-align: center;
}

.block {
    border-radius: 14px;
  display: flex;
  width: 100%;
  height: 25%;
  border: 1px solid;
  background-color: #fff;
  color: black;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
}

.block:hover {
  background-color: #ddd;
  color: black;
}

.seven h6 {
    text-align: center;
        font-size:15px;
         color:#222; 
         letter-spacing:1px;
        text-transform: uppercase;
    font-weight: bolder;
        display: grid;
        grid-template-columns: 1fr max-content 1fr;
        grid-template-rows: 27px 0;
        grid-gap: 20px;
        align-items: center;
    }
    
    .seven h6:after,.seven h6:before {
        content: " ";
        display: block;
        border-bottom: 2px solid #487f78;
        border-top: 2px solid #487f78;
        height: 5px;
      background-color:#f8f8f8;
    }


    /* PAY BY CASH- Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      border-radius: 8px;
    }

    .modal-content h2 {
      text-align: center;
      margin-top: 0;
    }

    .modal-content p {
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .modal-content hr {
      border: 0.5px solid #ddd;
    }

    .modal-content button {
      padding: 10px 20px;
      margin: 10px;
      cursor: pointer;
      border: none;
      border-radius: 4px;
      font-size: 16px;
    }

    .modal-content button.cancel-btn {
      background-color: #ccc;
      color: black;
    }

    .modal-content button.confirm-btn {
      background-color: #4CAF50;
      color: white;
    }

    .modal-content button:hover {
      opacity: 0.8;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }


    
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mb-0 h1" href="/users/welcome.php">soobinsolutions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

<div class="container my-3">
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Notice!</h4>
  <p>Please ensure that you verify your payment history with timestamp in your profile section once payment has been sucessfully completed to avoid multiple payments. Thank you</p>
  <hr>
  <p class="mb-0">Welcome to a world where home maintenance is hassle-free. Thank you for choosing SoobinSolutions</p>
</div>
</div>

<div class="center" style="background-color: #fff; box-shadow:15px" >
    <div class="seven">
        <h6>Proceed with the payment</h6>
      </div>
     
    <div class="card" style="width: 30rem;  top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);">
        <div class="card-body">
          <h5 class="card-title" style=" margin-bottom: 20px;">Choose Payment Method</h5>
          <!-- <form method='post'> -->
          <input type='hidden' name='booking_id' value='pbc'>
          <button class="block" name='confirm' onclick="window.location.href='PayByCash.php';"><i class="fa-solid fa-money-bill" style="color: #338b13;"></i>&nbsp;Pay by Cash</button>
          <!-- </form> -->
          <button onclick="window.location.href='payment_page.php';" class="block"><i class="fa-solid fa-credit-card" style="color: #74C0FC;"></i>&nbsp;Online Payment (Card)</button>
        </div>
      </div>
</div>



<!-- PAY BY CASH - Modal -->
<div class="container">
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Pay for Home Service by Cash</h2>
    <p>Thank you for choosing to pay by cash for your home service. Please review the details below:</p>
    <hr>
    <p><strong>Service Details:</strong></p>
    <p>Service: [Service Name]</p>
    <p>Date: [Service Date]</p>
    <p>Time: [Service Time]</p>
    <hr>
    <p><strong>Payment Details:</strong></p>
    <p>Total Amount: [Total Amount]</p>
    <hr>
    <p><strong>Payment Instructions:</strong></p>
    <p>Please have the exact amount ready in cash for the service.</p>
    <p>Payment will be collected by our service provider at the end of the service.</p>
    <hr>
    <p><strong>Contact Information:</strong></p>
    <p>If you have any questions or need to reschedule, please contact us at:</p>
    <p>Email: support@example.com</p>
    <p>Phone: +1234567890</p>
    <hr>
    <p><strong>Note:</strong> Please be available at the scheduled time to ensure a smooth service experience.</p>
    <button id="cancelBtn" class="cancel-btn">Cancel</button>
    <button id="confirmBtn" class="confirm-btn">Confirm</button>
  </div>
</div>

</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var openModalBtn = document.getElementById("openModalBtn");
    var modal = document.getElementById("myModal");
    var closeBtn = document.getElementsByClassName("close")[0];
    var cancelBtn = document.getElementById("cancelBtn");

    openModalBtn.onclick = function() {
      modal.style.display = "block";
    }

    closeBtn.onclick = function() {
      modal.style.display = "none";
    }

    cancelBtn.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  });
</script>

</body>
</html>
