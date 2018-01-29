<?php

	session_start();
	
					
	
	include_once 'top2.php';
	
	$fname = $_GET['firstname'];
	$lname = $_GET['lastname'];
	$line1 = $_GET['line1'];
	$line2 = $_GET['line2'];
	$city = $_GET['city'];
	$state = $_GET['state'];
	$zip = $_GET['zip'];
	$date = $_GET['date'];
	
	
?>

<!DOCTYPE html>
			<html lang="en">
				<head>
					<!-- Required meta tags -->
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

					<!-- Bootstrap CSS -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

					<title>Your Cart</title>
					<style>
						body {
							text-align: center;
							background-image: url("light.jpg");
						}
						
						.card {
							margin: 0 auto;
						}
						
						.card-body {
							background-color: #a5d0ef;
						}
						
						h1 {
							
							margin-top: 30px;
							margin-bottom: 20px;
							font-size: 60px;
							
						}
						.invisible {
							visibility: hidden;
						}
						#button1 {
							margin: 30px;
						}
						#button2 {
							margin: 30px;
						}
					</style>
				</head>
				<body>

					<div class="container">
					
					
						<div class="card" style="width: 18rem; margin-top: 20px;">
							<div class="card-body">
								<h5 class="card-title">Appointment Booked</h5>
								<h6 class="card-subtitle mb-2 text-muted">
									<?php
										echo $fname . ' ' . $lname;
									?>
								</h6>
								<p class="card-text">
									<?php
										echo $line1 . " " . $line2 . " " . $city . ", " . $state . " " . $zip . "<br>" . $date;
									?>
								</p>
								
							</div>
						</div>
					<hr>
					
					
					<?php
					if(isset($_SESSION['vcarts'])) {
							//Loop through it like any other array.
							foreach($_SESSION['vcarts'] as $productId) {
							//Print out the product ID.
							if ($productId == "taper") { 
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Taper Fade</h5>
									
									
									</div>
									</div><br><hr><br>';
							} else if ($productId == 'shortyFade'){
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Blended Fade</h5>
									
									</div>
									</div><br><hr><br>';
							} else if ($productId == 'thornyFade'){
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Thorny Fade</h5>
									
									</div>
									</div><br><hr><br>';
							} else if ($productId == 'dyeFade') {
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Dyed Fade</h5>
									
									</div>
									</div><br><hr><br>';
							} else if ($productId == 'curlyFade') {
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Curly Fade</h5>
									
									</div>
									</div><br><hr><br>';
							} else if ($productId == 'studFade') {
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Stud Fade</h5>
									
									</div>
									</div><br><hr><br>';
							} else if ($productId == 'mohawk') {
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Mohawk</h5>
									
									</div>
									</div><br><hr><br>';
							} else if ($productId == 'afroFade') {
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Afro</h5>
									
									</div>
									</div><br><hr><br>';
							} else if ($productId == 'twirlMohawk') {
								echo '<div class="card" style="width: 18rem;">
									<img class="card-img-top" src="' . $productId. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Twirl Mohawk</h5>
									
									</div>
									</div><br><hr><br>';
							}
							
											
						}
					} 	

						
							
						?>
					</div>

					<!-- Optional JavaScript -->
					<!-- jQuery first, then Popper.js, then Bootstrap JS -->
					<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
				</body>
			</html>
