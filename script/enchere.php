<?php require('../includes/header.php');
require('bdd.php');


if (isset($_POST) && empty($user_id)) {

	date_default_timezone_set('Europe/Paris');
	$equipement = htmlspecialchars($_POST['Auct_Add_Equip']);
	$serv = htmlspecialchars($_POST['Auct_Serv']);
	$screen = $_FILES['Auct_screen'];
	$user_id = htmlspecialchars($_POST['add_auct_id']);
	$transfert = $_POST['Auct_transfert'];
	$desc = htmlspecialchars($_POST['Auct_txt']);
	$pos = $_POST['Auct_last_Pos'];
	$p_go = $_POST['Auct_prix_sell'];
	$fm =  $_POST['auct_fm'];
	$tim = date("Y-m-d H:i:s");
	$activ = '1';

echo  date("Y-m-d H:i:s");
// var_dump((is_numeric($fm)) == TRUE && (!empty($fm)));
// die();

	$sql = $bdd->prepare('INSERT INTO `list_auct`(`user_id`, `auct_serv`, `auct_tranfert`,`auct_screen`,`Auct_txt`,`auct_last_pos`,`Auct_prix_sell`, `Auct_Equip`, `auct_time`, `auct_fm`, `auct_activ`) VALUES (:u,:a_s,:a_t,:a_sc,:a_txt,:a_p_s,:a_p_go,:a_equip,:tim,:fm,:activ)');

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
			if ((isset($pos)) == TRUE && (!empty($pos))) {

				$sql->bindParam('a_p_s', $pos, PDO::PARAM_STR);

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
					
					var_dump($_POST);
					
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
		$errorUrl = "Profil non trouver";
		Header('Refresh:0; url=../login.php?err_message='.$errorUrl.'');
	}


}else{
	$errorUrl = 'enchereInvalide';
	Header('Refresh:0; url=../tool/enchere.php?err_message='.$errorUrl.'');
}

$sql_item = $bdd->prepare('
	INSERT INTO `list_auct_stats`(`item_id`, `user_id`, `auct_id`, `vie`, `fo`, `ine`, `cha`, `age`, `sa`, `pa`, `pm`, `invo`, `do`, `do_feu`, `do_fo`, `do_cha`, `do_neu`, `do_air`, `do_sort`, `do_arme`, `do_mel`, `do_dis`, `so`, `pp`, `ini`, `pods`, `tac`, `fui`, `ret_pa`, `ret_pm`, `esq_pa`, `esq_pm`, `do_cri`, `do_pou`, `res_cri`, `res_pou`, `pc_neu`, `pc_fo`, `pc_ine`, `pc_cha`, `pc_air`, `res_neu`, `res_fo`, `res_ine`, `res_eau`, `res_air`, `pc_sort`, `pc_arme`, `pc_melee`, `pc_dist`, `renvoie`, `crit`) 
	VALUES (
	:item_id
	,:user_id
	,:auct_id
	,:vie
	,:fo
	,:ine
	,:cha
	,:age
	,:sa
	,:pa
	,:pm
	,:invo
	,:do
	,:do_feu
	,:do_fo
	,:do_cha
	,:do_neu
	,:do_air
	,:do_sort
	,:do_arme
	,:do_mel
	,:do_dis
	,:so
	,:pp
	,:ini
	,:pods
	,:tac
	,:fui
	,:ret_pa
	,:ret_pm
	,:esq_pa
	,:esq_pm
	,:do_cri
	,:do_pou
	,:res_cri
	,:res_pou
	,:pc_neu
	,:pc_fo
	,:pc_ine
	,:pc_cha
	,:pc_air
	,:res_neu
	,:res_fo
	,:res_ine
	,:res_eau
	,:res_air
	,:pc_sort
	,:pc_arme
	,:pc_melee
	,:pc_dist
	,:renvoie
	,:crit
)');

$stat_array = array(
array( 'vie' , $_POST['vie']),
array( 'fo' , $_POST['fo']),
array( 'ine' , $_POST['ine']),
array( 'cha' , $_POST['cha']),
array( 'age' , $_POST['age']),
array( 'sa' , $_POST['sa']),
array( 'pa' , $_POST['pa']),
array( 'pm' , $_POST['pm']),
array( 'invo' , $_POST['invo']),
array( 'do' , $_POST['do']),
array( 'do_feu' , $_POST['do_feu']),
array( 'do_fo' , $_POST['do_fo']),
array( 'do_cha' , $_POST['do_cha']),
array( 'do_neu' , $_POST['do_neu']),
array( 'do_air' , $_POST['do_air']),
array( 'do_sort' , $_POST['do_sort']),
array( 'do_arme' , $_POST['do_arme']),
array( 'do_mel' , $_POST['do_mel']),
array( 'do_dis' , $_POST['do_dis']),
array( 'so' , $_POST['so']),
array( 'pp' , $_POST['pp']),
array( 'ini' , $_POST['ini']),
array( 'pods' , $_POST['pods']),
array( 'tac' , $_POST['tac']),
array( 'fui' , $_POST['fui']),
array( 'ret_pa' , $_POST['ret_pa']),
array( 'ret_pm' , $_POST['ret_pm']),
array( 'esq_pa' , $_POST['esq_pa']),
array( 'esq_pm' , $_POST['esq_pm']),
array( 'do_cri' , $_POST['do_cri']),
array( 'do_pou' , $_POST['do_pou']),
array( 'res_cri' , $_POST['res_cri']),
array( 'res_pou' , $_POST['res_pou']),
array( 'pc_neu' , $_POST['pc_neu']),
array( 'pc_fo' , $_POST['pc_fo']),
array( 'pc_ine' , $_POST['pc_ine']),
array( 'pc_cha' , $_POST['pc_cha']),
array( 'pc_air' , $_POST['pc_air']),
array( 'res_neu' , $_POST['res_neu']),
array( 'res_fo' , $_POST['res_fo']),
array( 'res_ine' , $_POST['res_ine']),
array( 'res_eau' , $_POST['res_eau']),
array( 'res_air' , $_POST['res_air']),
array( 'pc_sort' , $_POST['pc_sort']),
array( 'pc_arme' , $_POST['pc_arme']),
array( 'pc_melee' , $_POST['pc_melee']),
array( 'pc_dist' , $_POST['pc_dist']),
array( 'renvoie' , $_POST['renvoie']),
array( 'crit' , $_POST['crit']),
);
var_dump($stat_array);
$id_equip = $bdd->lastInsertId();

$sql_item->bindParam('item_id', $equipement, PDO::PARAM_STR);
$sql_item->bindParam('user_id', $user_id, PDO::PARAM_STR);
$sql_item->bindParam('auct_id', $id_equip, PDO::PARAM_STR);

for ($row = 0; $row < 49; $row++) {
	if (empty($stat_array[$row][1])) {
		$valueN = '';
		$sql_item->bindParam($stat_array[$row][0], $valueN, PDO::PARAM_STR);
	}else{
		$sql_item->bindParam($stat_array[$row][0], $stat_array[$row][1], PDO::PARAM_STR);
	}
}
$sqlReq_item = $sql_item->execute();


if (isset($sqlReq)) {
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