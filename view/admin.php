<main>
<?php if (isset($url[3]) && $url[3] == 'posts'){ ?>
  <div class="container">
  <form method="POST">
  <div class="row">
        <span class="h5 font-weight-bold"> Posts en attente de review </span>
        <?php foreach ($allPosts as $key => $value) { ?>
          <div class="col-4">
          <a href="<?php echo $this->rewritebase . 'post/' . $allPosts[$key]['idPost']; ?>"><p><?php echo $allPosts[$key]['titre']?></p></a>
          <button type="submit" class="btn btn-primary" name="updateStatusPostAdmin" value="<?php echo $allPosts[$key]['idPost']?>"> Update </button>
        </div>
        <?php } ?>
      </div>
  </form>
  </div>
<?php } else if (isset($url[3]) && $url[3] == 'comms'){ ?>
  <div class="container">
  <form method="POST">
  <div class="row">
        <span class="h5 font-weight-bold"> Posts en attente de review </span>
        <?php foreach ($allComms as $key => $value) { ?>
          <div class="col-4">
          <a href="<?php echo $this->rewritebase . 'post/' . $allComms[$key]['Post_idPost']; ?>"><p><?php echo $allComms[$key]['nom']?></p></a>
          <button type="submit" class="btn btn-primary" name="updateStatusCommAdmin" value="<?php echo $allComms[$key]['idCommentaire']?>"> Update </button>
        </div>
        <?php } ?>
      </div>
  </form>
  </div> 
  <?php } else { ?>
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
        <div class="col-4 mt-3 pt-4">
          <a class="btn btn-primary" href="<?= $this->rewritebase . 'admin/posts'; ?>">Voir plus</a>
        </div>
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
    <div class="col-2">
  <label for="categoryInput">Créer une catégorie de Post</label>
  <input type="text" required class="form-control mb-2" name="categoryInput">
  <button type="submit" class="btn btn-primary mb-2" name="categoryCreate"> Créer une catégorie </button>
  </div>
  <ul> Catégories déjà existantes : 
  <?php foreach ($category as $key => $value) { ?>
    <li> <?php echo $category[$key]['nom']; ?> </li>
  <?php } ?>  
  </ul>
  </div>
</form>
</div>
 <?php } ?>

</main>