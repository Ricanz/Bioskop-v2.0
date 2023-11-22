<?php
include './partials/head.php';
include './config/function_library.php';
?>

<body>

    <!-- ======= Header ======= -->
    <?php include './partials/header.php' ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(assets/img/slide/gambar-1.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>Bioskop Isma</span></h2>
                            <p class="animate__animated animate__fadeInUp">Selamat datang di Bioskop Isma, tempat di mana hiburan berkualitas bertemu dengan pengalaman sinematik yang tak terlupakan. Kami mengundang Anda untuk memasuki dunia kami yang penuh warna, cerita, dan keajaiban.</p>
                            <a href="#team" class="btn-get-started animate__animated animate__fadeInUp scrollto">Pilih Film</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url(assets/img/slide/gambar-2.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Temukan Kesenangan di Setiap Layar</h2>
                            <p class="animate__animated animate__fadeInUp">Bioskop Isma adalah tempat di mana setiap tayangan menjadi sebuah petualangan. Dengan teknologi terkini dan beragam pilihan film, kami berkomitmen untuk memberikan pengalaman bioskop terbaik untuk Anda dan keluarga.</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url(assets/img/slide/gambar-3.jpg)">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Pesan Tiket</h2>
                            <p class="animate__animated animate__fadeInUp">Masuk atau Daftar ke Website untuk melakukan pemesanan tiket bioskop secara online di Bioskop Isma</p>
                            <a href="login.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Masuk</a>
                            <a href="registrasi.php" class="btn-get-started animate__animated animate__fadeInUp scrollto">Daftar</a>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Film</h2>
                    <p>Mau nonton apa hari ini?</p>
                </div>

                <div class="row">
                    <?php
                    $query = "SELECT * FROM movies WHERE status = 'active' AND CURDATE() BETWEEN start_date AND end_date ORDER BY id DESC";
                    $result = $db->query($query);


                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                    <img src="<?php echo $row['image'] ?>" class="img-fluid" alt="">
                                    <div class="member-info">
                                        <a href="detail.php?id=<?php echo $row['id'] ?>">
                                            <div class="member-info-content">
                                                <h4><?php echo ucwords($row['title']) ?></h4>
                                                <span><?php echo $row['kategori'] ?> &nbsp; <?php echo $row['dimensi'] ?> </span>
                                            </div>
                                        </a>
                                        <div class="social">
                                            <a href="<?php echo $row['trailer'] ?>"><i class="bi bi-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="text-center">
                    <h3>Bioskop Isma</h3>
                    <p>Nikmati pengalaman sinematik yang tak terlupakan dengan film-film berkualitas di Bioskop Isma. Temukan cerita-cerita menarik yang akan menghibur, menginspirasi, dan mengangkat hati Anda.</p>
                    <a class="cta-btn" href="#team">Beli Tiket</a>
                </div>

            </div>
        </section><!-- End Cta Section -->


    </main><!-- End #main -->

    <?php include './partials/footer.php' ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include './partials/scripts.php' ?>

</body>

</html>