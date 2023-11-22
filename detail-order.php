<?php
include './config/function_library.php';

if (isset($_GET['id'])) {
    $id = urldecode($_GET['id']);
}

$transaction = global_select_single('transactions', '*', "id=$id");

$playing_id = $transaction['playing_id'];
$data = global_select_single('playings', '*', "id=$playing_id");
$film_id = $data['film_id'];
$studio_id = $data['studio_id'];

$film = global_select_single('movies', '*', "id=$film_id");
$studio = global_select_single('studios', '*', "id=$studio_id");

$seats = global_select_to_string('seats', 'taken', "transaction_id=$id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan Tiket Bioskop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .upload-btn-wrapper .btn {
            border: none;
            font-size: 14px;
            font-weight: normal;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Detail Pemesanan Tiket Bioskop</h1>

        <form action="lib/do_update_payment.php" method="post" enctype="multipart/form-data">
            <label for="judulFilm">Judul Film:</label>
            <input type="hidden" id="id" name="id" value="<?php echo $id ?>" readonly>
            <input type="text" id="judulFilm" name="judulFilm" value="<?php echo $film['title'] ?>" readonly>

            <label for="studio">Studio:</label>
            <input type="text" id="studio" name="studio" value="<?php echo $studio['name'] ?>" readonly>

            <label for="tempatDuduk">Tempat Duduk:</label>
            <input type="text" id="tempatDuduk" name="tempatDuduk" value="<?php echo $seats ?>" readonly>

            <label for="jadwalTayang">Jadwal Tayang:</label>
            <input type="text" id="jadwalTayang" name="jadwalTayang" value="<?php echo ubahFormatTanggal($data['playing_time']) ?>" readonly>

            <label for="jadwalTayang">Status Tiket:</label>
            <input type="text" id="jadwalTayang" name="jadwalTayang" value="<?php echo (($transaction['status'] === 'done') ? 'Selesai' : 'Belum Selesai') ?>" readonly>

            <?php
            if ($transaction['status'] === 'pending') {
                ?>
                <h2>Upload Bukti Transfer Pembayaran atau Foto</h2>
    
                <div class="upload-btn-wrapper">
                    <button class="btn" onclick="document.getElementById('uploadInput').click()">Pilih File</button>
                    <input type="file" name="buktiTransfer" id="uploadInput" accept="image/*,application/pdf" onchange="displayImage(this)" />
                </div>
    
                <button type="submit" name="submit" style="padding: 10px 30px; margin-bottom: 10px;">Kirim</button>
                <a href="javascript:history.back()" style="padding: 10px 20px; margin-bottom: 10px; background-color: red; color: white; text-decoration: none; font-size: 11px;">Kembali</a>
    
                <img id="uploadedImage" src="" alt="Uploaded Image" style="width: 400px; max-width: 100%; display: none;">
            <?php
            } else {
                ?>
                <a href="javascript:history.back()" style="padding: 10px 20px; margin-bottom: 10px; background-color: red; color: white; text-decoration: none; font-size: 11px;">Kembali</a>
                <h2>Bukti Transfer</h2>
                <img id="uploadedImage" src="<?php echo $baseUrl . $transaction['bukti_transfer'] ?>" alt="Uploaded Image" style="width: 400px; max-width: 100%; margin-top: 10px;">
            <?php
            }
            ?>
        </form>
    </div>

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