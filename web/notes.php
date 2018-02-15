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
	
	$course_id = htmlspecialchars($_GET['course_id']);
	$query = "SELECT id, name, number FROM course WHERE id =:course_id";
	$stmt = $db->prepare($query);
	$stmt->bindValue(":course_id", $course_id, PDO::PARAM_INT);
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
					$number = $row['number'];
					$name = $row['name'];	
					echo "<h1>Notes for $number - $name</h1>";
				
				}
			?>
		</ul>

	</body>
</html>