<?php 
require_once __DIR__ . './database.php';

$sql = "SELECT *
FROM `departments`";

$results = $conn -> query($sql);

$departments = [];

if ($results && $results -> num_rows > 0) {
	while ($row = $results -> fetch_assoc()) {
		$departments[] = $row;
	}
} else {
	echo '<h2>Query Error</h2>';
}