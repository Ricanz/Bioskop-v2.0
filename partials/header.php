
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Bioskop Isma</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Daftar Film</a></li>
          <?php
            if (!isset($_SESSION['email'])) {
              echo '<li><a class="getstarted scrollto" href="login.php">Masuk</a></li>';
            } else {
              echo '<li><a class="nav-link scrollto" href="order.php">Pesanan</a></li>';
              echo '<li><a class="getstarted scrollto" href="lib/logout.php">Logout</a></li>';
            }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->