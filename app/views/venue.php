<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/message.css">
    
    <title>Venue -- Accueil</title>
  </head>
  <body>
      
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">VENUE</h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="#">BONJOUR <b><?php echo $user['nom'] . " " .$user['prenom'] ?></b></a>
        </nav>
        <a class="btn btn-outline-primary" href="logout.php">Se Déconnecter</a>
    </div>
      
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h4 class="display-4">LISTE DES LIEUX</h4>
    </div>
      
    <div class="container">
        <div class="row">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#venueModal">Ajouter un nouveau lieu</button>
            
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lieu</th>
                    <th scope="col">Événements</th>
                    <th scope="col">Ajouté Par</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($venues as $venue){ ?>
                        <tr>
                            <th scope="row"><?php echo $venue['id'] ?></th>
                            <td><?php echo $venue['Nom'] ?></td>
                            <td>
                                <?php foreach ($venue['events'] as $event){ ?>
                                    <p class="mb-0"><b>- <?php echo $event['Nom'] ?></b></p>
                                <?php } ?>
                            </td>
                            <td><?php echo $venue['AjoutePar'] ?></td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#eventModal" onclick="SetCurrentVenue(<?php echo $venue['id'] ?>)">Nouveau événement</button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="SetCurrentVenue(<?php echo $venue['id'] ?>)">Supprimer</button>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
            
        </div>
        
    </div>
      
      <!-- New Venue Modal -->
        <div class="modal fade" id="venueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau Lieu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="venueName">Nom du lieu</label>
                    <input type="text" class="form-control" id="venueName" placeholder="Entrez Nom de lieu">
                  </div>
                  
                  <div class="alert alert-danger d-none" id="venueAlert" role="alert"></div>
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" onclick="NewVenue()">Ajouter</button>
              </div>
            </div>
          </div>
        </div>
      
      <!-- New Venue Event -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau événement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="eventName">Nom de l'événement</label>
                    <input type="text" class="form-control" id="eventName" placeholder="Entrez Nom de l'événement">
                  </div>
                  
                  <div class="alert alert-danger d-none" id="eventAlert" role="alert"></div>
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-info" onclick="NewEvent()">Ajouter</button>
              </div>
            </div>
          </div>
        </div>
      
      <!-- delete Venue -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer un lieu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <p>Voullez vous vraiment supprimer ce lieu ?</p>
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger" onclick="DeleteVenue()">Supprimer</button>
              </div>
            </div>
          </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../web/javascript/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript/script.js"></script>
  </body>
</html>