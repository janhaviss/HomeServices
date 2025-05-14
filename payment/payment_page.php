<?php
  // connection
  include 'partials/_dbconn.php';

  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $cn_no = $_POST['cn_no'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];
    $fee = $_POST['fee'];

    // Create an SQL INSERT query
    $sql = "INSERT INTO `payment`(`username`, `email`, `mobile`, `address`, `city`, `zip`, `cn_no`, `exp_month`, `exp_year`, `cvv`, `fee`, `payment_date`) 
        VALUES ('$username','$email','$mobile','$address','$city','$zip','$cn_no','$exp_month','$exp_year','$cvv','$fee',current_timestamp())";

  $result = mysqli_query($conn,$sql);

  if ($result) {
    // Redirect to the loader page after processing
    echo '<script>window.location.href = "loader_transaction.html";</script>';
    exit(); // Stop executing further code
  } else {
    $showDanger = "Error!";
  }

  // Close the database connection
  $conn->close();
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Gateway</title>
  <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#487f78;">

<header>
  <div class="container">
    <div class="left">
      <h3>BILLING ADDRESS</h3>

      <script>
        function redirectToLoader() {
          window.location.href = 'loader_transaction.html';
        }
      </script>

      <form action="/homeServices/payment/payment_page.php" method="post" onsubmit="return validateForm()">
        Full name<br>
        <input type="text" name="username" id="username" placeholder="Enter name" required><br>
        Email<br>
        <input type="email" name="email" id="email" placeholder="Enter email" required><br>
        Mobile<br>
        <input type="text" name="mobile" id="mobile" placeholder="Enter mobile" required><br>
        Address<br>
        <input type="text" name="address" id="address" placeholder="Enter address" required><br>
        City<br>
        <input type="text" name="city" id="city" placeholder="Enter city" required><br>
        State<br>
        <select name="state" id="state" required>
          <option value="">Choose State</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Delhi">Delhi</option>
          <option value="Kerla">Kerla</option>
          <option value="Goa">Goa</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
        </select><br>
        Zip Code<br>
        <input type="text" name="zip" id="zip" placeholder="Enter zipcode" required><br>
    </div>

    <div class="right">
      <h3>PAYMENT</h3>
      <form action="/homeServices/payment/payment_page.php" method="post" onsubmit="return validateForm()">
        Accepted Card<br>
        <!-- Will add image -->
        <img src="partials/card.png" alt="card"><br><br>
        
        Amount<br>
        <input type="text" name="fee" id="fee" placeholder="Enter Amount" style="width:370px; height:30px;" required><br><br>
        Credit Card Number<br>
        <input type="text" name="cn_no" id="cn_no" placeholder="Enter Card Number" style="width:370px; height:30px;" required><br><br>
  
        Exp month<br>
        <input type="text" name="exp_month" id="" placeholder="Enter Expiry Month" style="width:370px; height:30px;" required><br><br>
        
        Exp year<br>
        <select name="exp_year" id="exp_year" style="width:150px; height:30px;" required>
          <option value="">Choose Year..</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
          <option value="2026">2026</option>
        </select><br><br>
        
        CVV<br>
        <input type="password" name="cvv" id="cvv" placeholder="CVV" style="width:150px; height:30px;" required>
        <span id="cvvError" style="color: red;"></span><br><br>

        <input type="submit" value="Proceed to Checkout">
      </form>
    </div>
  </div>
</header>

<script>
  function validateForm() {
    // var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;
    var address = document.getElementById('address').value;
    var city = document.getElementById('city').value;
    var state = document.getElementById('state').value;
    var zip = document.getElementById('zip').value;
    var fee = document.getElementById('fee').value;
    var cn_no = document.getElementById('cn_no').value;
    // var exp_month = document.getElementById('exp_month').value;
    var exp_year = document.getElementById('exp_year').value;
    var cvv = document.getElementById('cvv').value;

    // var usernameRegex = /^[a-zA-Z\s]+$/;
    var emailRegex = /^\S+@\S+\.\S+$/;
    var mobileRegex = /^\d{10}$/;
    var zipRegex = /^\d{6}$/;
    var cn_noRegex = /^\d{16}$/;
    // var exp_monthRegex = /^(0?[1-9]|1[012])$/;
    var cvvRegex = /^\d{3}$/;

    if (!usernameRegex.test(username)) {
      alert('Invalid username');
      return false;
    }

    if (!emailRegex.test(email)) {
      alert('Invalid email address');
      return false;
    }

    if (!mobileRegex.test(mobile)) {
      alert('Invalid mobile number');
      return false;
    }

    if (!address.trim()) {
      alert('Address cannot be empty');
      return false;
    }

    if (!city.trim()) {
      alert('City cannot be empty');
      return false;
    }

    if (state === "") {
      alert('Please select a state');
      return false;
    }

    if (!zipRegex.test(zip)) {
      alert('Invalid zip code');
      return false;
    }

    if (!fee.trim()) {
      alert('Fee cannot be empty');
      return false;
    }

    if (!cn_noRegex.test(cn_no)) {
      alert('Invalid credit card number');
      return false;
    }

    if (!exp_monthRegex.test(exp_month)) {
      alert('Invalid expiry month');
      return false;
    }

    if (!exp_year.trim()) {
      alert('Please select an expiry year');
      return false;
    }

    if (!cvvRegex.test(cvv)) {
      alert('Invalid CVV');
      return false;
    }

    return true;
  }
</script>

</body>
</html>
