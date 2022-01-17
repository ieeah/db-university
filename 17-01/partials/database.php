<?php

/**
* DATABASE CONNECTION
*/

// setup costanti
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'university');
// abbiamo definito delle costanti che verranno utilizzate per impostare la connessione al DB, in questo modo non abbiamo modo di sovrascrivere accidentalmente i dati, ma in caso sia stata modificata, ad esempio la password al database, sarà sufficiente modificarla qui per poter mantenere attiva la connessione


// open DB connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// var_dump($conn);

// le costanti definite poco prima vengono utilizzate come parametri per il costruttore dell'oggetto contenente la connessione al DB


// check connessione
if ($conn->connect_error) {
	die("connection failed: {$conn->connect_error}");
}

?>