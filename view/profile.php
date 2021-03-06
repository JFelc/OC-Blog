<main class="align-middle form-signin">
<?php if (isset($url[3]) && $url[3] == 'changePassword') { ?>
<form method="POST" enctype="multipart/form-data">
    <h1 class="h3 mb-3 fw-normal">Inscription</h1>
   
    <div class="form-floating">
      <input type="password" name="oldPasswd" class="form-control" id="oldPassword" placeholder="Password">
      <label for="oldPassword">Current Password</label>
    </div>

    <div class="form-floating">
      <input type="password" name="newPasswd" class="form-control" id="newPassword" placeholder="Password">
      <label for="newPassword">New Password</label>
    </div>

    <div class="form-floating">
      <input type="password" name="confirmPasswd" class="form-control" id="confirmPassword" placeholder="Password">
      <label for="confirmPassword">Confirm Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="updatePasswd" type="submit">Mettre à jour</button>
  </form>
  <?php } else { ?>
  <form method="POST" enctype="multipart/form-data">
  <div class="mx-auto">
  <img class="img-fluid w-100" src="<?= $this->rewritebase . $res[0]['photo']; ?>">
    <h1 class="h3 mb-3 fw-normal"><?= $res[0]['nom']?></h1>

    <div class="form-floating mb-4">
      <a  href="<?php $this->rewritebase ?>profile/changePassword" name="passwd" class="btn btn-outline-primary" id="floatingPassword" placeholder="Password">Changer le mot de passe</a>
    </div>
    <div class="form-floating mb-4">
          <input type="file" id="image" name="image" accept="image/*">
    </div>

    <button class="w-100 btn btn-lg btn-primary mb-4" name="updateProfile" type="submit">Mettre à jour </button>
    </div>
  </form>
  <a class="w-100 btn btn-lg btn-primary" name="disconnect" href="<?= $this->rewritebase; ?>logout">Déconnexion</a>
  <?php } ?>
</main>