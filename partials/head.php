<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bioskop Isma</title>
  <meta content="Bioskop Isma" name="description">
  <meta content="Bioskop Isma" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .seat-map {
      display: flex;
      flex-wrap: wrap;
      max-width: 600px;
      max-height: 300px;
      align-items: center;
      text-align: center;
      justify-content: center;
    }

    .seat {
      width: 50px;
      height: 50px;
      margin: 5px;
      background-color: #00ff00;
      /* Kursi kosong berwarna hijau */
      border: 1px solid #ccc;
      cursor: pointer;
      padding-top: 12px;
      color: black;
    }

    .seat.occupied {
      background-color: #ff0000;
      /* Kursi terisi berwarna merah */
      cursor: not-allowed;
    }

    .monitor {
      display: flex;
      flex-wrap: wrap;
      width: 600px;
      max-width: 600px;
      height: 70px;
      ;
      align-items: center;
      text-align: center;
      justify-content: center;
      background-color: gray;
      margin-top: 20px;
      color: black;
    }

    .seat.choose {
      background-color: #0000ff;
      /* Kursi yang dipilih berwarna biru */
    }

    .process-seat {
      display: flex;
    }

    .payment-seat {
      padding: 0 20px;
    }

    .upload-btn-wrapper {
      position: relative;
      overflow: hidden;
      display: inline-block;
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

    .btn-file {
      border: 2px solid gray;
      color: gray;
      background-color: white;
      padding: 8px 20px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
    }

    .btn-send-order {
      border: 2px solid white;
      color: white;
      background-color: green;
      padding: 12px 30px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
    }
  </style>

  <!-- =======================================================
  * Template Name: Multi - v4.7.0
  * Template URL: https://bootstrapmade.com/multi-responsive-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>