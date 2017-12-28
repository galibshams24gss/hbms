<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=hms','root','');
} catch(PDOException $e){
	exit('DB error');
}
?>