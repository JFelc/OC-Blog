<!doctype html>
<html lang="fr">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>OC-Blog Project 5</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
  <link href="<?= $this->rewritebase; ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $this->rewritebase; ?>vendor/components/font-awesome/css/all.min.css" rel="stylesheet">
  <link href="<?= $this->rewritebase; ?>public/assets/css/signin.css" rel="stylesheet">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="<?= $this->rewritebase; ?>" class="navbar-brand logo d-flex align-items-center">
      <i class="fa-2x fas fa-code"></i>
      </a>
      <?php require_once 'nav.php' ?>
    </div>
  </div>
</header>

<body>