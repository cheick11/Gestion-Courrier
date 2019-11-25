<?php
try {
	$pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$db = new PDO ('mysql:host=localhost;dbname=db_courrier', 'root', '', $pdo_options);
}
catch (Exceptio $e)
{
	die('Erreur : ' . $e->getMessage());
}

?>
