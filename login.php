<?php require('includes/header.php'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 form-wrap">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active btn-tabs"><a class="active"  href="#login" aria-controls="login" role="tab" data-toggle="tab">Connexion</a></li>
        <li role="presentation" class="btn-tabs"><a class=""  href="#register" aria-controls="register" role="tab" data-toggle="tab">Créer un Compte</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="login">
          <h3>Connexion à votre Compte</h3>
          <hr>
          <form role="form" method="post" action="script/traitement.php">
            <label class="sr-only" for="user">Utilisateur</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="ConUser" class="form-control" id="user" placeholder="Utilisateur" data-original-title="" title="">
            </div>
            <br>
            <label class="sr-only" for="inputPassword">Mot de passe</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" name="ConPassword" class="form-control" id="inputPassword" placeholder="Mot de passe">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> 
                Se souvenir de moi
              </label>
            </div>
            <button type="submit" name="submitConn" class="btn btn-primary pull-right">Envoyer</button>

          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="register">
          <h3>Créer un nouveau Compte</h3>
          <hr>
          <form role="form" method="post" action="script/traitement.php">
            <label class="sr-only" for="user">Nom d'utilisateur</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input name="InsUser" type="text" class="form-control" id="user" placeholder="Nom d'utilisateur" data-original-title="" title="">
            </div>
            <br>
            <label class="sr-only" for="email">Adresse Mail</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input name="InsEmail" type="email" class="form-control" id="email" placeholder="Adresse Mail" data-original-title="" title="">
            </div>
            <br>
            <label class="sr-only" for="inputPassword">Mot de passe</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input name="InsPassword" type="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <br>
            <label class="sr-only" for="inputPassword">Confirmation</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input name="InsPasswordV" type="password" class="form-control" id="verification" placeholder="Confirmer le Mot de passe">
            </div>
            <br>
            <label class="sr-only" for="inputPassword">Confirmation</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <select name="InsServ[]" class="selectpicker form-control" id="serveur" data-live-search="true" multiple data-title="Séléctionne ton/tes Serveur(s)" data-style="text" data-size="10">
						      	<?php
						      	require ('script/bdd.php');
									$sql = "SELECT id, nom_serv FROM serveurs";
									$req = $bdd->query($sql);
									

									    // output data of each row
									while($row = $req->fetch()) {
									        echo ("<option value='".$row['id']."'>".$row['nom_serv']." </option>");
									    }

									
								?>	
								</select>
            </div>
            <br>
            <button type="submit" name="submitInsc" class="btn btn-primary">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require('includes/footer.php'); ?>