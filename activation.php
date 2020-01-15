<?php
require('includes/header.php');
require('script/bdd.php');
// Récupération des variables nécessaires à l'activation
$login = $_GET['log'];
$cle = $_GET['cle'];
 
// Récupération de la clé correspondant au $login dans la base de données
$stmt = $bdd->prepare("SELECT cle,actif FROM user WHERE username like '".$login."'");
if(($stmt->execute()) && $row = $stmt->fetch())
  {
    $clebdd = $row['cle'];    // Récupération de la clé
    $actif = $row['actif']; // $actif contiendra alors 0 ou 1
  }
 
 
// On teste la valeur de la variable $actif récupérée dans la BDD
if($actif == '1') // Si le compte est déjà actif on prévient
  {
     echo "Votre compte est déjà actif !";
  }
else // Si ce n'est pas le cas on passe aux comparaisons
  {
     if($cle == $clebdd) // On compare nos deux clés    
       {
          // Si elles correspondent on active le compte !    
          echo "Votre compte a bien été activé !";
 
          // La requête qui va passer notre champ actif de 0 à 1
          $stmt = $bdd->prepare("UPDATE user SET actif = 1 WHERE username like '".$login."'");

          $stmt->execute();
          header('Refresh: 0, url="../login.php"');
          $_SESSION['succes_message'] = "Validation Effectué vous pouvez des à présent vous connecter.";
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       {
          echo "Erreur ! Votre compte ne peut être activé...";
       }
  }
  var_dump($_SESSION);
  die();
