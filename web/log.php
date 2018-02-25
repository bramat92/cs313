<?php
//	session_start();
//	if (isset($_SESSION['uname'])) {
//		unset($_SESSION['uname']);
//	}
	
	if (array_key_exists("submit", $_POST)) {
		$error = "";
		if (!$_POST['email']) {
			$error .= "An email is required";
		}
		
		if (!$_POST['pword']) {
			$error .= "A password is required";
		}
		
		if ($error != "") {
			$error = "<p>There were error(s) in your form:</p>".$error;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>Friendstagram</title>
		<style>
			h1 {
				text-align: center;
				text-decoration: underline;
				margin: 50px;
			}
			.container {
				background-color: #aac8f7;
				width: 500px;
				padding: 50px;
				border-radius: 10px;
				text-align: center;
			}
			h2 {
				text-decoration: underline;
			}
			
			body {
				 background: url('friends.jpg') no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;

			}
		</style>
	</head>
	<body>
		<h1>Friendstagram</h1>
		<div class="container">
		<div id="error"><?php echo $error; ?></div>
			<h2>Log In</h2>
			<form action="" method="POST">
<!-- 				<div class="form-group"> -->
<!-- 					<label for="username">Please enter your username</label> -->
<!-- 					<input type="text" name="username" class="form-control" id="username" placeholder="Enter username"> -->
<!-- 					<label for="user">Please enter your username</label> -->
<!-- 					<input type="text" name="username" class="form-control" id="username" placeholder="Enter username"> -->
<!-- 				</div> -->
				<div class="form-group">
<!-- 						<label for="email">Email address</label> -->
						<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
<!-- 						<label for="pword">Password</label> -->
						<input type="password" class="form-control" id="pword" name="pword" placeholder="Password">
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="stayLoggedIn" id="stay">
						<label class="form-check-label" for="stay">Stay logged in</label>
					</div>
				<button type="submit" name="submit" class="btn btn-primary">Log In</button>
			</form>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>