<?php require('../includes/header.php');?>

<section class="search row align-items-center">
	<div class="container">
		<form action="#" method="GET" class="col-12 form-row">
			<div class="input-group col-5">
            	<select name="SearchAuctEquip" class="selectpicker form-control" id="serveur" data-live-search="true" data-title="Séléctionne ton/tes Item(s) souhaité(s)" data-style="text" data-size="10">
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
	            <select name="SearchInsServ" class="selectpicker form-control" id="serveur" data-live-search="true" data-title="Serveurs" data-style="text" data-size="10">
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
				<input type="number" class="form-control" placeholder="Prix Maximum" name="PrixMaxSearch">
			</div>
			<div class="col-2">
				<select type="radio" class="form-control" name="SearchFm" placeholder="FM/Exo ?">
					<option selected value="">FM/Exo ?</option>
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
			</div>
			<div class="col-1">
				<input type="submit" class="btn btn-info" name="SubSearch" placeholder="hello there">
			</div>
		</form>
	</div>
</section>
<section class="align-items-center">
	<div class="add-enchere">
	<button class="btn-add-enchere" data-toggle="modal" data-target="#add_enchere">
          <i class="lni-plus"></i>
	</button>
</div>
<?php
var_dump($_SESSION);
include('../script/list_auct.php');

include('../tool/add-enchere.php');
?>
</section>




<?php 


include('../includes/footer.php');?>