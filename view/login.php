<!DOCTYPE html>
<html lang="fr">
  <body class="text-center">

<?php if (isset($url[3]) && $url[3] == 'create'){ ?>
<main class="align-middle form-signin">
  <form method="POST">
    <h1 class="h3 mb-3 fw-normal">Inscription</h1>

    <div class="form-floating">
      <input type="text" name="name" class="form-control" id="floatingName" placeholder="name">
      <label for="floatingName">Nom</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" name="passwd" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="subscribe" type="submit">S'inscrire</button>
  </form>
</main>
<?php } else { ?>

<main class="align-middle form-signin">
  <form method="POST">
    <h1 class="h3 mb-3 fw-normal">Connexion</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" name="passwd" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Se connecter</button>
  </form>
  <div>
  <span>Pas encore inscrit?</span>
  <a class="btn btn-lg btn-primary" href="<?= $this->rewritebase.'login/create';?>">Créer votre compte</a>
  </div>
</main>
<?php } ?>

</body></html>