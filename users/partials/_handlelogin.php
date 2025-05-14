<?php
$login = false;
$showDanger = false;

// Check if the session is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconn.php';

    if (isset($_POST['firstname']) && isset($_POST['password'])) {
        $firstname = $_POST['firstname'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE firstname = '$firstname'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $login = true;
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['service_id'] = $row['service_id']; 
                $_SESSION['service_name'] = $row['service_name'];
                $_SESSION['sp_id'] = $row['sp_id'];
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['sp_name'] = $row['sp_name'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['firstname'] = $firstname;
                echo "logged in " . $firstname;
                header("location: welcome.php");
            } else {
                $showDanger = "Invalid Credentials";
            }
        } else {
            $showDanger = "Invalid Credentials";
        }
        
    }
}
?>

<!-- Debugging output -->
<?php //var_dump($_SESSION); ?>
