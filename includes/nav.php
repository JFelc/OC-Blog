<nav class="navbar navbar-expand-lg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link"href="<?php echo $this->rewritebase; ?>">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->rewritebase; ?>login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $this->rewritebase; ?>posts">Posts</a>
      </li>
      <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1){ ?>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo $this->rewritebase; ?>admin">Admin</a>
      </li>
      <?php } ?>
    <li class="nav-item">
      <a href="<?php echo $this->rewritebase; ?>profile" class="nav-link d-flex"><i class="fas h2 mb-0 fa-user-circle"></i><span class="ps-2 nameUser">
    <?php
    if(isset($_SESSION['name'])){
      echo "Bonjour ".$_SESSION['name'];
    } ?>
    </span>
    </a>

    </li>
    </ul>
  </div>
</nav>
