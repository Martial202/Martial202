<?php

$user = 'root';
$pass = '';
$dsn='mysql:host=localhost; dbname=caderac';
try {
$cnx = new PDO($dsn,$user,$pass);
} catch (Exception $e) {
	die('Erreur '.$e->getMessage());
}

?>