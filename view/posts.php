<!DOCTYPE html>
<html lang="fr">

<body class="text-center">

  <?php if (isset($url[3]) && $url[3] == 'create') { ?>
    <div class="container">
      <div class="row">
      <form class="col-9 mx-auto" enctype="multipart/form-data" method="POST">
        <h1 class="h3 mb-3 fw-normal">Création du Post</h1>
        <?php if(isset($error)&&($error != '')){ ?>
                <p class="text-danger h4"><?= $error ?></p>
      <?php  } ?>
      <div class="row">
        <div class="form-group col py-3">
          <input type="text" name="title" class="form-control" id="floatingTitle" placeholder="Titre" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
        </div>
        <div class="form-group col py-3">
          <input type="text" name="name" class="form-control" id="floatingAuthor" placeholder="Auteur" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
        </div>
        </div>
        <div class="form-group py-3">
          <textarea type="text" name="content" class="form-control" id="floatingContent" rows="5" placeholder="Contenu"></textarea>
        </div>
        <div class="form-group py-3">
          <textarea type="text" name="description" class="form-control" rows="5" id="floatingDesc" placeholder="Description"></textarea>
        </div>
        <div class="form-group py-3">
          <select class="form-select" name="category">
            <?php foreach($categories as $key => $value) { ?>
              <option value="<?= $categories[$key]['idCategorie']?>">
              <?= $categories[$key]['nom']?>
            </option>
            <?php } ?>

          </select>
        </div>
        <div class="form-floating py-3">
          <input type="file" id="image" name="image" accept="image/*">
        </div>

        <button class="w-100 btn btn-lg btn-primary" name="postCreate" type="submit">Créer le post </button>

      </form>
  </div>
  </div>
  <?php } else { ?>
    
    <main class="container py-5">


      <div class="row" data-masonry='{"percentPosition":true }'>
        <?php foreach ($res as $key => $value) { ?>
            <div class="col-md-4 mb-4 col-sm-12">
            <a href="<?= $this->rewritebase . 'post/' . $res[$key]['idPost']; ?>">
              <div class="card">
                <?php if (isset($res[$key]['photo']) && $res[$key]['photo'] != null) { ?>
                  <img src="<?= $this->rewritebase . $res[$key]['photo']; ?>">
                  <h3><?= $res[$key]['auteur'] ?></h3>
                <?php } else { ?>
                  <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                  </svg>
                <?php } ?>
                <div class="card-body">
                  <h5 class="card-title"><?= $res[$key]['titre'] ?></h5>
                  <p class="card-text"><?= $res[$key]['description'] ?></p>
                </div>
              </div>
              </a>
            </div>
        <?php  } ?>
      </div>
      <?php if (isset($_SESSION['connectedUser'])) { ?>
      <a class="btn btn-primary" href="<?= $this->rewritebase; ?>posts/create">Créer un post</a>
    </main>
    <?php } ?> 
  <?php } ?>
</body>

</html>