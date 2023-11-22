<?php
include './partials/head.php';
include './config/function_library.php';

if (!isset($_SESSION['id'])) {
    redirect('login.php');
}
if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
}

$data = global_select_single('playings', '*', "id=$id");
$film_id = $data['film_id'];
$studio_id = $data['studio_id'];

$film = global_select_single('movies', '*', "id=$film_id");
$studio = global_select_single('studios', '*', "id=$studio_id");
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
                <h2><?php echo $film['title'] ?></h2>
                <div class="sub-title">
                    <h3 class="p-2"><?php echo $film['kategori'] ?></h3>
                    <span class="p-2"><?php echo $film['dimensi'] ?></span>
                </div>
                <h3 class="p-2"><?php echo $studio['name'] ?></h3>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">

                <div class="card">
                    <div class="card-header">
                        Layout Kursi Bioskop
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $studio['name'] ?></h5>
                        <p class="card-text">Jam Tayang : <?php echo $data['playing_time'] ?></p>
                    </div>
                    <div id="resetBtn" class="btn btn-danger mb-2">Reset</div>

                    <div class="process-seat">
                        <div class="seat-map">
                            <?php
                            // Anda dapat menggunakan PHP untuk menghasilkan kursi secara dinamis sesuai dengan kebutuhan
                            $totalSeats = floatval($studio['seat']); // Jumlah total kursi

                            $num = 1;
                            for ($i = 1; $i <= $totalSeats; $i++) {
                                // Menentukan label sesuai dengan kelompok 10 kursi
                                $label = chr(65 + floor(($i - 1) / 10)); // ASCII 'A' dimulai dari 65
                                $label_seat = $label . $num;

                                // Pindahkan pengecekan status kursi ke dalam blok kondisional
                                if ($check_seat = $db->query("SELECT `taken` FROM `seats` WHERE `playing_id`='$id' AND `taken`='$label_seat' LIMIT 1")) {
                                    if ($check_seat->num_rows > 0) {
                                        $stl = 'seat occupied';
                                    } else {
                                        $stl = 'seat';
                                    }
                                }

                                echo '<div class="' . $stl . '" id="seat-' . $label_seat . '">' . $label_seat . '</div>';

                                // Reset $num setelah mencapai 10 kursi di setiap kelompok
                                if ($i % 10 == 0) {
                                    $num = 1;
                                } else {
                                    $num++;
                                }
                            }
                            ?>
                            <div class="monitor">Layar Bioskop</div>
                        </div>
                        <div class="payment-seat">
                            <div class="card shadow mb-4 p-4">
                                <form action="./lib/do_proses.php" method="POST" class="form-group">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-2">
                                            <label for="name">Kursi yang dipilih</label>
                                            <input readonly type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>">
                                            <input readonly type="text" class="form-control" name="selectedSeatInput" id="selectedSeatInput" placeholder="Pilih Studio">
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label for="seat">Total tiket</label>
                                            <input readonly type="text" class="form-control" name="totalTicket" id="totalSeat" placeholder="Total Kursi">
                                        </div>
                                        <div class="col-sm-12 mb-2">
                                            <label for="seat">Total Harga</label>
                                            <input readonly type="hidden" class="form-control" name="price" id="price" value="<?php echo $film['price'] ?>">
                                            <input readonly type="text" class="form-control" name="totalPrice" id="totalPrice" placeholder="Total Harga">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Pesan</button>
                                </form>
                            </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectedSeats = []; // Variabel untuk menyimpan ID kursi yang dipilih

            var seats = document.querySelectorAll('.seat');
            seats.forEach(function(seat) {
                seat.addEventListener('click', function() {
                    var clickedSeat = this;

                    // Cek apakah kursi sudah diisi (mempunyai class "occupied")
                    if (!clickedSeat.classList.contains('occupied')) {
                        // Toggle class "choose" pada elemen yang diklik
                        clickedSeat.classList.toggle('choose');

                        // Dapatkan ID dari kursi yang diklik
                        var seatId = clickedSeat.id;

                        // Tambahkan atau hapus ID dari variabel selectedSeats
                        var index = selectedSeats.indexOf(seatId);
                        if (index === -1) {
                            selectedSeats.push(seatId);
                        } else {
                            selectedSeats.splice(index, 1);
                        }

                        $('#selectedSeatInput').val(selectedSeats);
                        $('#totalSeat').val(selectedSeats.length);

                        var price = $('#price').val();

                        var totalPrice = selectedSeats.length * price;
                        $('#totalPrice').val(totalPrice);


                        // Tampilkan ID kursi yang dipilih
                        console.log(selectedSeats);
                    } else {
                        // Kursi sudah diisi, tindakan lain atau abaikan
                        alert("Kursi ini sudah diisi. Pilih kursi yang kosong.");
                    }
                });
            });

            $("#resetBtn").on("click", function() {
                // Hapus kelas "choose" dari semua elemen kursi
                var seats = document.querySelectorAll('.seat');
                seats.forEach(function(seat) {
                    seat.classList.remove('choose');
                });

                // Kosongkan variabel selectedSeats
                selectedSeats = [];

                // Update nilai input
                $('#selectedSeatInput').val(selectedSeats);
                $('#totalSeat').val(selectedSeats.length);
                $('#totalPrice').val(0);

                alert("Kursi telah di-reset.");
            });

            $("#prosesBtn").on("click", function() {
                // Tampilkan konfirmasi
                var confirmation = confirm("Apakah Anda yakin ingin melanjutkan?");

                // Jika pengguna menekan "OK" dalam konfirmasi
                if (confirmation) {
                    // Kirim data ke backend menggunakan AJAX
                    var playing_id = "<?php echo $id; ?>";
                    $.ajax({
                        type: "POST",
                        url: "lib/do_proses.php?id=" + playing_id,
                        data: {
                            selectedSeats: selectedSeats,
                            id: playing_id
                        },
                        success: function(response) {
                            // Tanggapan dari backend
                            console.log(response);

                            // Reload halaman
                            location.reload();

                            // Handle tanggapan sesuai kebutuhan Anda
                        },
                        error: function(error) {
                            console.error("Error:", error);
                        }
                    });
                } else {
                    location.reload();
                }
            });
        });

        function bayar(e) {
            var value = e.target.value;
            var totalPrice = $('#totalPrice').val();

            var kembalian = value - totalPrice;
            $('#kembalian').val(kembalian);
        }
    </script>

</body>

</html>