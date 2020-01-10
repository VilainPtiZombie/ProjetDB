<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css" rel="stylesheet">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<section class="container">
	<div class="row">
		<span class="col-8">

		<!-- Form inscription -->
			<form class="needs-validation" novalidate method="POST" action="script/traitement.php">
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label for="validationTooltip01">Pseudo</label>
			      <input type="text" class="form-control" id="validationTooltip01" Placeholder="Votre Pseudo" required>
			      <div class="valid-tooltip">
			        Looks good!
			      </div>
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="validationTooltip02">Email</label>
			      <input type="mail" class="form-control" id="validationTooltip02" Placeholder="Votre Mail" required>
			      <div class="valid-tooltip">
			        Looks good!
			      </div>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-md-6 mb-3">
			      <label for="validationTooltip03">Mot de passe</label>
			      <input type="password" class="form-control" id="validationTooltip03" required>
			      <div class="invalid-tooltip">
			      Mot de passe non valide
			      </div>
			    </div>
			    <div class="col-md-6 mb-3">
			      <label for="validationTooltip04">Validation</label>
			      <input type="password" class="form-control" id="validationTooltip03" required>
			      <div class="invalid-tooltip">
			      Mot de passe non correspondant
			      </div>
			    </div>
			    <div class="col-md-12 mb-3">
			      <label for="validationTooltip04">Serveurs</label>
			      	 <select class="selectpicker form-control mt-4" data-live-search="true" multiple data-header="Séléctionne ton/tes Serveur(s)" data-style="form-control">
			      	 <?php
			      	 require ('script/bdd.php');
						$sql = "SELECT id, nom_serv FROM serveurs";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        echo ("<option value='".$row['id']."'>".$row['nom_serv']." </option>");
						    }
						} else {
						    echo "0 results";
						}
						$conn->close();
					?>	
					</select>
			    </div>
			  </div>
			  <button class="btn btn-primary" type="submit">S'inscrire</button>
			</form>
			<!-- fin form inscription -->
		</span>
	</div>	
</section>


<footer>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
</footer>
</body>
</html>