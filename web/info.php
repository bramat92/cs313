<?php
	include_once "top2.php"
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>Checkout</title>
		<style>
			.form-group {
				width: 50%;
				margin: auto;
				margin-bottom: 20px;
			}
			#submitBtn {
				position: relative;
				left: 430px;
				width: 300px;
				margin-top: 10px;
				margin-bottom: 10px;
			}
			body {
				background-image: url("light.jpg");
			}
		</style>
	</head>
	<body>

		<div class="container">
		<h1 style="text-align: center; margin-top: 20px;">Checkout Page</h1>
		<h3 style="text-align: center; margin-bottom: 20px;">Please enter your address</h3>
			<form action="confirmation.php" method="GET">
				<div class="form-group">
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="cell" name="cell" placeholder="Cell no.">
				</div>

				<div class="form-group">
					<input type="text" class="form-control" id="addressline1" aria-describedby="emailHelp" name="line1" placeholder="Address line 1">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="addressline2" name="line2" placeholder="Address line 2">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="city" name="city" placeholder="City">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="state" name="state" placeholder="State">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="zip" name="zip" placeholder="zip">
				</div>
				
				<div class="form-group">
					<label for="date">Enter appointment date:</label>
					<input type="text" class="form-control" id="date" name="date" placeholder="01/01/2000 - 12:00 PM">
				</div>

				<button type="submit" id="submitBtn" class="btn btn-success">Complete Purchase</button>
			</form>
			<a href="cart.php"><button type="button" id="submitBtn" class="btn btn-primary">Return to Cart</button>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>