<?php
	session_start();
					
			//Add a product ID to our cart session variable.
			$_SESSION['vcarts'][] = $_GET['item'];

	 //session_destroy();
	
	include_once 'top.php';
							
			
		
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
		<title>Hut Cuts</title>
		
		<style>
			#card1 {
				float: left;
				margin: 20px;
			}
			#card2 {
				float: left;
				margin: 20px;

			}
			#card3 {
				float: left;
				margin: 20px;

			}
			#card4 {
				float: left;
				margin: 20px;

			}
			#card5 {
				float: left;
				margin: 20px;

			}
			#card6 {
				float: left;
				margin: 20px;
			}
			#card7 {
				float: left;
				margin: 20px;

			}
			#card8 {
				float: left;
				margin: 20px;

			}
			#card9 {
				float: left;
				margin: 20px;

			}
			#clear-float {
				clear: both;
			}
			body {
				background-image: url("bckg.jpg");
			}
			.card-body {
				background-color: #a5d0ef;
			}
		</style>
	</head>
	<body>
		<div class="container">
				
			<form action="hutCut.php" method="GET">
				<div id="card1" class="card" style="width: 20rem;">
					<img class="card-img-top" src="taper.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">The Taper Fade </h5>
						<p id="price">Price: $18</h4>
						<p name="cut" value="Taper!" class="card-text">Ever felt like you are in need of something exotic in your life? Well look no further for right here and now is the greatest piece of art that can add a crown to that majestic head you got without feeling the weight of the kingdom upon your head. Book an appointment and we will bring the barber shop to you!</p>
						<input type="hidden" name="item" value="taper">
						<input class="btn btn-primary" id="submit0" type="submit" value="Add to Cart" >
					</div>
				</div>
			</form>
		
			<form action="hutCut.php" method="GET">
				<div id="card2" class="card" style="width: 20rem;">
					<img class="card-img-top" src="shortyFade.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">The Blended Fade</h5>
						<p id="price">Price: $15</h4>
						<p class="card-text">This men’s haircut is very cool. This low fade blends into a touch more length in the upper sides, and the medium length hair is slicked back dry and natural. Outside of the area of your hair that gets faded you can go with short hair on top. Book an appointment and we will bring the barber shop to you!</p>
						<input type="hidden" name="item" value="shortyFade">
						<input class="btn btn-primary" id="submit1" type="submit" value="Add to Cart" >
					</div>
				</div>
			</form>
		
			<form action="hutCut.php" method="GET">
				<div id="card3" class="card" style="width: 20rem;">
					<img class="card-img-top" src="thornyFade.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">The Thorny Fade</h5>
						<p id="price">Price: $18</h4>
						<p class="card-text">Spikes are in style! The reason for their popularity is very simple. It doesn’t take long to make them. Men appreciate hairstyles, which are easy to create and don’t require too much hassle in the morning. The hair can be left short, while the spikes can be as long as the man wants. Book now we come to you! </p>
						<input type="hidden" name="item" value="thornyFade">
						<input class="btn btn-primary" id="submit2" type="submit" value="Add to Cart" >
					</div>
				</div>
			</form>
		
		<div id="clear-float"></div>
		

		<form action="hutCut.php" method="GET">
			<div id="card4" class="card" style="width: 20rem;">
				<img class="card-img-top" src="dyeFade.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">The Dyed Fade</h5>
					<p id="price">Price: $20</h4>
					<p class="card-text">Feeling a little down with life? Well it's about time you tried out our new cool and exciting dyed faded cut that gives you the feeling of rainbows and the sun with droplets of rain. It's the perfect mood booster with no limits to your creative potential. You snooze you loose.</p>
					<input type="hidden" name="item" value="dyeFade">
					<input class="btn btn-primary" id="submit3" type="submit" value="Add to Cart" >
				</div>
			</div>
		</form>
		
		<form action="hutCut.php" method="GET">
			<div id="card5" class="card" style="width: 20rem;">
				<img class="card-img-top" src="curlyFade.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">The Curly Fade</h5>
					<p id="price">Price: $18</h4>
					<p class="card-text">The curly hair fade has been a popular modern haircut for guys with curly or wavy hair types! Because the taper fade cut is short and simple, guys with curls benefit by not having to style their hair on the sides. Book an appointment and we will bring the barber shop to you! </p>
					<input type="hidden" name="item" value="curlyFade">
					<input class="btn btn-primary" id="submit4" type="submit" value="Add to Cart" >
				</div>
			</div>
		</form>
		
		<form action="hutCut.php" method="GET">
			<div id="card6" class="card" style="width: 20rem;">
				<img class="card-img-top" src="studFade.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">The Stud Fade</h5>
					<p id="price">Price: $15</h4>
					<p class="card-text">This hairstyle is a clear cut one with hints of reggae and a flair of the cool kid on the block. It has the feeling of a fresh-star rising and revolutionizing the industry. It is so cool that you will feel like you are walking on water. Hurry your new look awaits. Book an appointment now</p>
					<input type="hidden" name="item" value="studFade">
					<input class="btn btn-primary" id="submit5" type="submit" value="Add to Cart" >
				</div>
			</div>
		</form>
		
		<div id="clear-float"></div>
	
		<form action="hutCut.php" method="GET">
			<div id="card7" class="card" style="width: 20rem;">
				<img class="card-img-top" src="mohawk.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">The Mohawk</h5>
					<p id="price">Price: $15</h4>
					<p class="card-text">Mohawk is a hairstyle that can set you apart from the crowd easily. This type of hairstyle isn’t only a time-saving idea, but also a trendy one. Mohawks were often associated with the punks. Recently, it became one of the latest trends in hair styling in black and white women.</p>
					<input type="hidden" name="item" value="mohawk">
					<input class="btn btn-primary" id="submit6" type="submit" value="Add to Cart" >
				</div>
			</div>
		</form>

		<form action="hutCut.php" method="GET">
			<div id="card8" class="card" style="width: 20rem;">
				<img class="card-img-top" src="afroFade.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">The Afro</h5>
					<p id="price">Price: $18</h4>
					<p class="card-text">The Afro taper fade haircut is a popular hairstyle among black men of all ages. While the taper fade Afro is pretty straightforward, there are a number of variations, styles and designs that can be applied to this haircut. Book now and we will bring the barber shop to you! </p>
					<input type="hidden" name="item" value="afroFade">
					<input class="btn btn-primary" id="submit7" type="submit" value="Add to Cart" >
				</div>
			</div>
		</form>
		
		<form action="hutCut.php" method="GET">
			<div id="card9" class="card" style="width: 20rem;">
				<img class="card-img-top" src="twirlMohawk.jpg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">The Twirl Mohawk</h5>
					<p id="price">Price: $18</h4>
					<p class="card-text">This hairstyle is an authentic trendy style that fits the century kind of look. It has the flow of coolness and the swagger of classiness with a hint of recklessness. It's a head turner and people will always compliment you. Book with us and try out your new look!</p>
					<input type="hidden" name="item" value="twirlMohawk">
					<input class="btn btn-primary" id="submit8" type="submit" value="Add to Cart" >
				</div>
			</div>
		</form>
	
		<div id="clear-float"></div>
		
				<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		
		<script type="text/javascript">
			$("#submit0").click(function () {
				alert("The Taper Fade has been added to your cart");
			});
			$("#submit1").click(function () {
				alert("The Blended Fade has been added to your cart");
			});
			$("#submit2").click(function () {
				alert("The Thorny fade has been added to your cart");
			});
			$("#submit3").click(function () {
				alert("The Dyed Faded has been added to your cart");
			});
			$("#submit4").click(function () {
				alert("The Curly Fade has been added to your cart");
			});
			$("#submit5").click(function () {
				alert("The Stud Fade has been added to your cart");
			});
			$("#submit6").click(function () {
				alert("The Mohawk has been has been added to your cart");
			});
			$("#submit7").click(function () {
				alert("The Afro has been added to your cart");
			});
			$("#submit8").click(function () {
				alert("The Twirl Mohawk has been added to your cart");
			});
		</script>
	</body>
</html>