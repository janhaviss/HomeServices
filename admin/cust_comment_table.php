<?php
$insert = false;
$update = false;
$delete = false;

include 'partials/_dbconn.php';

// For GET DELETE
if (isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `comments` WHERE `comment_id` = $comment_id";
    $result = mysqli_query($conn, $sql);
}

// Fetching comments data
$sql = "SELECT * FROM `comments`";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- Link for CSS From DataTables jQuery Site -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        .table thead th {
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        th {
            background-color: grey;
            color: black;
        }

        td {
            background-color: #f2f2f2;
        }

        .table-bordered td,
        .table-bordered th {
            border: 0.5px solid black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mb-0 h1" href="welcome.php">soobinsolutions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- For showing the alert -->
    <?php
if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Comment has been deleted successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
}
?>

    <div class=" my-4" style="margin: 0 50px 0 50px;backgroud-color: #f2f2f2">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">comment_id</th>
                    <th scope="col">comment_content</th>
                    <th scope="col">comment_by</th>
                    <th scope="col">Service Id</th>
                    <th scope="col">comment_time</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
$comment_id = 0; // Resetting the $comment_id variable
while ($row = mysqli_fetch_assoc($result)) {
    $comment_id++; // Incrementing comment_id inside the loop
    $user_id = $row['comment_by'];
    $sql_user = "SELECT * FROM `users` WHERE user_id = '$user_id'";
    $result_user = mysqli_query($conn, $sql_user);
    if (!$result_user) {
        die("no user found " . mysqli_error($conn));
    }
    $row_user = mysqli_fetch_assoc($result_user);
    $firstname = $row_user['firstname'];
    $service_id = $row['service_id'];
    $sql_sp = "SELECT * FROM `services` WHERE service_id = $service_id";
    $result_sp = mysqli_query($conn, $sql_sp);

    // Check if the query was successful and if it returned any rows
    if ($result_sp && mysqli_num_rows($result_sp) > 0) {
        $row_sp = mysqli_fetch_assoc($result_sp);
        $services_name = $row_sp['services_name'];
    } else {
        $services_name = "Service not found";
    }

    echo  "<tr>
              <td>" . $comment_id . "</td>
              <td>" . $row['comment_content'] . "</td>
              <td>" . $firstname . "</td>
              <td>" . $services_name . "</td>
              <td>" . $row['comment_time'] . "</td>
              <td><button class='delete btn btn-sm btn-danger' data-comment-id='" . $row['comment_id'] . "'>Delete</button></td>
            </tr>";
}
?>
            </tbody>
        </table>
    </div>
    <hr>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <!-- Data table sites jQuery -->
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();

            // For deleting the record
            $('.delete').click(function () {
                var comment_id = $(this).data('comment-id');
                if (confirm("Are you sure you want to delete this comment?")) {
                    window.location = 'cust_comment_table.php?delete=' + comment_id;
                }
            });
        });
    </script>
</body>

</html>
