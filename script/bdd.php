<?php
  try {

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; /* on définie les options d'erreurs que l'on souhaite */
$bdd = new PDO("mysql:host=localhost;dbname=toolboxdofus;charset=utf8", 'root', '', $pdo_options);
  }
  catch(exception $e) {
    die('Erreur '.$e->getMessage());
  }
?>