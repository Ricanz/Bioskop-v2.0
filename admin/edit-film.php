<?php
include './partials/head.php';
include '../config/function_library.php';

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
}
$data = global_select_single('movies', '*', "id='$id'");

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
                    <h1 class="h3 mb-2 text-gray-800">Ubah Film</h1>


                    <div class="card shadow mb-4 p-4">
                        <form action="./lib/do_update_film.php" method="POST" class="form-group" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-2">
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id'] ?>">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $data['title'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="poster">Poster</label>
                                    <input type="file" class="form-control" name="poster" id="poster" accept="image/*,application/pdf" onchange="displayImage(this)" />
                                    <?php 
                                        if ($data['image'] === null or $data['image'] === '') {
                                            echo '<img id="uploadedImage" src="" alt="Uploaded Image" style="width: 300px; max-width: 100%; display: none; margin-top: 10px;">';
                                        } else {
                                            echo '<img id="uploadedImage" src="'. $baseUrl . $data['image'].'" alt="Uploaded Image" style="width: 300px; max-width: 100%; margin-top: 10px;">';
                                        }
                                    ?>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="price">Harga</label>
                                    <input type="text" class="form-control" name="price" id="price" value="<?php echo $data['price'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="trailer">Link Trailer</label>
                                    <input type="text" class="form-control" name="trailer" id="trailer" value="<?php echo $data['trailer'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="start_date">Tanggal Mulai Tayang </label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo $data['start_date'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="end_date">Tanggal Selesai Tayang </label>
                                    <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo $data['end_date'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="genre">Genre</label>
                                    <input type="text" class="form-control" name="genre" id="genre" value="<?php echo $data['genre'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="kategori">Kategori Usia</label>
                                    <select name="kategori" id="kategori" class="form-control">
                                        <option value="<?php echo $data['kategori'] ?>" selected><?php echo $data['kategori'] !== null ?  $data['kategori'] : "-- Pilih Kategori Usia --" ?></option>
                                        <option value="Semua Umur">Semua Umur</option>
                                        <option value="RBO">RBO</option>
                                        <option value="R13+">R13+</option>
                                        <option value="D17+">D17+</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="dimensi">Dimensi Film</label>
                                    <select name="dimensi" id="dimensi" class="form-control">
                                        <option value="<?php echo $data['dimensi'] ?>" selected><?php echo $data['dimensi'] ?></option>
                                        <option value="2D">2D</option>
                                        <option value="3D">3D</option>
                                        <option value="4D">4D</option>
                                        <option value="IMAX 2D">IMAX 2D</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="durasi">Durasi (Menit)</label>
                                    <input type="text" class="form-control" name="durasi" id="durasi" value="<?php echo $data['durasi'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="sinopsis">Sinopsis Film</label>
                                    <textarea class="form-control" name="sinopsis" id="sinopsis" cols="30" rows="4"> <?php echo $data['description'] ?></textarea>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="produser">Produser</label>
                                    <input type="text" class="form-control" name="produser" id="produser" value="<?php echo $data['producer'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="sutradara">Sutradara</label>
                                    <input type="text" class="form-control" name="sutradara" id="sutradara" value="<?php echo $data['director'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" class="form-control" name="penulis" id="penulis" value="<?php echo $data['writer'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="pemain">Pemain</label>
                                    <input type="text" class="form-control" name="pemain" id="pemain" value="<?php echo $data['cast'] ?>">
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label for="distributor">Distributor</label>
                                    <input type="text" class="form-control" name="distributor" id="distributor" value="<?php echo $data['distribution'] ?>">
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