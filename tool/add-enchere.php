<div class="modal fade " id="add_enchere" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    	<div class="modal-content col-12">
    		<form method="post" action="../script/enchere.php" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Mettre au enchères un item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<div class="modal-body">
			    <div class="col-12 input-group">
			      <select required name="Auct_Add_Equip" class="selectpicker form-control" id="serveur" data-live-search="true" data-title="Item à vendre" data-style="text" data-size="10" >
			      	<?php require ('../script/bdd.php');
						$sql = "SELECT id, equip_name FROM list_equipement";
						$req = $bdd->query($sql);
						

						    // output data of each row
						while($row = $req->fetch()) {
						        echo ("<option value='".$row['id']."'>".$row['equip_name']." </option>");
						    } ?>	
					</select>
			    </div>
			    <div class="form-row col-12">
				    <div class="col-4 input-group">
				      	<select required name="Auct_Serv" class="form-control">
				      		<option selected>Votre Serveur</option>
					      	<?php require ('../script/bdd.php');
								$sql3 = "SELECT id, nom_serv FROM serveurs";
								$req2 = $bdd->query($sql3);
								

								    // output data of each row
								while($rows = $req2->fetch()) {
								        echo ("<option value='".$rows['id']."'>".$rows['nom_serv']." </option>");
								    } 
								    $req2->closeCursor();
								    ?>	

						</select>
				    </div>
			    	<div class="col-4 custom-control custom-checkbox">
					  	<input name="Auct_transfert" type="checkbox" class="custom-control-input" id="customCheck1">
					 	<label class="custom-control-label" for="customCheck1">Transfert inclus ?</label>
					</div>
				    <div class="col-4">
					<select required type="radio" name="auct_fm" class="form-control" placeholder="FM/Exo ?">
						<option selected>FM/Exo ?</option>
						<option value="0">Non</option>
						<option value="1">Oui</option>
					</select>
		    	</div>
			    <div class="col-12">
			    	<div class="input-group-prepend">
				    	<span class="input-group-text" id="basic-addon3">Votre screen</span>
			    	 	<div class="custom-file">
			    	 		<input type="hidden" name="MAX_FILE_SIZE" value='12222222' >
					  		<input name="Auct_screen" type="file" class="custom-file-input" id="customFile" placeholder="screen">
					  		<label class="custom-file-label" for="customFile"></label>
						</div>
					</div>
			    </div>
			    <div class="col-12  input-group">
			    	<input name="Auct_txt" type="text" class="form-control" placeholder="Description" data-toggle="popover" data-trigger="focus" title="Informations" data-content="Texte détaillant l'offre">
			    </div>
			    <?php 
			    if (isset($_SESSION['username'])) {
			    	echo '<input type="hidden" name="add_auct_id" value="'.$_SESSION['user_id'].'">';
			    }
			    ?>
			    <div class="col-12  input-group">

			    	<input required name="Auct_last_Pos" type="text" class="col-4 form-control" placeholder="Position de l'item*" data-toggle="popover" data-trigger="focus" title="Informations" data-placement="left" data-content="Position de l'item, Place marchande ou HDV / Format : [00,00]">
			    	<input required name="Auct_prix_sell" type="number" class="col-8 form-control" placeholder="Prix de cession" data-toggle="popover" data-trigger="focus" title="Informations" data-content="Prix minimum désiré en kamas">
			    </div>		    
			
		    
		    </br>
			</br>
			<div class="input-group">
			<h5>Stat de l'équipement :<small>(non obligatoire mais fortement conseillé)</small></h5>
			<div class="row col-12">	
				<input name="vie" placeholder="Vitalité" value="vie" type="number" class="col-3 form-control">	
				<input name="fo" placeholder="Force" value="fo" type="number" class="col-3 form-control"> 
				<input name="ine" placeholder="Intelligence" value="ine" type="number" class="col-3 form-control"> 
				<input name="cha" placeholder="Chance" value="cha" type="number" class="col-3 form-control"> 
				<input name="age" placeholder="Agilité" value="age" type="number" class="col-3 form-control"> 
				<input name="sa" placeholder="Sagesse" value="sa" type="number" class="col-3 form-control"> 
				<input name="pa" placeholder="PA" value="pa" type="number" class="col-3 form-control"> 
				<input name="pm" placeholder="PM" value="pm" type="number" class="col-3 form-control"> 
				<input name="invo" placeholder="Invocation" value="invo" type="number" class="col-3 form-control"> 
				<input name="do" placeholder="Dommages" value="do" type="number" class="col-3 form-control"> 
				<input name="do_feu" placeholder="Dmg Feu" value="do_feu" type="number" class="col-3 form-control"> 
				<input name="do_air" placeholder="Dmg Air" value="do_air" type="number" class="col-3 form-control">
				<input name="do_fo" placeholder="Dmg Terre" value="do_fo" type="number" class="col-3 form-control"> 
				<input name="do_cha" placeholder="Dmg Chance" value="do_cha" type="number" class="col-3 form-control">
				<input name="do_neu" placeholder="Dmg Neutre" value="do_neu" type="number" class="col-3 form-control">
				<input name="do_sort" placeholder="% Dmg Sorts" value="do_sort" type="number" class="col-3 form-control"> 
				<input name="do_arme" placeholder="% Dmg Armes" value="do_arme" type="number" class="col-3 form-control"> 
				<input name="do_mel" placeholder="% Dmg Mélée" value="do_mel" type="number" class="col-3 form-control"> 
				<input name="do_dis" placeholder="% Dmg Distance" value="do_dis" type="number" class="col-3 form-control"> 
				<input name="so" placeholder="Soin" value="so" type="number" class="col-3 form-control"> 
				<input name="pp" placeholder="Prospection" value="pp" type="number" class="col-3 form-control">
				<input name="ini" placeholder="Initiative" value="ini" type="number" class="col-3 form-control">
				<input name="pods" placeholder="Pods" value="pods" type="number" class="col-3 form-control">
				<input name="tac" placeholder="Tacle" value="tac" type="number" class="col-3 form-control">
				<input name="fui" placeholder="Fuite" value="fui" type="number" class="col-3 form-control">
				<input name="ret_pa" placeholder="Ret. PA" value="ret_pa" type="number" class="col-3 form-control">
				<input name="ret_pm" placeholder="Ret. PM" value="ret_pm" type="number" class="col-3 form-control">
				<input name="esq_pa" placeholder="Esq. PA" value="esq_pa" type="number" class="col-3 form-control">
				<input name="esq_pm" placeholder="Esq. PM" value="esq_pm" type="number" class="col-3 form-control">
				<input name="do_cri" placeholder="Dmg Critique" value="do_cri" type="number" class="col-3 form-control">
				<input name="do_pou" placeholder="Dmg Poussée" value="do_pou" type="number" class="col-3 form-control">
				<input name="res_cri" placeholder="Rés Critique" value="res_cri" type="number" class="col-3 form-control">
				<input name="res_pou" placeholder="Rés Poussée" value="res_pou" type="number" class="col-3 form-control">
				<input name="pc_neu" placeholder="% Rés. Neutre" value="pc_neu" type="number" class="col-3 form-control">
				<input name="pc_fo" placeholder="% Rés. Terre" value="pc_fo" type="number" class="col-3 form-control">
				<input name="pc_ine" placeholder="% Rés. Feu" value="pc_ine" type="number" class="col-3 form-control">
				<input name="pc_cha" placeholder="% Rés. Eau" value="pc_cha" type="number" class="col-3 form-control">
				<input name="pc_air" placeholder="% Rés. Air" value="pc_air" type="number" class="col-3 form-control">
				<input name="res_neu" placeholder="Rés. Neutre" value="res_neu" type="number" class="col-3 form-control">
				<input name="res_fo" placeholder="Rés. Terre" value="res_fo" type="number" class="col-3 form-control">
				<input name="res_ine" placeholder="Rés. Feu" value="res_ine" type="number" class="col-3 form-control">
				<input name="res_eau" placeholder="Rés. Eau" value="res_eau" type="number" class="col-3 form-control">
				<input name="res_air" placeholder="Rés. Air" value="res_air" type="number" class="col-3 form-control">
				<input name="pc_sort" placeholder="% Rés Sorts" value="pc_sort" type="number" class="col-3 form-control">
				<input name="pc_arme" placeholder="% Rés Armes" value="pc_arme" type="number" class="col-3 form-control">
				<input name="pc_melee" placeholder="% Rés Mélée" value="pc_melee" type="number" class="col-3 form-control">
				<input name="pc_dist" placeholder="% Rés Distance" value="pc_dist" type="number" class="col-3 form-control">
				<input name="renvoie" placeholder="Renvoi Dmg" value="renvoie" type="number" class="col-3 form-control">
				<input name="crit" placeholder="Critique" value="crit" type="number" class="col-3 form-control">
			</div>
		</div>
	</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				<input type="submit" class="btn btn-primary" name=="Add_Auct" value="Mettre en vente">
			</div>

		</form>
    </div>
  </div>
</div>

</div>
</div>
</div>
