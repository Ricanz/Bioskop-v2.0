<?php
include('../../config/function_library.php');
session_start();

$targetDirectory = "../../uploads/"; // Direktori tempat menyimpan file
$allowedExtensions = ["jpg", "jpeg", "png", "gif"]; // Ekstensi file yang diizinkan
$maxFileSize = 5 * 1024 * 1024; // Maksimum ukuran file (dalam byte)
$uploadedPath = null;

if (isset($_POST['submit'])) {
    if (isset($_FILES["poster"])) {
        $uploadedPath = uploadFoto($_FILES["poster"], $targetDirectory, $allowedExtensions, $maxFileSize);

        if ($uploadedPath) {
            echo "Path file yang diunggah: " . $uploadedPath;
        }
    }

    $film['image'] = $uploadedPath;
    $film['title'] = $_POST['title'];
    $film['description'] = $_POST['sinopsis'];
    $film['trailer'] = $_POST['trailer'];
    $film['producer'] = $_POST['produser'];
    $film['director'] = $_POST['sutradara'];
    $film['writer'] = $_POST['penulis'];
    $film['cast'] = $_POST['pemain'];
    $film['distribution'] = $_POST['distributor'];
    $film['genre'] = $_POST['genre'];
    $film['kategori'] = $_POST['kategori'];
    $film['dimensi'] = $_POST['dimensi'];
    $film['durasi'] = $_POST['durasi'];
    $film['start_date'] = $_POST['start_date'];
    $film['end_date'] = $_POST['end_date'];
    $film['price'] = $_POST['price'];

    $save = global_insert('movies', $film);

    if ($save) {
        redirectWithMessage('../film.php', 'Berhasil Tambah Film');
    } else {
        redirectWithMessage('../film.php', 'Gagal Tambah Film');
    }
}
