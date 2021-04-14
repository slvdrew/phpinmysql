<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'futbol_club_barcelona';

	$conn = new mysqli($servername, $username, $password, $db);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "CREATE DATABASE futbol_club_barcelona";
	if ($conn->query($sql)) {
		echo "Successfully created database";
	} else {
		echo "Error: " . $conn->error;
	}
	
	$sql = "
	CREATE TABLE player(
		id INT(6) AUTO_INCREMENT,
		full_name varchar(255) NOT NULL,
		year_joined INT(8) NOT NULL,
		position varchar(255) NOT NULL,
		nationality varchar(255) NOT NULL,
		PRIMARY KEY(id)
	);
	";
	if ($conn->query($sql)) {
		echo "Successfully created table Barcelona";
	} else {
		echo "Error: " . $conn->error;
	}

	$sql = "
	INSERT INTO player(full_name, year_joined, position, nationality)
	VALUES
		('Marc-Andre ter Stegen', 2014, 'Goalkeeper', 'Germany'),
		('Gerard Pique', 2008, 'Defender', 'Spain'),
		('Sergio Busquets', 2008, 'Midfielder', 'Spain'),
		('Antoine Griezmann', 2019, 'Forward', 'France'),
		('Lionel Messi', 2004, 'Forward', 'Argentina');
	";
	if ($conn->query($sql)) {
		echo "Successfully inserted data";
	} else {
		echo "Error: " . $conn->error;
	}

	$sql = "SELECT * FROM player;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo  "These are the players: <br>";
		foreach ($result as $player) {
			echo "ID: " . $player['id'] . "<br>";
			echo "Full Name: " . $player['full_name'] . "<br>";
			echo "Year Joined: " . $player['year_joined'] . "<br>";
			echo "Position: " . $player['position'] . "<br>";
			echo "Nationality: " . $player['nationality'] . "<br>";
		}
	} else {
		echo "There are 0 results";
	}
?>