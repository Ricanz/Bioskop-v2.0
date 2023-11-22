<?php
include './partials/head.php';
include '../config/connection.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './partials/sidebar.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './partials/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Film</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_add_film.php" method="POST" class="form-group" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Judul Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="poster">Poster</label>
                                    <input type="file" class="form-control" name="poster" id="uploadInput" accept="image/*,application/pdf" onchange="displayImage(this)" />
                                    <img id="uploadedImage" src="" alt="Uploaded Image" style="width: 300px; max-width: 100%; display: none; margin-top: 10px;">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="price">Harga</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Masukkan Harga Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="trailer">Link Trailer</label>
                                    <input type="text" class="form-control" name="trailer" id="trailer" placeholder="Masukkan Link Trailer Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="start_date">Tanggal Mulai Tayang </label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Masukkan Tanggal Mulai ">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="end_date">Tanggal Selesai Tayang </label>
                                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Masukkan Tanggal Selesai ">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="genre">Genre</label>
                                    <input type="text" class="form-control" name="genre" id="genre" placeholder="Masukkan Genre Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="kategori">Kategori Usia</label>
                                    <select name="kategori" id="kategori" class="form-control">
                                        <option value="" selected>-- Pilih Kategori Usia --</option>
                                        <option value="Semua Umur">Semua Umur</option>
                                        <option value="RBO">RBO</option>
                                        <option value="R13+">R13+</option>
                                        <option value="D17+">D17+</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="dimensi">Dimensi Film</label>
                                    <select name="dimensi" id="dimensi" class="form-control">
                                        <option value="" selected>-- Pilih Dimensi Film --</option>
                                        <option value="2D">2D</option>
                                        <option value="3D">3D</option>
                                        <option value="4D">4D</option>
                                        <option value="IMAX 2D">IMAX 2D</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="durasi">Durasi (Menit)</label>
                                    <input type="text" class="form-control" name="durasi" id="durasi" placeholder="Masukkan Durasi Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="sinopsis">Sinopsis Film</label>
                                    <textarea class="form-control" name="sinopsis" id="sinopsis" cols="30" rows="4"></textarea>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="produser">Produser</label>
                                    <input type="text" class="form-control" name="produser" id="produser" placeholder="Masukkan Produser Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="sutradara">Sutradara</label>
                                    <input type="text" class="form-control" name="sutradara" id="sutradara" placeholder="Masukkan Sutradara Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan Penulis Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="pemain">Pemain</label>
                                    <input type="text" class="form-control" name="pemain" id="pemain" placeholder="Masukkan Pemain Film">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="distributor">Distributor</label>
                                    <input type="text" class="form-control" name="distributor" id="distributor" placeholder="Masukkan Distributor Film">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './partials/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include './partials/others.php' ?>

    <?php
    include './partials/scripts.php'
    ?>
    <script>
        function displayImage(input) {
            var uploadedImage = document.getElementById('uploadedImage');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    uploadedImage.src = e.target.result;
                    uploadedImage.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>