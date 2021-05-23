<?php
//Variabili del DB
define('HOSTNAME', 'localhost');
define('USERNAME', 'mysql');
define('PASSWORD', '5582');
define('DATABASE', 'aziendaselezione');
define('PORT', '3306');

//Variabili dei campi del form
$tipo = "";
$email = "";
$username = "";
$password = "";
$passwordhash = "";

$piva = "";
$cf = "";
$nome = "";
$cognome = "";
$telefono = "";
$datanascita = "";
$indirizzo = "";
$citta = "";
$cap = "";
$provincia = "";

if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
}

if (isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['username'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['password'])) {
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['piva'])) {
    $piva = filter_var($_POST['piva'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['cf'])) {
    $cf = filter_var($_POST['cf'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['nome'])) {
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['cognome'])) {
    $cognome = filter_var($_POST['cognome'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['telefono'])) {
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['datanascita'])) {
    $datanascita = filter_var($_POST['datanascita'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['indirizzo'])) {
    $indirizzo = filter_var($_POST['indirizzo'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['citta'])) {
    $citta = filter_var($_POST['citta'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['cap'])) {
    $cap = filter_var($_POST['cap'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['provincia'])) {
    $provincia = filter_var($_POST['provincia'], FILTER_SANITIZE_STRING);
}

// Creo un Hash dela password per la memorizzazione sicura nel DB
$passwordhash = password_hash($password, PASSWORD_DEFAULT);

// Connessione a DB MySQL
$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);
!$mysqli -> connect_errno
    or die("Error: Falied to CONNECT: ({mysqli->connect_errno}) {mysqli->connect_error}");

    // Verifica dell'esistenza dell'utente
$queryVerifica = "SELECT * FROM utenti WHERE username = '$username';";

$resultSet = $mysqli -> query($queryVerifica)
    or die("Error: SELECT failed: ({$mysqli->errno}){$mysqli->error}");
    echo "Utente esiste";
if ($resultSet -> num_rows > 0) {
    // Utente esiste già
    // Da cambiare
    echo "Utente esiste";
} else {
    echo "Utente esiste";
    $queryUtenti = "INSERT INTO utenti VALUES ('$username', '$passwordhash', '$email', '$tipo');";
    if ($tipo === "azienda") {
        $queryAziende = "INSERT INTO aziende VALUES ($piva, $nome, $provincia, $citta, $indirizzo, $cap, $telefono, $username);";
        $mysqli -> query($queryUtenti)
		    or die("Error: INSERT failed: ({$mysqli->errno}){$mysqli->error}");
        $mysqli -> query($queryAziende)
            or die("Error: INSERT failed: ({$mysqli->errno}) {$mysqli->error}");
        echo "Utente inserito";
    } elseif ($tipo === "candidato") {
        $queryCandidati = "INSERT INTO candidati VALUES ($cf, $nome, $cognome, $datanascita, $provincia, $citta, $indirizzo, $cap, $telefono, $username);";
        $mysqli -> query($queryUtenti)
            or die("Error: INSERT failed: ({mysqli->errno}) {mysqli->error}");  
        $mysqli -> query($queryCandidati)
            or die("Error: INSERT failed: ({mysqli->errno}) {mysqli->error}");
        echo "Utente inserito";
    }
} 

$resultSet -> close();
$mysqli -> close();
?>
