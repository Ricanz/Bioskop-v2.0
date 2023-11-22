<?php
include './partials/head.php';
include './config/function_library.php';

if (isset($_SESSION['id'])) {
    $id = urldecode($_SESSION['id']);
}

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
                    <li>Daftar Pesanan</li>
                </ol>
                <h2>Pesanan Anda</h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
                <?php
                $query = "SELECT * FROM transactions WHERE user_id = $id ORDER BY status DESC";
                $result = $db->query($query);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $playing_id = $row['playing_id'];
                        $playing = global_select_single('playings', '*', "id=$playing_id");
                        
                        $studio_id = $playing['studio_id'];
                        $studio = global_select_single('studios', '*', "id=$studio_id")
                ?>

                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $studio['name'] ?></h5>
                                <p class="card-text">Jam Tayang : <?php echo $playing['playing_time'] ?></p>
                                <p class="card-text">Status : <?php echo (($row['status'] === 'done') ? 'Selesai' : 'Belum Selesai') ?></p>
                                <?php
                                if ($row['status'] === 'pending') {
                                    echo '<a href="detail-order.php?id='.$row['id'].'" class="btn btn-success">Lanjutkan Pembayaran</a>';
                                } else if ($row['status'] === 'process'){
                                    echo '<a href="detail-order.php?id='.$row['id'].'" class="btn btn-warning">Pesanan Sedang Diproses</a>';
                                } else {
                                    echo '<a href="detail-order.php?id='.$row['id'].'" class="btn btn-info">Lihat Tiket</a>';
                                }
                                ?>
                                
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