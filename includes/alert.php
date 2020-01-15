<section id="alert-php" class="container">
	<?php

	//Pour le Formulaire ajout d'article
	//on initialise les variables d'erreurs et de retour


	 if (isset($_GET['loginSuccess'])) {
		echo '<span id="display_alert" class="row justify-content-center alert alert-success alert-dismissible fade show" role="alert">
			  Connexion Réussie
			  <button type="submit" name="close_m_success" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</span>';

	}
	 if (isset($_GET['err_message'])) {
		echo '<span id="display_alert" class="row justify-content-center alert alert-danger alert-dismissible fade show" role="alert">
			  '.$_GET['err_message'].'
			  <button type="submit" name="close_m_success" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</span>';

	}
?>
</section>