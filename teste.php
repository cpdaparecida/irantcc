<?php
include 'config_hospitais.php';
session_start();
$_SESSION['hospital'] = "Restauração";
var_dump($_SESSION['hospitais']);
echo "{$hospitais[$_SESSION['hospital']]}";
echo "<br>Os hospitais são:<br>";
foreach ($_SESSION['hospitais'] as $key => $value) {
	# code...
	$string = "Hospital: ".htmlspecialchars($value)."<br>";
	echo $string;
}

?>