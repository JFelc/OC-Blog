<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Julien Feliciano</h1>
        <img class="col-6" src="<?= $this->rewritebase ?>uploads/image_prof.jpg">
        <p class="lead text-muted">Développeur Front-End Junior</p>
      </div>
    </div>
  </section>

 
<div class="container">
<div class="row">
  <?php foreach ($res as $key => $value) { ?>
      <div class="col-4 mb-4">
      <a href="<?= $this->rewritebase . 'post/' . $res[$key]['idPost']; ?>">
        <div class="card">
          <?php if (isset($res[$key]['photo']) && $res[$key]['photo'] != null) { ?>
            <img src="<?= $this->rewritebase . $res[$key]['photo']; ?>">
          <?php } else { ?>
            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>
          <?php } ?>
          <div class="card-body text-center">
            <h3><?= $res[$key]['auteur'] ?></h3>
            <h5 class="card-title"><?= $res[$key]['titre'] ?></h5>
            <p class="card-text"><?= $res[$key]['description'] ?></p>
          </div>
        </div>
        </a>
      </div>
  <?php  } ?>
</div>
</div>

  <div class="album py-5 bg-light">
    <div class="container">
      <form method="POST">
        <div class="form-group col-6 mx-auto">
          <div class="row">
            <div class="col-12 py-3">
              <input type="text" class="form-control" name="lName" placeholder="Nom">
            </div>
            <div class="col-12 py-3">
              <input type="text" class="form-control" name="fName" placeholder="Prénom">
            </div>
          </div>
        </div>
        <div class="form-group col-6 mx-auto py-3">
          <input type="email" class="form-control" name="contactMail" placeholder="Entrez l'adresse mail">
        </div>
        <div class="form-group col-6 mx-auto py-3">
          <textarea class="form-control" placeholder="Message" name="contactMessage"></textarea>
        </div>
        <div class=" form-group col-6 mx-auto">
          <div class="text-end">
            <button type="submit" class="btn btn-primary" name="contact">Submit</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col mx-auto text-center">
          <a href="https://us5.list-manage.com/contact-form?u=b7f00bd936c85c27f0d76f7d5&form_id=db2645b23e72b2031582df8483159e18">Me contacter</a>
        </div>
      </div>
      <?php if(isset($_SESSION['contact'])) { ?>
        <div class="row">
          <div class="col mx-auto text-center">
            <p>
              Votre message a bien été enregistré, voici son contenu: </p>
              <p><?= $lName.' '.$fName ?> </p>
              <p><?= $contactMail ?></p>
              <p><?= $message ?></p>
            </p>
          </div>
        </div>
        <?php } ?>
    </div>
  </div>


</main>