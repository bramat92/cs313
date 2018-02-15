<?php
	try
	{
		$user = 'pdwhaohijgrthi';
		$password = '7b6c2e054b2b300b962860ce64c613851403e6e1137e0feb4d202c639306611c';
		$db = new PDO('pgsql:host=ec2-107-22-175-33.compute-1.amazonaws.com;dbname=dc8ditj1i68i69', $user, $password);
	}
	catch (PDOException $ex)
	{
		echo 'Error!: ' . $ex->getMessage();
		die();
	}
	
	$query = "SELECT name, number FROM course";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Courses</title>
	</head>
	<body>
		<h1>Courses</h1
		<ul>
			<?php
				foreach ($courses as $row)
				{
					
					echo '<li><p><a href="views.php">' . $row['name'] . ' - ' . $row['number'] . '</a></p></li>';
				
				}
			?>
		</ul>

	</body>
</html>