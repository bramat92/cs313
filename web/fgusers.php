<?php
	session_start();
	if(isset($_SESSION['uname'])) {
		$variable = $_SESSION['uname'];		
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
				
				#title {
					display: block;
					margin-left: auto;
					margin-right: auto;
					max-width: 50%;
					height: auto;
				}
				nav {
					border-radius: 5px;
					margin-bottom: 20px;
				}
				
				#welcome {
					text-align: center;
					margin-top: 20px;
					font-size: 50px;
					
				}
				#friendstagram {
					font-size: 80px;
					text-align: center;
					text-decoration: underline;
				}
				#name {
					font-size: 20px;
					text-align: center;
					margin-bottom: 20px;
				}
				#displaysName {
					display: block;
					margin-left: auto;
					margin-right: auto;
					max-width: 50%;
					height: auto;
					background-color: #e1e5ed;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				}
				#displays {
					display: block;
					margin-left: auto;
					margin-right: auto;
					max-width: 50%;
					height: auto;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				}
				#logOut {
					margin-left: 25px;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
					outline: none;
					border: none;
					cursor: pointer;
					display: block;
					position: relative;

				}
				#logOut:hover {
					box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
					top: 2px;
				}
				#logOut:focus {
					box-shadow: none;
					top: 6px;
				}
				nav {
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				}
				#titlePost {
					display: block;
					margin-left: auto;
					margin-right: auto;
					max-width: 50%;
					height: auto;
				}
			</style>
		</head>
		<body>
			<img id="title" src="Friendstagram.png" alt="York State University">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="fghome.php">FG</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="fghome.php">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="fgposts.php">Posts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="followees.php">Followers</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="fgfollowing.php">Following</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="fgusers.php">Users</a>
							</li>

							
						</ul>
						
						<a class="btn btn-primary" id="logOut" href="fglogin.php" role="button">Log Out</a>
					</div>
				</nav>
				<img id="titlePost" src="users.png" alt="York State University">
				<?php
					
					$stmt = $db->prepare('SELECT * FROM users WHERE username=:name');
					$stmt->bindValue(':name', $variable, PDO::PARAM_STR);
					$stmt->execute();
					foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $rows)
					{
						echo '<div class="alert alert-secondary" id = "displaysName" role="alert">';
						echo '<p id = "name">Hi: ';
						echo $rows['firstname'] . ' ' . $rows['lastname']; 
						echo '</p>';
						echo '</div>';
						echo '<br>';
					}
					
					foreach ($db->query('SELECT username, firstname, lastname, to_char(created_at, \'YYYY/MM/DD\') AS date FROM users') as $rows)
					{
						echo '<div class="alert alert-secondary" id = "displays" role="alert">';
						echo 'Username: ' . $rows['username'] . '<br>' . $rows['firstname'] . ' ' . 
						$rows['lastname'] . '<br> Member since: ' . $rows['date']; 
						echo '<br>';
						echo '<form action="fgfollowing.php" method="get">
							<input type="hidden" name="id" value="'. $rows['uid'] .'">
							<button type="submit" id="btn" name="button" class="btn btn-primary">Follow</button>
						</form>';
						echo '</div>';
						echo '<br>';
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