<?php
include './partials/head.php';
include './config/function_library.php';

if (isset($_SESSION['email'])) {
    redirect('index.php');
}
?>

<body>

    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Registrasi</h2>
                    <p>Daftar Untuk Memulai</p>
                </div>

                <div class="row">

                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="registrasi.php">
                                    <div class="info-box mt-4">
                                        <i class="bx bx-envelope"></i>
                                        <h3>Daftar</h3>
                                        <p>Klik di sini untuk daftar akun baru</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="login.php">
                                    <div class="info-box mt-4">
                                        <i class="bx bx-user"></i>
                                        <h3>Masuk</h3>
                                        <p>Untuk melakukan pemesanan tiket</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="lib/register.php" method="post">
                            <h3 style="text-align: center;">Daftar</h3>
                            <div class="row">
                                <div class="form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email Anda" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Anda" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Masukkan Nomor Telepon" required>
                                </div>
                                <div class="text-center my-3">
                                    <button type="submit" name="submit" class="btn btn-login">Buat Akun!</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->


    </main><!-- End #main -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include './partials/scripts.php' ?>

</body>

</html>