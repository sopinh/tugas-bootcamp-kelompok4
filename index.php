<?php
     require 'koneksi.php';
     $result = mysqli_query($conn, "SELECT * FROM penjualan");
     $penjualan = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Cat Bangun Jaya</title>
</head>
<body>
    <h1 align = "center" >Toko Cat Guna Bangun Jaya</h1>
    <h3 align = "center" >Data Penjualan</h3>

    <form action="tambah.html">
    <button type="" style="margin: 0px 0px 10px 1000px";>Tambah Data</button></form>

    <table align = "center" border="1" cellpadding = "10" cellspacing = "0"> 
        <tr>
        <th>No.</th>
        <th>Nama Customer</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Tanggal Penjualan</th>
        <th>Jenis Cat</th>
        <th>Warna Cat</th>
        <th>Jumlah beli</th>
        <th colspan="3">Aksi</th>
        </tr>

        <?php  $i = 1 ?>
        <?php foreach($penjualan as $penjualan):  ?>
        <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $penjualan['nama_customer']; ?></td>
        <td><?php echo $penjualan['no_hp']; ?></td>
        <td><?php echo $penjualan['alamat']; ?></td>
        <td><?php echo $penjualan['tgl_penjualan']; ?></td>
        <td><?php echo $penjualan['jenis_cat']; ?></td>
        <td><?php echo $penjualan['warna']; ?></td>
        <td><?php echo $penjualan['jml_beli']; ?></td>
        <td><a href="edit.php?id=<?= $penjualan['id']; ?>">Edit</a></td>
        <td><a href="hapus.php/?id=<?= $penjualan['id']; ?>">Hapus</a></td>
        <td><a href="nota.php?id=<?= $penjualan['id']; ?>">Nota</a></td>
        </tr>
        <?php $i++ ?>
    <?php endforeach;
    ?>
    </table>
</body>
</html>

