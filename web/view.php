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
		<form action="view.php" method="get">
			<input type="text" name="search" placeholder="search">
			<input type="submit" value="search">
		</form>
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
		
		<form action="view.php" method="get">
			<input type="text" name="book" placeholder="book">
			<input type="text" name="chapter" placeholder="chapter">
			<input type="text" name="verse" placeholder="verse">
			<input type="text" name="content" placeholder="content">
			<?php
				
			foreach($db->query('SELECT name FROM topic') as $row) {
				echo '<input type="checkbox" name="topicname" placeholder=" topic name" value = "' . $row['name'] . '">';
				echo $row['name'] . '<br>';
			}
			
			?>
			<input type="submit" value="search">
		</form>
		
		

	</body>
</html>