<?php 
include "includes/config.php";
session_start();

    if (isset($_SESSION["user_email"])){
        header("Location: todos.php");
        die();
    }
?>
<!doctype html>
<html lang="fr">
  <head>
    <?php getHead(); ?> 
    
  </head>
  <body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
      <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <h1 class="display-4 fw-bold lh-1 mb-3">Inscrivez-vous pour enregistrer vos todo</h1>
          <p class="col-lg-10 fs-4">Creer gratuitement votre compte MYTOTOOL.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <form action="login.php" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
            <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Continuez</button>
            <hr class="my-4">
            <small class="text-muted">En cliquant sur S'inscrire, vous acceptez les conditions d'utilisation..</small>
          </form>
        </div>
      </div>
    </div>
    
    

    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
