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
                    <li>Jadwal tayang Film</li>
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

                <?php
                $query = "SELECT * FROM playings WHERE status = 'active' AND film_id = $id ORDER BY id DESC";
                $result = $db->query($query);


                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $playing_id = $row['id'];
                        $studio_id = $row['studio_id'];
                        $studio = global_select_single('studios', '*', "id=$studio_id")
                ?>

                        <div class="card">
                            <div class="card-header">
                                <?php echo $data['title'] ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $studio['name'] ?></h5>
                                <p class="card-text">Jam Tayang : <?php echo ubahFormatTanggal($row['playing_time']) ?></p>
                                <a href="ticket.php?id=<?php echo $playing_id ?>" class="btn btn-primary">Beli Tiket</a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>

    </main><!-- End #main -->

    <?php include './partials/footer.php' ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include './partials/scripts.php' ?>

</body>

</html>