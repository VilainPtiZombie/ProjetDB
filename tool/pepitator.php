<?php require('../includes/header.php');?>
<?php
if (isset($_POST['calcul']) && (!empty($_POST['pepite-p-ress'])) && (!empty($_POST['pepite-p-pep'])) && (!empty($_POST['pepite-n-pep'])) && (!empty($_POST['pepite-n-ress']))) {
	
	$ppress = $_POST['pepite-p-ress'];//prix de la ressource
	$pppep = $_POST['pepite-p-pep']; // prix de la pépite u
	$pnpep = $_POST['pepite-n-pep']; // taux de recyclage
	$qres = $_POST['pepite-n-ress']; //quantité de ressources
	

	$psomme = round(($ppress / $pnpep), 2);
	$psomRes = round(($ppress * $qres), 2);
	$nbrpepobtenu = round(($pnpep * $qres), 2);
	$psommePep = round(($nbrpepobtenu * $pppep), 2);
	$psommeBen = round((($pppep * $nbrpepobtenu) - ($ppress * $qres)), 2);


	if ($psomme > $pppep) {
		$presult =  ("
				<div class='card text-white bg-danger'>
				  <div class='card-header'>Ressource non rentable</div>
				  <div class='card-body'>
				    <p class='card-text'>Votre pépite coûtera ".$psomme."Kamas  par pépite. Vous depenseriez ".$psomRes."K au lieu de ".$psommePep."K pour obtenir ".$nbrpepobtenu." pépites</p>
				    <p class='card-text'>Votre bénefice sera donc de ".$psommeBen."Kamas pour l'achat de ".$qres." ressources </p>
				  </div>
				</div>
			");
	}else{
		$presult =  ("
				<div class='card text-white bg-success'>
				  <div class='card-header'>Ressource rentable</div>
				   <div class='card-body'>
				    <p class='card-text'>Votre pépite coûtera ".$psomme."Kamas  par pépite. Vous depenseriez ".$psomRes."K au lieu de ".$psommePep."K pour obtenir ".$nbrpepobtenu." pépite</p>
				    <p class='card-text'>Votre bénefice sera donc de ".$psommeBen."Kamas pour l'achat de ".$qres." ressources </p>
				  </div>
				</div>
			");
	}
}


?>
<section class="row align-items-center f-row input_pepitator">
	<div class="container">
		<form action="#" method="POST" class="pepitator row">
			<div class="col-6">
				<input type="number" step=".01" name="pepite-p-ress" class="form-control" placeholder="Prix de le Ressource (K/u)">
			</div>
			<div class="col-6">
				<input type="number" step=".01" name="pepite-p-pep" class="form-control" placeholder="Prix de la Pépite (K/u)">
			</div>
			<div class="w-100"></div>
			<div class="col-6">
				<input type="number" step=".01" name="pepite-n-pep" class="form-control" placeholder="Nombre de pépite Recyclé">
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
		<?php
		if (!empty($presult)) {
			echo $presult;
		}
			
		 ?>
	</div>
</section>


<?php include('../includes/footer.php');?>