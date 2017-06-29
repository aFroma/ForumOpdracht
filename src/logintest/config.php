<?php
session_start();

define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', 'arjen123');
define('dbname', 'forum');

// Connectie maken met de database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

?>
