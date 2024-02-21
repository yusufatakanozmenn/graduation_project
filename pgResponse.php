<!DOCTYPE html>
<html>

<head>
    <title>Ticket Result</title>
    <?php
	include "connection.php";
	$bookingId = 1; // Change this to the specific booking ID
	$sql = "SELECT * FROM bookingtable WHERE id = $bookingId";
	$result = mysqli_query($con, $sql);
	$booking = mysqli_fetch_assoc($result);
	?>
</head>

<body>
    <h1>Ticket Purchase Successful!</h1>
    <p>Thank you for your purchase. Here are the details of your ticket:</p>
    <p>Name: <?php echo isset($booking['bookingFName']) ? $booking['bookingFName'] : 'Not provided'; ?></p>
    <p>Email: <?php echo isset($booking['bookingEmail']) ? $booking['bookingEmail'] : 'Not provided'; ?></p>
    <p>Showtime: <?php echo isset($booking['bookingDate']) ? $booking['bookingDate'] : 'Not provided'; ?></p>
    <p>Showtime: <?php echo isset($booking['bookingTime']) ? $booking['bookingTime'] : 'Not provided'; ?></p>
</body>

</html>