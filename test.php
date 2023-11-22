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

        <label for="judulFilm">Judul Film:</label>
        <input type="text" id="judulFilm" name="judulFilm" value="Avengers: Endgame" readonly>

        <label for="studio">Studio:</label>
        <input type="text" id="studio" name="studio" value="Studio 3" readonly>

        <label for="tempatDuduk">Tempat Duduk:</label>
        <input type="text" id="tempatDuduk" name="tempatDuduk" value="D5" readonly>

        <label for="jadwalTayang">Jadwal Tayang:</label>
        <input type="text" id="jadwalTayang" name="jadwalTayang" value="Senin, 15 November 2023 - 19.00 WIB" readonly>


        <h2>Upload Bukti Transfer Pembayaran atau Foto</h2>

        <div class="upload-btn-wrapper">
            <button class="btn" onclick="document.getElementById('uploadInput').click()">Pilih File</button>
            <input type="file" name="buktiTransfer" id="uploadInput" accept="image/*,application/pdf" onchange="displayImage(this)" />
        </div>

        <img id="uploadedImage" src="" alt="Uploaded Image" style="max-width: 100%; display: none;">

        <button type="submit">Kirim</button>
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