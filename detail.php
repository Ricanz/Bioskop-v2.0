<?php
include './partials/head.php';
include './config/function_library.php';

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
}

$data = global_select_single('movies', '*', "id=$id");
?>

<body>

    <!-- ======= Header ======= -->
    <?php include './partials/header.php' ?>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="index.php">Beranda</a></li>
                    <li><?php echo $data['title'] ?></li>
                </ol>
                <h2><?php echo $data['title'] ?></h2>
                <div class="sub-title">
                    <h3 class="p-2"><?php echo $data['kategori'] ?></h3>
                    <span class="p-2"><?php echo $data['dimensi'] ?></span>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <div class="cat-button mb-3">
                    <a href="tayang.php?id=<?php echo $id ?>">
                        <div class="btn btn-success">Beli Ticket</div>
                    </a>
                    <a href="<?php echo $data['trailer'] ?>" target="_BLANK">
                        <div class="btn btn-warning">Lihat Trailer</div>
                    </a>
                </div>
                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="<?php echo $data['image'] ?>" alt="">
                                </div>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <h2>Sinopsis</h2>
                            <p>
                                <?php echo $data['description'] ?>
                            </p>
                        </div>
                        <div class="portfolio-info">
                            <h4>Informasi</h4>
                            <ul>
                                <li><strong>Produser</strong>: <?php echo ucwords($data['producer']) ?></li>
                                <li><strong>Sutradara</strong>: <?php echo ucwords($data['director']) ?></li>
                                <li><strong>Penulis</strong>: <?php echo ucwords($data['writer']) ?></li>
                                <li><strong>Pemain</strong>: <?php echo ucwords($data['cast']) ?></li>
                                <li><strong>Produksi</strong>: <?php echo ucwords($data['distribution']) ?></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <?php include './partials/footer.php' ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include './partials/scripts.php' ?>

</body>

</html>