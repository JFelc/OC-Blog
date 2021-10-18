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

    <button class="w-100 btn btn-lg btn-primary" name="updatePasswd" type="submit">Update</button>
  </form>
  <?php } else { ?>
  <form method="POST" enctype="multipart/form-data">
  <div class="mx-auto">
  <img class="img-fluid w-100" src="<?= $this->rewritebase . $res[0]['photo']; ?>">
    <h1 class="h3 mb-3 fw-normal"><?= $res[0]['nom']?></h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <a  href="<?php $this->rewritebase ?>profile/changePassword" name="passwd" class="btn btn-outline-primary" id="floatingPassword" placeholder="Password">Change password</a>
    </div>
    <div class="form-floating">
          <input type="file" id="image" name="image" accept="image/*">
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="updateProfile" type="submit">Update </button>
    </div>
  </form>
  <?php } ?>
</main>