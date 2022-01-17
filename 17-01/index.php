<?php

require_once __DIR__ . './partials/get_departments.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style.css">
	<title>Document</title>
</head>

<body>
	<h1>Lista Dipartimenti</h1>
	<table>
		<thead>
			<th>Nome</th>
			<th>Responsabile</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Indirizzo</th>
			<th>Dettagli</th>
		</thead>
		<tbody>
			<?php foreach ($departments as $dep) :?>
				<?php echo "<tr>
								<td> {$dep['name']} </td>
								<td> {$dep['head_of_department']} </td>
								<td> {$dep['email']} </td>
								<td> {$dep['phone']} </td>
								<td> {$dep['address']} </td>
								<td> 
									<a href=\"show.php?id={$dep['id']}\">view more</a>
								</td>
							</tr>" ?>
				<?php endforeach; ?>
		</tbody>
	</table>
</body>

</html>

<?php

$conn->close();

?>