<?php  
require('../includes/header.php');
require('bdd.php');



// 
// Script déconnexion
// 
if (isset($_POST['logout'])) {

		session_destroy();
		Header('Refresh:0 ;url=../index.php');
}

$errorUrl = Null;



// Script connexion

if (isset($_POST['submitConn'])) {
	session_unset();
	if ((isset($_POST['ConUser'])) && (isset($_POST['ConPassword'])) && (!empty($_POST['ConUser'])) && (!empty($_POST['ConPassword']))) {

		$ConUser = htmlspecialchars($_POST['ConUser']);
		$ConPassword = md5($_POST['ConPassword']);



		$sql = "SELECT id, username, password, actif FROM user WHERE username = '".$ConUser."' AND password = '".$ConPassword."'";

		$req = $bdd->query($sql);
		$result = $req->execute();

		if (($result) == TRUE) {
		    // output data of each row
		$reqActif = $bdd->prepare("SELECT id, username, password, actif FROM user WHERE username = :username AND password = :pass");

			if ($reqActif->execute(array(':username' => $ConUser, ':pass' => $ConPassword, ))  && $row = $reqActif->fetch()) {
				$actif = $row['actif'];
			}
			if($actif == '1') // Si $actif est égal à 1, on autorise la connexion
  			{
  				session_unset();
				$_SESSION['user_id'] = $row['id'];
			    $_SESSION['username'] = $row['username'];
				Header('Refresh:0; url=../index.php?loginSuccess');
			}else{
				$errorUrl = 'accountNoActivated';
				Header('Refresh:0; url=../login.php?err_message='.$errorUrl.'');
						
			}  
		} else {
		$errorUrl = 'loginMdpNoMatch';
		Header('Refresh:0; url=../login.php?err_message='.$errorUrl.'');
			
		}

	} else {

	$errorUrl = 'noLogin';
	Header('Refresh:0; url=../login.php?err_message='.$errorUrl.'');

	}
}
// End Scriipt connexion

// 
// Script Inscription
// 
if (isset($_POST['submitInsc'])) { 
	session_unset();
	$InsUser = htmlspecialchars($_POST['InsUser']);
	$InsPassword = htmlspecialchars($_POST['InsPassword']);
	$InsPasswordV = htmlspecialchars($_POST['InsPasswordV']);
	$InsEmail = htmlspecialchars($_POST['InsEmail']);
	$InsServ = implode(', ', $_POST['InsServ']);
	$cle= md5(microtime(TRUE)*100000);


if (!empty($_POST['InsUser']) && !empty($_POST['InsPassword']) && !empty($_POST['InsPasswordV']) && !empty($_POST['InsEmail']) && !empty($_POST['InsServ'])) {

	if (isset($InsUser)) {
		$sql = "SELECT username FROM user WHERE username = '".$InsUser."'";
		$req = $bdd->query($sql);
		$result = $req->fetch();

		if ($result == 1) {
			$_SESSION['err_message'] = "Un utilisateur utilise déjà ce pseudo";
			header('Refresh:0; url="../login.php"');
			die();
		}else{
			session_unset();
		}

	}
	if (isset($InsEmail)) {
		$sql = "SELECT email FROM user WHERE email = '".$InsEmail."'";
		$req = $bdd->query($sql);
		$result = $req->fetch();

		if ($result == 1) {
			$_SESSION['err_message'] = "Un utilisateur utilise déjà ce mail";
			header('Refresh:0; url="../login.php"');

		}else{
			session_unset();
		}

	}

	if ($InsPassword==$InsPasswordV) {
		$hashPass = md5($InsPassword);
		session_unset();
	}else{
		$_SESSION['err_message'] = "Les mot de passes ne correspondent pas !";
		header('Refresh:0; url="../login.php"');

	}

	if (empty($_SESSION['err_message'])) {	
	try
        {	
	$sql = $bdd->prepare('INSERT INTO `user`(`username`, `password`, `email`, `server`,`cle`) VALUES (:u,:hp,:email,:serv,:cle)');
	$sql->bindParam('u', $InsUser, PDO::PARAM_STR);
	$sql->bindParam('hp', $hashPass, PDO::PARAM_STR);
	$sql->bindParam('email', $InsEmail, PDO::PARAM_STR);
	$sql->bindParam('serv', $InsServ, PDO::PARAM_STR);
	$sql->bindParam('cle', $cle, PDO::PARAM_STR);
	$repSql = $sql->execute();

	if ($repSql == 1) {
	//
	//Mail confirmation d'inscription 
	// Préparation du mail contenant le lien d'activation
	$destinataire = $InsEmail;
	$sujet = "Activer votre compte" ;
	$entete = "From: inscription@d2toolbox.malstrom.fr"."\n";
    	$entete .="Reply-To: $mail"."\n";
    	$entete .='Content-Type: text/plain; charset="utf-8"'."\n";
    	$entete .= 'Content-Transfer-Encoding: 8bit"'."\n";

	// Le lien d'activation est composé du login(log) et de la clé(cle)
	$message = 'Bienvenue sur D2toolbox,

	Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
	ou copier/coller dans votre navigateur Internet.

	http://d2toolbox.malstrom.fr/activation.php?log='.urlencode($InsUser).'&cle='.urlencode($cle).'


	---------------
	Ceci est un mail automatique, Merci de ne pas y répondre.';


	mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail

	header('Refresh:0; url="../login.php"');
	}else{
		$_SESSION['err_message'] = "envoie de mail raté";
	}
	

	}
		catch(EXCEPTION $e)
        {  
            /* on affiche les erreur éventuelles en développement */
            die('Erreur : '.$e->getMessage());
        }

}
}else {
		$errorUrl = 'inscriptionEmpty';
		Header('Refresh:0; url=../login.php?err_message='.$errorUrl.'');
} 
}
	

?>