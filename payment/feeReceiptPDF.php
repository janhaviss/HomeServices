<?php

require ('C:\xampp\htdocs\pathology\admin\dompdf\vendor\autoload.php ');

use Dompdf\Dompdf;
use Dompdf\Options;

//  $dompdf = new Dompdf();
//  $dompdf->load_html(ob_get_clean());
//  $dompdf->load_html($receipt, 'UTF-8');
//  $dompdf->set_paper('A4');
//  $dompdf->render();
//  $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));



 // Include database connection
 include 'partials/_dbconn.php';

 // Fetch the latest payment record from the database
 $sql = "SELECT * FROM `payment` ORDER BY `sno` DESC LIMIT 1";
 $result = $conn->query($sql);

 if ($result && $result->num_rows > 0) {
     // Fetch payment data
     $row = $result->fetch_assoc();

     // Extract payment details
     $sno =$row['sno'];
     $username = $row['username'];
     $email = $row['email'];
     $mobile = $row['mobile'];
     $address = $row['address'];
     $city = $row['city'];
     $zip = $row['zip'];
     $cn_no = $row['cn_no'];
     $exp_month = $row['exp_month'];
     $exp_year = $row['exp_year'];
     $cvv = $row['cvv'];
     $fee = $row['fee'];
     $payment_date = $row['payment_date'];
     
$receipt='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- jsPDF lib -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Payment Processing</title>
    <style>
        
      .receipt-content .logo a:hover {
        text-decoration: none;
        color: #7793C4; 
      }

      .receipt-content .invoice-wrapper {
        background: #FFF;
        border: 1px solid #CDD3E2;
        box-shadow: 0px 0px 1px #CCC;
        padding: 40px 40px 60px;
        margin-top: 40px;
        border-radius: 4px; 
      }

      .receipt-content .invoice-wrapper .payment-details span {
        color: #A9B0BB;
        display: block; 
      }
      .receipt-content .invoice-wrapper .payment-details a {
        display: inline-block;
        margin-top: 5px; 
      }

      .receipt-content .invoice-wrapper .line-items .print a {
        display: inline-block;
        border: 1px solid #9CB5D6;
        padding: 13px 13px;
        border-radius: 5px;
        color: #708DC0;
        font-size: 13px;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear; 
      }

      .receipt-content .invoice-wrapper .line-items .print a:hover {
        text-decoration: none;
        border-color: #333;
        color: #333; 
      }

      .receipt-content {
        background: #ECEEF4; 
      }
      @media (min-width: 1200px) {
        .receipt-content .container {width: 900px; } 
      }

      .receipt-content .logo {
        text-align: center;
        margin-top: 50px; 
      }

      .receipt-content .logo a {
        font-family: Myriad Pro, Lato, Helvetica Neue, Arial;
        font-size: 36px;
        letter-spacing: .1px;
        color: #555;
        font-weight: 300;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear; 
      }

      .receipt-content .invoice-wrapper .intro {
        line-height: 25px;
        color: #444; 
      }

      .receipt-content .invoice-wrapper .payment-info {
        margin-top: 25px;
        padding-top: 15px; 
      }

      .receipt-content .invoice-wrapper .payment-info span {
        color: #A9B0BB; 
      }

      .receipt-content .invoice-wrapper .payment-info strong {
        display: block;
        color: #444;
        margin-top: 3px; 
      }

      @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .payment-info .text-right {
        text-align: left;
        margin-top: 20px; } 
      }
      .receipt-content .invoice-wrapper .payment-details {
        border-top: 2px solid #EBECEE;
        margin-top: 30px;
        padding-top: 20px;
        line-height: 22px; 
      }


      @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .payment-details .text-right {
        text-align: left;
        margin-top: 20px; } 
      }
      .receipt-content .invoice-wrapper .line-items {
        margin-top: 40px; 
      }
      .receipt-content .invoice-wrapper .line-items .headers {
        color: #A9B0BB;
        font-size: 13px;
        letter-spacing: .3px;
        border-bottom: 2px solid #EBECEE;
        padding-bottom: 4px; 
      }
      .receipt-content .invoice-wrapper .line-items .items {
        margin-top: 8px;
        border-bottom: 2px solid #EBECEE;
        padding-bottom: 8px; 
      }
      .receipt-content .invoice-wrapper .line-items .items .item {
        padding: 10px 0;
        color: #696969;
        font-size: 15px; 
      }
      @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .line-items .items .item {
        font-size: 13px; } 
      }
      .receipt-content .invoice-wrapper .line-items .items .item .amount {
        letter-spacing: 0.1px;
        color: #84868A;
        font-size: 16px;
      }
      @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .line-items .items .item .amount {
        font-size: 13px; } 
      }

      .receipt-content .invoice-wrapper .line-items .total {
        margin-top: 30px; 
      }

      .receipt-content .invoice-wrapper .line-items .total .extra-notes {
        float: left;
        width: 40%;
        text-align: left;
        font-size: 13px;
        color: #7A7A7A;
        line-height: 20px; 
      }

      @media (max-width: 767px) {
        .receipt-content .invoice-wrapper .line-items .total .extra-notes {
        width: 100%;
        margin-bottom: 30px;
        float: none; } 
      }

      .receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
        display: block;
        margin-bottom: 5px;
        color: #454545; 
      }

      .receipt-content .invoice-wrapper .line-items .total .field {
        margin-bottom: 7px;
        font-size: 14px;
        color: #555; 
      }

      .receipt-content .invoice-wrapper .line-items .total .field.grand-total {
        margin-top: 10px;
        font-size: 16px;
        font-weight: 500; 
      }

      .receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
        color: #20A720;
        font-size: 16px; 
      }

      .receipt-content .invoice-wrapper .line-items .total .field span {
        display: inline-block;
        margin-left: 20px;
        min-width: 85px;
        color: #84868A;
        font-size: 15px; 
      }

      .receipt-content .invoice-wrapper .line-items .print {
        margin-top: 50px;
        text-align: center; 
      }



      .receipt-content .invoice-wrapper .line-items .print a i {
        margin-right: 3px;
        font-size: 14px; 
      }

      .receipt-content .footer {
        margin-top: 40px;
        margin-bottom: 110px;
        text-align: center;
        font-size: 12px;
        color: #969CAD; 
      } 
    </style>
</head>
<body>
    <div class="container">
       

  <div class="container" style="max-height: 100vh; overflow-y: auto;">
    <div class="receipt-content">
    <div class="container bootstrap snippets bootdey">
    <div class="row">
      <div class="col-md-12">
        <div class="invoice-wrapper">
          <div class="intro">
            Hi <strong>'. $username .'</strong>, 
            <br>
            This is the receipt for a payment of  RS.<strong>'. $fee.'</strong> for your works.
          </div>

          <div class="payment-info">
            <div class="row">
              <div class="col-sm-6">
                <span>Payment No.</span>
                <strong>'.$sno.'</strong>
              </div>
              <div class="col-sm-6 text-right">
                <span>Payment Date</span>
                <strong>'.  $payment_date .'</strong>
              </div>
            </div>
          </div>

          <div class="payment-details">
            <div class="row">
              <div class="col-sm-6">
                <span>Paitent</span>
                <strong>
                  '. $username.'
                </strong>
                <p>
                '. $address.'<br>
                 '. $city .' <br>
                '. $zip .' <br>
                Maharashtra, India <br>
                
                  <a href="#">
                    '. $email.'
                  </a>
                </p>
              </div>
              <div class="col-sm-6 text-right">
                <span>Payment To</span>
                <strong>
                  SoobinSolutions
                </strong>
                <p>
                1234 Greenwood Street <br>
                Mumbai <br>
                  1118 <br>
                  Maharashtra,India <br>
                  <a href=" thepatholabmj@gmail.com">
                  thepatholabmj@gmail.com
                  </a>
                </p>
              </div>
            </div>
          </div>

          <div class="line-items">
            <div class="headers clearfix">
              <div class="row">
                <div class="col-xs-4">Description</div>
                <div class="col-xs-3">Quantity</div>
                <div class="col-xs-5 text-right">Amount</div>
              </div>
            </div>
            <div class="items">
              <div class="row item">
                <div class="col-xs-4 desc">
                  The Lab/Home Service
                </div>
                <div class="col-xs-3 qty">
                &nbsp;
                </div>
                <div class="col-xs-5 amount text-right">
                 '. $fee.'
                </div>
              </div>
              
            </div>
            <div class="total text-right">
              <p class="extra-notes">
                <strong>Extra Notes</strong>
                If you have any questions or require assistance,<br> please reach out to our dedicated support team at<br> <a href="thepatholabmj@gmail.com">thepatholab Email</a><br> or +91 7892-234-567.
              </p>
              <div class="field">
                Subtotal <span>Rs. '. $fee.'.00</span>
              </div>
              <div class="field">
                Discount <span>0.0%</span>
              </div>
              <div class="field grand-total">
                Total : <span>Rs. '. $fee.'.00</span>
              </div>
            </div>

            <div class="print">
              <a href="#">
                <i class="fa fa-print"></i>
                <p style="text-align:center"><i>Thank you for choosing SoobinSolutions</i></p>
              </a>
            </div>
          </div>
        </div>

            <div class="footer">
              Copyright © 2023.SoobinSolutions 
            </div>
          </div>
        </div>
      </div>
    </div>  

        </div>
       
    </div>

    <!-- Bootstrap and custom scripts here -->
</body>
</html>
';

    

}
 else {
  // Handle the case where no payment records are found
  echo "No payment records found.";
}

// Close the database connection
$conn->close();
$dompdf = new Dompdf();
 $dompdf->load_html(ob_get_clean());
 $dompdf->load_html($receipt, 'UTF-8');
 $dompdf->set_paper('A4');
 $dompdf->render();
 $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
      
?>