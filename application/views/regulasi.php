<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/stylehome.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Teko" rel="stylesheet">

  <title><?= $title; ?></title>
</head>

<body>
  <!-- Navbar  -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>"><img src="<?= base_url(); ?>assets/img/logo.png" alt="" height="54x" /></a>
      <div>
        <h1>Terminal Giri Adipuro</h1>
        <h2>Kabupaten Wonogiri</h2>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="text-white nav-item nav-link" href="<?= base_url('/'); ?>">Beranda</a>
          <a class="text-white nav-item nav-link" href="<?= base_url('home/pengecekan'); ?>">Rampcheck</a>
          <a class="text-white nav-item nav-link" href="<?= base_url('home/laporan'); ?>">Data Rampcheck</a>
          <a class="text-white nav-item nav-link" href="<?= base_url('home/edit'); ?>">Profil</a>
          <a class="text-white nav-item nav-link active" href="<?= base_url('auth/regulasi'); ?>">Regulasi</a>
          <a class="nav-item btn btn-primary" href="<?= base_url('auth/login'); ?>"><?php if ($this->session->userdata('email')) {
                                                                                      echo "<p>" . $user['username'] . "</p>";
                                                                                    } else echo '<p>Masuk</p>'  ?>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Akhir navbar -->
  <!-- jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="regulasi">Regulasi</h3>
      <h2>Nomor : SK. 5637 / AJ.403 /</h2>
      <h2 class="tentang">“Tentang : Pedoman Pelaksanaan Inspeksi <br>Keselamatan Lalu Lintas dan Angkutan Jalan”</h2>

    </div>
  </div>


  <div class="footer">
    <p>Copyright © Rampcheck - 2021</p>
  </div>



  <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
  <script src="<?= base_url(); ?>assets/js/popper.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>