<?php
$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);

// var_dump($menu);

$menu = $menu['menu'];
echo $menu[0]['nama'];


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AY Hut</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="" width="120">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" href="#">ALl Menu</a>
        </div>
      </div>
  </nav>
  <!-- endnav -->

  <!-- content -->
  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <h1>All Menu</h1>
      </div>
    </div>
    <div class="row">
      <?php foreach ($menu as $m) : ?>
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="img/menu/<?= $m['gambar']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $m['nama']; ?></h5>
              <p class="card-text"><?= $m['deskripsi']; ?></p>
              <h5 class="card-title">Rp. <?= number_format($m['harga'], 2, ',', '.');; ?></h5>
              <a href="#" class="btn btn-primary">Pesan Sekarang</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- endcontent -->

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>