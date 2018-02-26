<?php
	if (array_key_exists("submit", $_POST)) {
		try
		{
			$user = 'auobnrfenbtijr';
			$password = 'd88bd9049162b1341d8970fe4ebeeae2542aade94453e76f3e73460cfbfa424c';
			$db = new PDO('pgsql:host=ec2-54-225-103-255.compute-1.amazonaws.com;dbname=d4sni6bgp10g1t', $user, $password);
		}
		catch (PDOException $ex)
		{
			echo 'Error!: ' . $ex->getMessage();
			die();
		}
		
		
			
	
		$error = "";
		if (!$_POST['email']) {
			$error .= "<p>An email is required</p>";
		}
		
		if (!$_POST['pword']) {
			$error .= "<p>A password is required</p>";
		}
		$username = $_POST['username'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$pword = $_POST['pword'];
		
		if ($error != "") {
			$error = "<p>There were error(s) in your form:</p>".$error;
		} else {
			$query = "SELECT id FROM user WHERE email =:em";
			$statement = $db->prepare($query);
			$statement->bindValue(':username', $email);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			if (pg_num_rows($result) > 0) {
				$error = "That email address is taken.";
			} else {
				$ptext = $db->prepare('INSERT INTO users (username, firstname, lastname, email, password) VALUES (:username, :firstname, :lastname, :email, :password)');
				$ptext->bindValue(':username', $username, PDO::PARAM_STR);
				$ptext->bindValue(':firstname', $firstname, PDO::PARAM_STR);
				$ptext->bindValue(':lastname', $lastname, PDO::PARAM_STR);
				$ptext->bindValue(':email', $email, PDO::PARAM_STR);
				$ptext->bindValue(':password', $pword, PDO::PARAM_STR);
				
				if (!$ptext->execute()) {
					$error = "<p>Could not sign you up - please try again</p>";
				} else {
					foreach ($db->query('SELECT id FROM users ORDER BY id DESC LIMIT 1') as $vl) {
						$salt = $vl['id'];
						$upwd = md5(md5($salt).$pword);
						$hp = $db->prepare('UPDATE users SET password =:upwd WHERE id =:nid');
						$hp->bindValue(':upwd', $upwd, PDO::PARAM_STR);
						$hp->bindValue(':nid', $salt, PDO::PARAM_INT);
						$hp->execute();
					}
					
					echo "Sign up successful";
				}

			}
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
				<div class="form-group">
					<input type="text" name="username" class="form-control" id="username" placeholder="Username">
					
				</div>
				<div class="form-group">
					<input type="text" name="firstname" class="form-control" id="firstname" placeholder="Firstname">
				</div>
				<div class="form-group">
					<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Lastname">
				</div>

				<div class="form-group">
						<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="pword" name="pword" placeholder="Password">
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="stayLoggedIn" id="stay">
						<label class="form-check-label" for="stay">Stay logged in</label>
					</div>
				<button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
			</form>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>