<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        body {
            background-color: #487f78;
            color: #333;
        }
        .container {
            padding: 50px;
        }
        .card {
            max-width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            background-color: #fff;
        }
        .icon {
            font-size: 50px;
            color: #338b13;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Confirmation</h2>
            <div class="text-center">
                <i class="fas fa-check-circle icon"></i>
            </div>
            <p class="text-center">Your payment by cash has been confirmed. Thank you for using our service.</p>
            <div class="text-center">
                <a href="/homeServices/users/welcome.php" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html>
