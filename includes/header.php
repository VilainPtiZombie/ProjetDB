  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <title></title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../css/styles.css">
      <link rel="stylesheet" type="text/css" href="../css/LineIcons.min.css">


      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
      <?php header('Content-Type:text/html;charset=utf-8'); ?>
  </head>
  <body>
  <?php
   if(!isset($_SESSION)) {
          session_start();
  }
  ?>
  <nav class="navbar f-top navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">D2ToolBox</a>




    <div class="col-8 justify-content-center navigation">	
        <ul class="row">
            <li class="dropdown">
                <a class="nav-link show-link col dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    				  Achat / Vente
    			</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="../tool/enchere.php" class="dropdown-item">Enchère</a></li>
                    <li><a href="" class="dropdown-item"></a></li>
                    <li><a href="" class="dropdown-item"></a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="nav-link show-link col dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Outils
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="../tool/enchere.php" class="dropdown-item">Pépitator</a></li>
                    <li><a href="" class="dropdown-item"></a></li>
                    <li><a href="" class="dropdown-item"></a></li>
                </ul>
            </li>
        </ul>
    </div>
  <?php 
          if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
      ?>
          <ul class="col-2 navbar-profil">
              <div class="col-12 dropdown-toggle">
                  <button class="btn btn-nav-profil dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                     <img class="" src="https://via.placeholder.com/38">
                      <div class="col-9"><?php echo $_SESSION['username']; ?></div>
                  </button>
                  <div class="col-12 dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <form method="post" action="../script/traitement.php">
                          <input class="dropdown-item" type="submit" name="logout" value="Se déconnecter" placeholder="Se déconnecter" />
                      </form>
                  </div>
              </div>


          </ul>

      <?php
  } else {
  ?>

    <form class="form-inline">
      <a class="btn btn-sm btn-success" href="../login.php" type="button">Connexion/Inscription</a>
    </form>

   <?php } ?>
  </nav>

  <?php 
  require('alert.php');
   ?>