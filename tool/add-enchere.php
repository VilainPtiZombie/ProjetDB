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
			      <select name="Auct_Add_Equip" class="selectpicker form-control" id="serveur" data-live-search="true" data-title="Item à vendre" data-style="text" data-size="10" >
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
				      	<select name="Auct_Serv" class="form-control">
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
					  	<input name="Auct_transfert" type="checkbox" class="custom-control-input" id="customCheck1" data-toggle="popover" data-trigger="focus" title="Informations" data-content="Prix minimum désiré en kamas">
					 	<label class="custom-control-label" for="customCheck1">Transfert inclus ?</label>
					</div>
				    <div class="col-4">
					<select type="radio" name="auct_fm" class="form-control" placeholder="FM/Exo ?">
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

			    	<input name="Auct_prix_start" type="text" class="col-6 form-control" placeholder="Prix de départ*" data-toggle="popover" data-trigger="focus" title="Informations" data-placement="left" data-content="Prix de départ de l'enchères en kamas">
			    	<input name="Auct_prix_sell" type="text" class="col-6 form-control" placeholder="Prix de cession" data-toggle="popover" data-trigger="focus" title="Informations" data-content="Prix minimum désiré en kamas">
			    </div>		    
			
		    </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				<input type="submit" class="btn btn-primary" value="Mettre en vente">
			</div>
		</form>
    </div>
  </div>
</div>

</div>
</div>
</div>
