<?php
require('bdd.php'); ?>

<section class="f-row container">
	<div class="col-12 row">
  			<?php
			$list_auct = "
			SELECT la.id, la.user_id, la.auct_serv, la.auct_tranfert, la.Auct_screen, la.Auct_txt, la.Auct_prix_start, la.Auct_prix_sell, la.Auct_Equip, le.equip_name as equip, u.username as username, s.nom_serv as serv
			FROM list_auct la
			JOIN user u
            ON la.user_id = u.id
            JOIN list_equipement le 
            ON la.Auct_Equip = le.id
            JOIN serveurs s
            on la.auct_serv = s.id";
			$resList = $bdd->query($list_auct);
			    // output data of each row

		
				while($list = $resList->fetch()) {
			        echo ("
					<div class=' col-12 row list-card'>
					  	<div class='col-1 img-auct'>
					  	<a alt='Ouverture de l'image' class='popup-img'>
							<img class='img-fluid' src='../upload/auction/".$list['Auct_screen']."' alt='Card image cap'>
							<i class='lni-zoom-in'></i>
						</a>
						<div id='img-popup' class='img-show'>
							<span class='close-img'>&times;</span>
							<img class='img-shown'  src='../upload/auction/".$list['Auct_screen']."'>
							<div id='caption'></div>
						</div>
					  	</div>
					  	<div class='col-2'>	
						    <h5 class=''>".$list['equip']."</h5>
						</div>	
						<div class='col-5 text-left'>
							<h6>Caractéristique : </h6>	
							<p class=''>".$list['Auct_txt']."</p>
							<small class='text-muted'>
									par : ".$list['username']."
								</small>
						</div>
						<div class='col-2 text-left'>
							<h6>Enchère en cours : </h6>	
							<p class='prix'>".$list['Auct_prix_start']."
								<img class='img-fluid' style='width:1rem;' src='../upload/assets/kamas.png'>
							</p>
							<h6>Prix de vente : </h6>
							<p class='prix'>".$list['Auct_prix_sell']."
								<img class='img-fluid' style='width:1rem;' src='../upload/assets/kamas.png'>
							</p>
						</div>
						<div class='col-2 row'>
						    <button onlcick='mp' name='btn-sub-".$list['id']."' class='col-12 btn btn-primary mp_button'> Contact IG </button>
						    <input type='text' name='text-".$list['id']."' class='col-12 mp_txt form-control' value='/w ".$list['username']." Bonjour à toi, je souhaiterais acheter ton ".$list['equip']." :D, vus depuis D2toolBox' >
						</div>
					</div>
					");
			  	  } 
			    
			    $resList->closeCursor();


			    
			

?>

	</div>

</section>


