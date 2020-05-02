<?php
include('script/bdd.php');
include('includes/header.php');
?>

<section class="f-row container">
	<div class="backpage">
		<a href="../tool/enchere.php" style="color:white;"><i class="lni lni-arrow-left"></i> Revenir à la liste</a>
	</div>
	<div class="col-12 row">
  		<?php

  			$postVente = $_GET['p'];

			$list_auct = "
			SELECT la.id, la.user_id, la.auct_serv, la.auct_tranfert, la.Auct_screen, la.Auct_txt, la.Auct_prix_start, la.Auct_prix_sell, la.Auct_Equip, le.equip_name as equip, u.username as username, s.nom_serv as serv, las.*
			FROM list_auct la
			JOIN user u
            ON la.user_id = u.id
            JOIN list_auct_stats las
            ON la.id = las.auct_id
            JOIN list_equipement le 
            ON la.Auct_Equip = le.id
            JOIN serveurs s
            on la.auct_serv = s.id
            WHERE la.id = $postVente";

          	$resList = $bdd->query($list_auct);
			    // output data of each row

			$list = $resList->fetch();
			//Affichage stats

			$list_stats = $bdd->prepare('SELECT  `vie`, `fo`, `ine`, `cha`, `age`, `sa`, `pa`, `pm`, `invo`, `do`, `do_feu`, `do_fo`, `do_cha`, `do_neu`, `do_air`, `do_sort`, `do_arme`, `do_mel`, `do_dis`, `so`, `pp`, `ini`, `pods`, `tac`, `fui`, `ret_pa`, `ret_pm`, `esq_pa`, `esq_pm`, `do_cri`, `do_pou`, `res_cri`, `res_pou`, `pc_neu`, `pc_fo`, `pc_ine`, `pc_cha`, `pc_air`, `res_neu`, `res_fo`, `res_ine`, `res_eau`, `res_air`, `pc_sort`, `pc_arme`, `pc_melee`, `pc_dist`, `renvoie`, `crit` 
											FROM list_auct_stats
								 			WHERE  `auct_id` = :p');
			$list_stats->bindparam(':p', $postVente);
			$list_stats->execute();

			$carac = $list_stats->fetch(PDO::FETCH_ASSOC);

			$Caracteristique = '';
			foreach($carac as $key => $value) {

					if($value != 0 ) {
						$Caracteristique .= "<p class='col-5'>".$key." : ".$value."</p>";
					}
				};
						
		    if (!empty($resList)) {
		        echo ("
				<div class=' col-12 row list-card'>
					<div class='col-12'>	
					    <h5 class=''>". $list['equip']."</h5>
					</div>	

				  	<div class='col-12 img-auct'>
				  		
						<img class='img-fluid' src='../upload/auction/".$list['Auct_screen']."' alt='Card image cap'>
						
				  	</div>

				  	
					<div class='col-6 text-left'>
						<h6>Description : </h6>	
						<p class=''>".$list['Auct_txt']."</p>
						<h6>Caractéristique : </h6>	
						<div class='row'>
						".$Caracteristique."
						</div>
					</div>
					<div class='col-6 text-left'>
							<h6>Prix de vente : </h6>
							<p class='prix'>".$list['Auct_prix_sell']."
							<img class='img-fluid' style='width:1rem;' src='../upload/assets/kamas.png'>
							</p>
						</div>
					
					<div class='col-12 row'>
						
					    <div class='btn-group col-6' role='group'>
					    	<button onlcick='mp' name='btn-sub-".$list['id']."' class='col-12 btn btn-primary mp_button'> Contact </button>
							<input type='text' name='text-".$list['id']."' class='col-6 mp_txt form-control' value='/w ".$list['username']." Bonjour à toi, je souhaiterais acheter ton ".$list['equip']." :D, vus depuis D2toolBox' >
						</div>
						<div class='btn-group col-6' role='group'>
							<button onlcick='pos' name='btn-sub-".$list['id']."' class=' col-12 btn btn-primary mp_button'> Position </button>
							<input type='text' name='text-".$list['id']."' class=' col-6 mp_txt form-control' value='/w ".$list['username']." Bonjour à toi, je souhaiterais acheter ton ".$list['equip']." :D, vus depuis D2toolBox' >
						</div>

					</div>
					
				</div>
				");
		  	} 
			  	
			    
		    else{
		    	echo ("
				<div class='col-12 row outoofstock'>
					<span>Aucun item listé</span>
					<span class='smiley'> :'(</span>
				</div>
		    	");
		   	}

		    $resList->closeCursor();

?>

	</div>


</section>

<?php 


include('includes/footer.php');?>

