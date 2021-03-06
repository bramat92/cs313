<?php

	session_start();
	if (isset($_SESSION['uname'])) {
			unset($_SESSION['uname']);
	}
	
	if (isset($_COOKIE['uname'])) {
		setcookie("uname", "", time() - 60*60);
		$_COOKIE['uname'] = "";
	
	}
	
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
	

	
	if (array_key_exists("submit", $_POST)) {
			
		$error = "";
		
		if ($_POST['signUp'] == '1') {
		
		if (!$_POST['email']) {
			$error .= "<p>An email is required</p>";
		}
		
		if (!$_POST['pword']) {
			$error .= "<p>A password is required</p>";
		}
		
		if (!$_POST['username']) {
			$error .= "<p>A username is required</p>";
		}
		
		if (!$_POST['firstname']) {
			$error .= "<p>A firstname is required</p>";
		}
		
		if (!$_POST['lastname']) {
			$error .= "<p>A firstname is required</p>";
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
			$statement->bindValue(':username', $email, PDO::PARAM_STR);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			if (pg_num_rows($result) > 0) {
				$error = "<p>That email address is taken.</p>";
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
					
					$_SESSION['uname'] = $username;
					
					if ($_POST['stay'] == 1) {
						setcookie("uname", $username, time() + 60 * 60 * 365);
						
					}
					
					header("Location: fghome.php");
//					echo "Sign up successful";
				}

			}
		  } 
		}
		else {
				echo "Am here at the start of Login";
				$username = $_POST['username'];
				$pword = $_POST['pword'];
				if (!$_POST['username']) {
					$error .= "<p>A username is required</p>";
				}
				if (!$_POST['pword']) {
					$error .= "<p>A password is required</p>";
				}
				if ($error != "") {
					$error = "<p>There were error(s) in your form:</p>".$error;
				} else {
					$stmt = $db->prepare('SELECT * FROM users WHERE username=:name');
					$stmt->bindValue(':name', $username, PDO::PARAM_STR);
					$stmt->execute();
					foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $rows) {
						echo $rows['id'];
					if ($rows['username'] == $username) {
						echo "Am here";
						echo "Username entered: ".$username;
						echo "Username from dtb: ".$rows['username'];
						$hpwd = md5(md5($rows['id']).$pword);
						echo "Password entered: ".$hpwd;
						echo "Password from dtb: ".$password;
						if ($hpwd == $rows['password']) {
							$_SESSION['uname'] = $rows['username'];		
							echo "Session name: ".$_SESSION['uname'];
							if ($_POST['stay'] == 1) {
									setcookie("uname", $rows['username'], time() + 60 * 60 * 365);		
									echo "Cookie name: ".$_COOKIE['uname'];
							}
							header("Location: fghome.php");
							echo "Am here!";
							echo "Login successful";
						} else {
							echo "<p>That login combination could not be found</p>";
						}
					} else {
							$error = "<p>That username does not exist</p>";
						}
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
				padding: 30px;
				border-radius: 10px;
				text-align: center;
			}
			
			body { 
				background: url(fbg.jpg) no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			
			#title {
				display: block;
				margin-top: 10px;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 20px;
				border-radius: 5px;
				max-width: 50%;
				height: auto;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			}

			#signUpForm {
				display: none;
			}
			h2 {
				margin-bottom: 25px;
			}
			#btn {
		
				cursor: pointer;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				outline: none;
				border: none;
				cursor: pointer;
				display: block;
				position: relative;
				margin: 0 auto;

			} 
			#btn:hover {
				box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
				top: 2px;
			}
			#btn:focus {
				box-shadow: none;
				top: 6px;
			}
			.container {
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			}
			
		</style>
	</head>
	<body>
		<img id="title" src="Friendstagram.png" alt="York State University">
		<div class="container">
		<div id="error"><?php echo $error; ?></div>
			
			<form action="" method="POST" id="signUpForm">
				
				<div class="form-group">
				<h2>Sign Up</h2>
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
					<div class="form-group">
						<input type="hidden" class="form-control" id="signUp" name="signUp" value="1">
					</div>
					<div class="form-check">
							<input type="checkbox" class="form-check-input" id="stay" name="stay" value="1">
							<label class="form-check-label" for="stay">Stay logged in</label>
						</div>
					<br>
				<button type="submit" id="btn" name="submit" class="btn btn-primary">Sign Up</button><br>
				<a class="toggleForm">Login<a>
			</form>
			
			
			<form action="" method="POST" id="loginForm">
				<div class="form-group">
				<h2>Sign In</h2>
					<input type="text" name="username" class="form-control" id="username" placeholder="Username">
					
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="pword" name="pword" placeholder="Password">
				</div>
				<div class="form-check">
						<input type="checkbox" class="form-check-input" id="stay" name="stay" value="1">
						<label class="form-check-label" for="stay">Stay logged in</label>
					</div>
				<div class="form-group">
					<input type="hidden" class="form-control" id="signUp" name="signUp" value="0">
				</div>

					
				<button type="submit" name="submit" id="btn" class="btn btn-primary">Login</button><br>
				<a class="toggleForms">Sign Up<a>
			</form>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script type="text/javascript">
			$(".toggleForms").click(function () {
				$("#loginForm").toggle();
				$("#signUpForm").toggle();
				
			});
			
			$(".toggleForm").click(function () {
				$("#loginForm").toggle();
				$("#signUpForm").toggle();
				
			});
		</script>
	</body>
</html>