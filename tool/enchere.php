<?php require('../includes/header.php');?>

<section class="search row align-items-center">
	<div class="container">
		<form action="" class="col-12 form-row">
			<div class="input-group col-5">
	              <select name="AuctEquip[]" class="selectpicker form-control" id="serveur" data-live-search="true" multiple data-title="Séléctionne ton/tes Item(s) souhaité(s)" data-style="text" data-size="10">
							      	<?php
							      	require ('../script/bdd.php');
										$sql = "SELECT id, equip_name FROM list_equipement";
										$req = $bdd->query($sql);
										

										    // output data of each row
										while($row = $req->fetch()) {
										        echo ("<option value='".$row['id']."'>".$row['equip_name']." </option>");
										    }
$req->closeCursor();
										
									?>	
									</select>
	            </div>
				<div class="col-2 input-group">
	              <select name="InsServ[]" class="selectpicker form-control" id="serveur" data-live-search="true" multiple data-title="Serveurs" data-style="text" data-size="10">
							      	<?php
							      	require ('../script/bdd.php');
										$sql2 = "SELECT id, nom_serv FROM serveurs";
										$reqs = $bdd->query($sql2);
										

										    // output data of each row
										while($rows = $reqs->fetch()) {
										        echo ("<option value='".$rows['id']."'>".$rows['nom_serv']." </option>");
										    }
										    $reqs->closeCursor();
									?>	
									</select>
	            </div>
			<div class="col-2">
				<input type="text" class="form-control" placeholder="hello there">
			</div>
			<div class="col-2">
				<select type="radio" class="form-control" placeholder="FM/Exo ?">
					<option selected>FM/Exo ?</option>
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
			</div>
			<div class="col-1">
				<input type="submit" class="btn btn-info" placeholder="hello there">
			</div>
		</form>
	</div>
</section>

<div class="add-enchere">
	<button class="btn-add-enchere" data-toggle="modal" data-target="#add_enchere">
          <i class="lni-plus"></i>
	</button>
</div>


<?php 
include('../script/list_auct.php');

include('../tool/add-enchere.php');

require('../includes/footer.php');?>