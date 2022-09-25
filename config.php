<?php 
$username="root";
$password="";
$dsn="mysql:host=localhost;dbname=naijacrats";
try {
	$connection=new PDO($dsn, $username, $password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch (PDOException $e) {
	echo "connection Fail".$e->getMessage();
}

?>