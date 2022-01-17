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
var_dump($conn);

// le costanti definite poco prima vengono utilizzate come parametri per il costruttore dell'oggetto contenente la connessione al DB


// check connessione
if($conn->connect_error) {
	die("connection failed: {$conn->connect_error}");
}

echo '<h1>Database Connected</h1>';

// get the data from the database (teachers)

// query al DB
// si salva in una variabile la stringa che verrà utilizzata come query al database
$sql = "SELECT *
		FROM `teachers`";

// i risultati sono richiesti dal metodo query dell'oggetto contenente i dati di connessione al DB (in questo caso $conn), al metodo query, come parametro gli viene passata la stringa salvata in variabile
$results = $conn->query($sql);

if ($results && $results -> num_rows > 0) {
	// recuperare i dati
	while ($row = $results -> fetch_assoc()) {
		echo "<h3>{$row['name']} {$row['surname']}</h3>";
	}
	// in caso la query sia corretta ma dia 0 risultati
} else if ($results) {
	echo '<h3>No data found.</h3>';
	// in caso di query errata
} else {
	echo '<h2>incorrect Query</h2>';
}

// SECURITY - SQL INJECTIONS
// il modo più veloce per fare una richiesta al database è quella di utilizzare le query string ed il metodo $_GET, questo però porta alla possibilità di eseguire codice malevolo da parte dell'utente
// per poter evitare questa situazione, si utilizzano le "prepared statements", prevedono l'inserimento, tramite la funzione bind_param(), di placeholder che verranno popolate con i parametri della querystring, una volta "puliti" dall'eventuale codice malevolo

// preparazione
$stmt = $conn -> prepare("INSERT INTO `my_guests` (firstname, lastname, email) VALUES (?, ?, ?)");
// stiamo impostando la queryString perché inserisca nella tabellla "my_guests" le tre colonne "firstname", "lastname" ed "email" con i valori "?"
// questo significa che la query string ancora non è pronta, perché non ha i valori da inserire in tabella
// PS: i "?" devono essere tanti quanti sono i parametri da inserire

// creazione legame tra query string preparata e le variabili da cui pescherà i valori
$stmt -> bind_param("sss", $firstname, $lastname, $email);
// la funzione bind_param(@1, @2); accetta due parametri:
// @1 = una stringa formata da tante lettere quante le colonne/"?"/variabili da inserire come sostituti dei placeholder. ogni carattere che forma questa stringa indica che tipo di dati aspettarsi, e quindi accettare come validi (s = stringa, i = numero intero, d = numero con decimali, b = blob (binary large objects))
// @2 = le variabili, separate da una virgola, che verranno utilizzate per popolare la query al DB

// setting dei parametri ed esecuzione
$firstname = 'john';
$lastname = 'Doe';
$email = 'john@doe.com';

// esecuzione
$stmt -> execute();
// questa funzione verifica che il dato effettivo sia "sano", lo sostituisce al placeholder ed invia la richiesta al DB


// il metodo dell'oggetto chiude la connessione al DB che altrimenti rimarrebbe aperta
$conn -> close();
?>