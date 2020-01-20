<?php require('../includes/header.php');?>
<?php


?>
<section class="row align-items-center f-row input_pepitator">
	<div class="container">
		<form action="../script/traitement.php" method="POST" class="pepitator row">
			<div class="col-6">
				<input type="number" name="pepite-p-ress" class="form-control" placeholder="Prix de le Ressource (K/u)">
			</div>
			<div class="col-6">
				<input type="number" name="pepite-p-pep" class="form-control" placeholder="Prix de la Pépite (K/u)">
			</div>
			<div class="w-100"></div>
			<div class="col-6">
				<input type="number" name="pepite-n-pep" class="form-control" placeholder="Nombre de pépite Recyclé">
			</div>
			<div class="col-6">
				<input type="number" name="pepite-n-ress" class="form-control" placeholder="Nombre de ressource à Recyclé">
			</div>
			<div class="col-12">
				<input type="submit" value="envoyer" name="calcul" class="col-12 btn btn-info">
			</div>
		</form>
	</div>
</section>
<section class="result f-row">
	<div class="container">
		<?php echo $presult ?>
	</div>
</section>


<?php include('../includes/footer.php');?>