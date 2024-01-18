<!DOCTYPE html>
<html>
<head>
	<title>Ticket Result</title>
</head>
<body>
	<h1>Ticket Purchase Successful!</h1>
	<p>Thank you for your purchase. Here are the details of your ticket:</p>
	<p>Name: <?php echo $_POST['name']; ?></p>
	<p>Email: <?php echo $_POST['email']; ?></p>
	<p>Movie: <?php echo $_POST['movie']; ?></p>
	<p>Showtime: <?php echo $_POST['showtime']; ?></p>
</body>
</html>