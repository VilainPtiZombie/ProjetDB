<?php require('../includes/header.php');
require('bdd.php');
		var_dump($_POST);

		var_dump($_SESSION);



if (isset($_POST)) {

date_default_timezone_set('Europe/Paris');
	$equipement = htmlspecialchars($_POST['Auct_Add_Equip']);
	$serv = htmlspecialchars($_POST['Auct_Serv']);
	$screen = $_FILES['Auct_screen'];
	$user_id = htmlspecialchars($_POST['add_auct_id']);
	$transfert = htmlspecialchars($_POST['Auct_transfert']);
	$desc = htmlspecialchars($_POST['Auct_txt']);
	$p_start = htmlspecialchars($_POST['Auct_prix_start']);
	$p_go = htmlspecialchars($_POST['Auct_prix_sell']);
	$fm =  htmlspecialchars($_POST['auct_fm']);
	$tim = date("Y-m-d H:i:s");
	$activ = '1';

echo  date("Y-m-d H:i:s");
// var_dump((is_numeric($fm)) == TRUE && (!empty($fm)));
// die();

	$sql = $bdd->prepare('INSERT INTO `list_auct`(`user_id`, `auct_serv`, `auct_tranfert`,`auct_screen`,`Auct_txt`,`Auct_prix_start`,`Auct_prix_sell`, `Auct_Equip`, `auct_time`, `auct_fm`, `auct_activ`) VALUES (:u,:a_s,:a_t,:a_sc,:a_txt,:a_p_s,:a_p_go,:a_equip,:tim,:fm,:activ)');

	if ((is_numeric($user_id)) == TRUE && (!empty($user_id))) {

		$sql->bindParam('u', $user_id, PDO::PARAM_STR);

		if ((is_numeric($serv)) == TRUE && (!empty($serv))) {
			
			$sql->bindParam('a_s', $serv, PDO::PARAM_STR);

			if (($transfert) == 'on' && (!empty($transfert))) {

				$sql->bindParam('a_t', $transfert, PDO::PARAM_STR);

			}else{
				$sql->bindParam('a_t', $transfert, PDO::PARAM_STR);
			}
			if (isset($screen)) {

				$screen = "test";
				$sql->bindParam('a_sc', $screen, PDO::PARAM_STR);
			}else{
				$screen = "none";
				$sql->bindParam('a_sc', $screen, PDO::PARAM_STR);
			}
			if (!empty($desc)) {

				$sql->bindParam('a_txt', $desc, PDO::PARAM_STR);
			}else{
				$desc = "none";
				$sql->bindParam('a_txt', $desc, PDO::PARAM_STR);
			}
			if ((is_numeric($p_start)) == TRUE && (!empty($p_start))) {

				$sql->bindParam('a_p_s', $p_start, PDO::PARAM_STR);

				if ((is_numeric($p_go)) == TRUE && (!empty($p_go))) {

					$sql->bindParam('a_p_go', $p_go, PDO::PARAM_STR);
				}else{
					$p_go = "none";
					$sql->bindParam('a_p_go', $p_go, PDO::PARAM_STR);
				}

				if ( (is_numeric($equipement)) == TRUE && (!empty($equipement))) {

					$sql->bindParam('a_equip', $equipement, PDO::PARAM_STR);

					if ((is_numeric($fm)) == TRUE) {

					$sql->bindParam('fm', $fm, PDO::PARAM_STR);
					$sql->bindParam('tim', $tim, PDO::PARAM_STR);
					$sql->bindParam('activ', $activ, PDO::PARAM_STR);
					
					$sqlReq = $sql->execute();
					$errorUrl = "Enchère crée !";
					Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
					}else{
						$errorUrl = 'fmInvalid';
						Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
					}

				}else{
					$errorUrl = 'equipementNotSelected';
					Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
				}	
			}else{
				$errorUrl = 'prixInvalid';
				Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
			}	
		}else{
			$errorUrl = 'servInvalid';
			Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
		}
	}else{
		$errorUrl = 'equipementInvalid';
		Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
	}


}else{
	$errorUrl = 'enchereVide';
	Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
}
if ($sqlReq == TRUE) {
	//TRAITEMENT IMPORT IMAGE VIA FORMULAIRE
	//si on a recu un fichier et qu'il y a une erreur

	//si on a recu un fichier
	if($_FILES['Auct_screen']['size'] > 0){
		//on teste si on a la bonne extension
		$extensions_valides = array('png', 'jpg', 'jpeg', 'gif');
		//on recupère le nom d'origine du fichier
		$nomDuFichier = $_FILES['Auct_screen']['name'];
		//on décompose ce nom sous forme d'un tableau selon le motif '.'
		$patternDuFichier = explode('.', $nomDuFichier);
		//on recupere la derniere case de ce tableau c'est à dire l'extension
		$extension_du_fichier = $patternDuFichier[ count($patternDuFichier) - 1];
		//on transforme l'extention en minuscule
		$extension_minuscule = strtolower($extension_du_fichier);
		//si l'extension minuscule n'est pas dans le tableau des valides
		if( !in_array($extension_minuscule, $extensions_valides)) {
			//on declenche une erreur
			$errorUrl = 'inscriptionEmpty';
			Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
		}
	}else{
		$_FILES['Auct_screen'] = "test";
		$errorUrl = 'aucuneImg';
		Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
	}

	$id = $bdd->lastInsertId();
		if($_FILES['Auct_screen']['size'] > 0){
			//on construit le nouveau nom du fichier image
			$nom = $id.'.'.$extension_minuscule;
			//on deplace le fichier temporaire vers le dossier data avec le nouveau nom
			move_uploaded_file($_FILES['Auct_screen']['tmp_name'],'../upload/auction/'.$nom);
			//on modifie la ligne dans la base de donnees
			$modif = $bdd -> prepare('UPDATE list_auct SET auct_screen = :c WHERE id = :i');
			$modif -> execute(array(':c' => $nom, ':i' => $id));
		}
}


require('../includes/footer.php');

?>