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
				foreach ($db->query('SELECT name, number FROM course') as $row)
				{
				
					echo '<li><p>' . $row['name'] . ' - ' . $row['number'] . '</a></p></li>';
				
				}
			?>
		</ul>

	</body>
</html>