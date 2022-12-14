<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ajout de trajet Depart</title>
    <script>
            /* Cette fonction permet d'afficher une vignette pour chaque image sélectionnée */
            function readFilesAndDisplayPreview(files) {
                let imageList = document.querySelector('#list'); 
                imageList.innerHTML = "";
                
                for ( let file of files ) {
                    let reader = new FileReader();
                    
                    reader.addEventListener( "load", function( event ) {
                        let span = document.createElement('span');
                        span.innerHTML = '<img height="60" src="' + event.target.result + '" />';
                        imageList.appendChild( span );
                    });

                    reader.readAsDataURL( file );
                }
            }
        </script>
  </head>
  <body> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">ADMIN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>loginAdmin/logout">deconnexion <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>article">Acceuil</a>
          </li>
          <li class="nav-item">
            <a style="display: none;" class="nav-link" href="liste_achat.php">Liste des Membre</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Crud
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url() ?>backOffice/add">Inserer un article </a>
              <a class="dropdown-item" href="<?= base_url() ?>backOffice/findAllContenue">lister les articles </a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="recherche" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">recherce</button>
        </form>
      </div>
    </nav>
    <div class="container" >
      <div class="row">
        <div id="block1" class="col-md-12">
          <h2 class="h2">Ajout De trajet Depart</h2>
          <form action="<?= base_url() ?>ajoutTrajet/add" method="post">

              <label for="cars">Voiture:</label>

              <select name="idVoiture" id="cars" class="form-control form-control-lg">
              
                  <?php 
                      foreach ($listVoiture->result() as $row)
                    {
                            echo 
                            '
                                <option value="'.$row->id.'">'.$row->marque.' '.$row->numero.'</option>
                            ';
                    }
                   ?>
              </select>
               <p>DateDepart : 
                  <input class="form-control form-control-lg" type="date" name="dateDepart" required>
              </p>

               <p>LieuArrive : 
                  <input class="form-control form-control-lg" type="text" name="lieuArrive"
                  required>
              </p>

               <p>Motif : 
                  <input class="form-control form-control-lg" type="text" name="motif" required>
              </p>
               <p>LieuDepart : 
                  <input class="form-control form-control-lg" type="text" name="lieuDepart" required>
              </p>
               <p>kilometrageDepart : 
                  <input class="form-control form-control-lg" type="number" name="kilometrageDepart" required>
              </p>

              <p>HeureDepart : 
                  <input class="form-control form-control-lg" type="number" name="heureDepart" required>
              </p>

              <?php 
                  echo '<label class="text-danger">'.$this->session->flashdata
                  ("ErrKilometrage").'</label>'
               ?>
               <?php 
                  echo '<label class="text-danger">'.$this->session->flashdata
                  ("success_msg").'</label>'
               ?>
                 <div class="form-group">
            <div class="row">
               <div class="col-md-4">
                   <div class="form-group">
                        <input type="submit" class ="btn btn-success" name="ok" value="Upload"  accept="image/*" onchange="readFilesAndDisplayPreview(this.files);" />
                   </div>
               </div> 
            </div>
        </div>
          </form>
        </div>
        <div id="block2" class="col-md-6" style="border:1px solid black; display:none;">
          <h2>Suprimer des produits</h2>
            <form action="supr_categorie.php" method="post">
              <p>
                Choisir le categorie : 
                 <SELECT name="categorie" size="1">

                  </SELECT>
              </p>
              <p><input type="submit" name="envoyer"></p>
            </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
