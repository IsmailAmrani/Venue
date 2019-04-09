<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signin.css">

    <title>Venue -- Se Connecter</title>
  </head>
  <body>
      
      <form id="Form_login" class="form-signin" method="POST">
          
          <?php if($Message != ''){ ?>
          <div class="alert alert-danger text-center" role="alert">
            <?php echo $Message ?>
          </div>
          <?php } ?>
          
        <input name="mode" type="hidden" value="login"></input>
        <h1 class="h3 mb-3 font-weight-normal text-center">Connectez à votre compte</h1>
        
        <label for="inputEmail" class="sr-only">Adresse Email</label>
        <input name="email" type="email" id="inputEmail" class="form-control mb-2" placeholder="Adresse Email" required autofocus>
        
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
        
        <div class="checkbox mb-3 text-center">
          <label>
            <input type="checkbox" value="remember-me"> Se Souvenir de moi
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se Connecter</button>
        <p class="mt-3" style="cursor: pointer ;text-align: center; font-weight: bold" onclick="ChangeMode('register')">Créer un nouveau compte</p>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
      </form>
      
      <form id="Form_register" class="form-signin d-none" method="POST">
        <input name="mode" type="hidden" value="register"></input>
        <h1 class="h3 mb-3 font-weight-normal text-center">Créer un nouveau compte</h1>
        
        <label for="nom" class="sr-only">Votre Nom</label>
        <input name="nom" type="nom" id="nom" class="form-control mb-2" placeholder="Nom" required autofocus>
        
        <label for="prenom" class="sr-only">Votre Prénom</label>
        <input name="prenom" type="prenom" id="prenom" class="form-control mb-2" placeholder="Prénom" required autofocus>
        
        <label for="inputEmail" class="sr-only">Adresse Email</label>
        <input name="email" type="email" id="inputEmail" class="form-control mb-2" placeholder="Adresse Email" required autofocus>
        
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">S'enregistrer</button>
        <p class="mt-3" style="cursor: pointer; text-align: center; font-weight: bold" onclick="ChangeMode('login')">Se connecter</p>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
      </form>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript/script.js"></script>
  </body>
</html>