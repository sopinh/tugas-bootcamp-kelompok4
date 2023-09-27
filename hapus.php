<?php
    require 'koneksi.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM penjualan WHERE `id` = '$id'");

    header('location: http://localhosttugasBesar/index.php');
?>