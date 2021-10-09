<div class="container">
<?php if (isset($url[4]) && $url[4] == 'edit'){ ?>
  <div class="container">
      <div class="row">
      <form class="col-9 mx-auto" enctype="multipart/form-data" method="POST">
        <h1 class="h3 mb-3 fw-normal">Édition du Post</h1>
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
        <div class="form-floating py-3">
          <input type="file" id="image" name="image" accept="image/*">
        </div>

        <button class="w-100 btn btn-lg btn-primary" name="editPost" type="submit">Éditer le post </button>

      </form>
  </div>
  </div>
<?php } else { ?>
  <!-- Page Heading/Breadcrumbs -->
  <?php if ($res[0]['status'] != 0 || $_SESSION['role'] == 1) { ?>
    <?php if($res[0]['Utilisateur_idUtilisateur'] == $_SESSION['connectedUser']){ ?>
        <a href="<?php echo $this->rewritebase?>post/<?php echo $res[0]['idPost']?>/edit">Submit</a>
    <?php } ?>
  <h1 class="mt-4 mb-3"><?php echo $res[0]['titre'] ?>
  </h1>

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-12">

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="<?php echo $this->rewritebase . $res[0]['photo'] ?>" alt="">

      <hr>

      <!-- Date/Time -->
      <p>Posté le <?php echo date('d/m/Y à h\hi',strtotime($res[0]['date'])) ?> </p>

      <hr>

      <!-- Post Content -->

      <p><?php echo $res[0]['contenu'] ?> </p>

      <?php if (isset($_SESSION['connectedUser']) && ($_SESSION['connectedUser'] != null)) { ?>
        <form method="POST">
          <div class="mb-3">
            <label for="commentText" class="form-label">Commentaire</label>
            <textarea class="form-control" id="commentText" name="commentValue" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="addComment">Submit</button>
        </form>
      <?php } ?>
    
        <section>
       
          <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
            
              <div class="col-md-12 col-lg-10">
                <div class="card text-dark">
                <h4 class="mb-0 mb-4 pb-2 ps-3">Commentaires</h4>
                <?php foreach ($commValue as $key => $value) { ?>
                  <div class="card-body p-4">
                    
                    
                    <div class="d-flex flex-start">
                      <?php if (isset($commValue[$key]['photo'])){ ?>
                        <img class="rounded-circle shadow-1-strong me-3" src="<?php echo $this->rewritebase . $commValue[$key]['photo'] ?>" alt="avatar" width="60" height="60" />
                      <?php  } ?>
                 
                      <div>
                        <h6 class="fw-bold mb-1"><?php echo $commValue[$key]['nom'] ?></h6>
                        <div class="d-flex align-items-center mb-3">
                          <p class="mb-0">
                            <?php echo date('d/m/Y à h\hi',strtotime($commValue[$key]['date'])) ?>
                          </p>
                        </div>
                        <p class="mb-0">
                         <?php echo $commValue[$key]['contenu'] ?>
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            
            </div>
          </div>
        </section>
     

      <!-- Comments Form -->

    </div>

    <!-- Sidebar Widgets Column -->

  </div>
  <?php } ?>
  <!-- /.row -->
<?php } ?>
</div>