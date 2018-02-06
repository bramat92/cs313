<?php
	try
	{
		$user = 'pczslgipstyxmw';
		$password = 'c607121aa158f075cdba08ecdb065c54fd1e504bfa65e105bcdb424f42de3149';
		$db = new PDO('pgsql:host=ec2-54-204-43-7.compute-1.amazonaws.com;dbname=dd7bq5f2igorr7', $user, $password);
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
		<title>Scriptures</title>
	</head>
	<body>
		<h1>Scripture Title</h1>
		<p>
			<?php
				foreach ($db->query('SELECT * FROM scripture') as $row)
				{
					echo '<p>';
					echo '<strong>' .$row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "' . $row['content'] . '"';
					echo '</p>';
				}
			?>
		</p>
		
	</body>
</html>