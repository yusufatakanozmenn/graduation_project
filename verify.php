<?php
include "connection.php";
session_start();

// variables
$fname = $_POST['fName'];
$lname = $_POST['lName'];
$email = $_POST['email'];
$mobile = $_POST['pNumber'];
$theatre = $_POST['theatre'];
$type = $_POST['type'];
$date = $_POST['date'];
$time = $_POST['hour'];
$movieid = $_POST['movie_id'];
$order = "ARVR" . rand(10000, 99999999);
$cust  = "CUST" . rand(1000, 999999);

//sessions
// $_SESSION['ORDERID'] = $order;


//conditions
if ((!$_POST['submit'])) {
    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
}

if (isset($_POST['submit'])) {

    $qry = "INSERT INTO bookingtable(`movieID`, `bookingTheatre`, `bookingType`, `bookingDate`, `bookingTime`, `bookingFName`, `bookingLName`, `bookingPNumber`, `bookingEmail`,`amount`, `ORDERID`)VALUES ('$movieid','$theatre','$type','$date','$time','$fname','$lname','$mobile','$email','Not Paid','$order')";

    $result = mysqli_query($con, $qry);
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ticket</title>
    <script src="_.js "></script>
    <style>
    .ticket {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        padding: 20px;
        margin: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: auto;
    }

    .ticket h5 {
        color: #dc3545;
        margin-bottom: 15px;
    }

    .ticket p {
        font-size: 16px;
        margin-bottom: 10px;
    }
    </style>

</head>

<body>
    <center>
        <br><br>
        <h1>Proceed for Payment </h1>
        <br><br>

        <form method="post" action="pgRedirect.php">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div class="ticket">
                        <h5>Order Details</h5>
                        <p><strong>Order ID:</strong> <?php echo $order; ?></p>
                        <p><strong>Name:</strong> <?php echo $_POST['fName'] . " " . $_POST['lName']; ?></p>
                        <p><strong>Website:</strong> SineVizyon</p>
                        <p><strong>Theatre:</strong> <?php echo $_POST['theatre']; ?></p>
                        <p><strong>Type:</strong> <?php echo $_POST['type']; ?></p>
                    </div>
                    <form method="post" action="pgRedirect.php">
                        <input type="hidden" name="ORDER_ID" value="<?php echo $order; ?>">
                        <input type="hidden" name="CUST_ID" value="<?php echo $cust; ?>">
                        <input type="hidden" name="INDUSTRY_TYPE_ID" value="retail">
                        <input type="hidden" name="CHANNEL_ID" value="WEB">
                        <button value="Book Now!" type="submit" onclick="" type="button" class="btn btn-danger">Pay
                            Now!</button>
                    </form>
                </div>
            </div>

        </form>
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>