<?php

error_reporting(0);

$servername = "localhost";
$username = "postgres";
$password = "postgres";
$dbname = "formulario";
$port = "5432";

// Create connection
//$conn = pg_connect($servername, $username, $password, $dbname, $port);
$conn = pg_connect("host=localhost port=5432 dbname=formulario user=postgres password=postgres");
// Check connection
if (!$conn) {
    die("Connection failed: Deu Ruim!");
}

//echo "Connected successfully";

?>
