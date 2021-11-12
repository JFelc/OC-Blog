<nav class="navbar navbar-expand-lg justify-content-end">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link"href="<?= $this->rewritebase; ?>">Accueil</a>
      </li>
      <?php if (!isset($_SESSION['connectedUser'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= $this->rewritebase; ?>login">Connexion</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= $this->rewritebase; ?>posts">Posts</a>
      </li>
      <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1){ ?>
      <li class="nav-item">
          <a class="nav-link" href="<?= $this->rewritebase; ?>admin">Admin</a>
      </li>
      <?php } ?>
    <?php
    if(isset($_SESSION['name']))
    { ?> 
    <li class="nav-item">
      <a href="<?= $this->rewritebase; ?>profile" class="nav-link justify-content-end d-flex"><i class="fas h2 mb-0 fa-user-circle"></i><span class="ps-2 nameUser">
      <?php 
      echo "Bonjour ".$_SESSION['name'];
    } ?>
    </span>
    </a>

    </li>
    </ul>
  </div>
</nav>
