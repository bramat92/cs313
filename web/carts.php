<?php

	session_start();
		$id = $_GET['id'];
		if ($_GET['item'] == "remove" && isset($_SESSION['vcarts'])) {
			unset($_SESSION['vcarts'][$id]);
		}

		echo $_GET[item];		
		echo $id;
		
		include_once 'top2.php';

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
					
					<h1>Your Cart!</h1>
					<a href="hutCut.php"><button id="button1" type="button" class="btn btn-primary">Continue Shopping</button></a>
					
					<a href="info.php"><button type="button" id="button2" class="btn btn-success">Proceed to Checkout</button></a>
					<hr>
					
					
					<?php
					if(isset($_SESSION['vcarts'])) {
							//Loop through it like any other array.
							foreach($_SESSION['vcarts'] as $key => $value) {
							
							//Print out the product ID.
							if ($value == "taper") { 
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Taper Fade</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
							} else if ($value == 'shortyFade'){
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Blended Fade</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
							} else if ($value == 'thornyFade'){
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Thorny Fade</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
							} else if ($value == 'dyeFade') {
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Dyed Fade</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
							} else if ($value == 'curlyFade') {
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Curly Fade</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
							} else if ($value == 'studFade') {
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Stud Fade</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
							} else if ($value == 'mohawk') {
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Mohawk</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
							} else if ($value == 'afroFade') {
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Afro</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
							} else if ($value == 'twirlMohawk') {
								echo '<form action="cart.php" method="GET"><div class="card" style="width: 25rem;">
									<img class="card-img-top" src="' . $value. '.jpg" alt="Card image cap">
									<div class="card-body">
									<h5 class="card-title">The Twirl Mohawk</h5>
									<input type="hidden" name="item" value="remove">
									<input type="hidden" name="id" value="'.$key.'">
									<input class="btn btn-primary" type="submit" value="Remove from Cart" >
									</div>
									</div></form><br><hr><br>';
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
