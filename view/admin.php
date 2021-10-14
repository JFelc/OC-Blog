<main>

<div class="container">
<form method="POST">
      <div class="row">
        <span class="h5 font-weight-bold"> Posts en attente de review </span>
        <?php foreach ($postsAdmin as $key => $value) { ?>
          <div class="col-4">
          <a href="<?php echo $this->rewritebase . 'post/' . $postsAdmin[$key]['idPost']; ?>"><p><?php echo $postsAdmin[$key]['titre']?></p></a>
          <button type="submit" class="btn btn-primary" name="updateStatusPost" value="<?php echo $postsAdmin[$key]['idPost']?>"> Update </button>
        </div>
        <?php } ?>
      </div>
</form>

<form method="POST">
      <div class="row">
        <span class="h5 font-weight-bold"> Commentaires en attente de review </span>
        <?php foreach ($commsAdmin as $key => $value) { ?>
          <div class="col-4">
          <a href="<?php echo $this->rewritebase . 'post/' . $commsAdmin[$key]['Post_idPost']; ?>"><p><?php echo $commsAdmin[$key]['nom']?></p></a>
          <button type="submit" class="btn btn-primary" name="updateStatusComm" value="<?php echo $commsAdmin[$key]['idCommentaire']?>"> Update </button>
        </div>
        <?php } ?>
      </div>
</form>

<form method="POST">
  <div class="row">
  <label for="categoryInput">Créer une catégorie de Post</label>
  <input type="text" required class="form-control" name="categoryInput">
  <button type="submit" class="btn btn-primary" name="categoryCreate"> Créer une catégorie </button>
  </div>
  <ul> Catégories déjà existantes : 
  <?php foreach ($category as $key => $value) { ?>
    <li> <?php echo $category[$key]['nom']; ?> </li>
  <?php } ?>  
  </ul>
</form>
</div>
 

</main>