<?php
require('bdd.php'); 
include('search_auct.php');
?>

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

            if (isset($_GET['SearchAuctEquip']) && isset($_GET['SearchInsServ']) && isset($_GET['SearchFm']) && isset($_GET['PrixMaxSearch'])) { 
            	$list_auct .= $ListSeach;
            }else{
            	$list_auct .= "";
            }

			$resList = $bdd->query($list_auct);
			    // output data of each row

			$stat_auct_item = "
			SELECT `vie`, `fo`, `ine`, `cha`, `age`, `sa`, `pa`, `pm`, `invo`, `do`, `do_feu`, `do_fo`, `do_cha`, `do_neu`, `do_air`, `do_sort`, `do_arme`, `do_mel`, `do_dis`, `so`, `pp`, `ini`, `pods`, `tac`, `fui`, `ret_pa`, `ret_pm`, `esq_pa`, `esq_pm`, `do_cri`, `do_pou`, `res_cri`, `res_pou`, `pc_neu`, `pc_fo`, `pc_ine`, `pc_cha`, `pc_air`, `res_neu`, `res_fo`, `res_ine`, `res_eau`, `res_air`, `pc_sort`, `pc_arme`, `pc_melee`, `pc_dist`, `renvoie`, `crit` 
			FROM list_auct_stats las
 			WHERE Auct_id = (SELECT id FROM list_auct)
			";
		    

		    if (!empty($resList)) {
				while($list = $resList->fetch()) {
			        echo ("
			        <a class='col-12' href='../p-vente.php?p=".$list['id']."'> 
					<div class=' col-12 row list-card'>
					
					  	<div class='col-1 img-auct'>
					  		<button alt='Ouverture de l'image'  data-toggle='modal' data-target='#popup-img'  tabindex='-1' role='dialog'>
							<img class='img-fluid' src='../upload/auction/".$list['Auct_screen']."' alt='Card image cap'>
							<i class='lni-zoom-in'></i>
					  	</div>

<div class='modal fade' id='popup-img' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
							  <div class='modal-dialog modal-dialog-centered' role='document'>
							    <div class='modal-content'>
							      <div class='modal-header'>
							        <h5 class='modal-title' id='exampleModalLongTitle'>Modal title</h5>
							        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
							          <span aria-hidden='true'>&times;</span>
							        </button>
							      </div>
							      <div class='modal-body row'>
							      	<div class='col-4'>
							      		<img class='img-shown'  src='../upload/auction/".$list['Auct_screen']."'>
							      	</div>
									<div id='caption col-8'>
										<h5> Stats de l'item</h5>
		
									</div>
							      </div>
							      <div class='modal-footer'>
							        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
							      </div>
							    </div>
							  </div>
							</div>

					  	<div class='col-2'>	
						    <h5 class=''>".$list['equip']."</h5>
						</div>	
						<div class='col-5 text-left'>
							<h6>Caractéristique : </h6>	
							<p class=''>".$list['Auct_txt']."</p>
							<small class='text-muted'>
									par : ".$list['username']." sur ".$list['serv']."
								</small>
						</div>
						<div class='col-2 text-left'>
								
							
							<h6>Prix de vente : </h6>
							<p class='prix'>".$list['Auct_prix_sell']."
								<img class='img-fluid' style='width:1rem;' src='../upload/assets/kamas.png'>
							</p>
						</div>
						<div class='col-2 row'>
							
						    
						</div>

					</div>
					<a>
					");
			  	  } 
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


<div class='modal fade' id='popup-img' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>Modal title</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body row'>
      	<div class='col-4'>
      		<img class='img-shown'  src='../upload/auction/".$list['Auct_screen']."'>
      	</div>
		<div id='caption col-8'>
			<h5> Stats de l'item</h5>
								
		</div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>