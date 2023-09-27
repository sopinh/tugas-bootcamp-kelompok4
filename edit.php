<?php
    require 'koneksi.php';
    $id = $_GET['id'];
    $result =  mysqli_query($conn, "SELECT * FROM penjualan WHERE `id`  = '$id'");
    $penjualan = mysqli_fetch_array($result);

    $nama = $penjualan['nama_customer'];
    $no_hp = $penjualan['no_hp'];
    $alamat = $penjualan['alamat'];
    $tanggal = $penjualan['tgl_penjualan'];
    $jenis = $penjualan['jenis_cat'];
    $warna = $penjualan['warna'];
    $jumlah = $penjualan['jml_beli'];   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Cat Bangun Jaya</title>
</head>
<body>
    <fieldset style="width: 25%;margin:auto; padding: 0px 20px 40px 20px">
    <h2 align = "center">Form Edit Data</h2>
    <hr>
    <form action="update.php" method="POST"> 
        <input type="hidden" name="id" value="<?php echo $id ?>">
    <p><label for="nama">Nama: Customer</label>
    <input type="text" name="nama_customer" value="<?php echo $nama ?>"><br></p>

    <p><label for="nohp">No HP: </label>
    <input type="text" name="no_hp" value="<?php echo $no_hp ?>"> <br></p>

    <p><label for="alamat">Alamat: </label>
    <input type="text" name="alamat" value="<?php echo $alamat ?>"> <br></p>

    <p><label for="tanggal">Tanggal: </label>
    <input type="date" name="tgl_penjualan" value="<?php echo $tanggal ?>"> <br></p>

    <p><label for="jenis_cat">Jenis Cat: </label>
    <select name="jenis_cat" value="<?php echo $jenis ?>">
        <option value="Bituminous Paint">Bituminous Paint</option>
        <option value="Chlorinated Rubber">Chlorinated Rubber</option>
        <option value="Vinyl">Vinyl</option>
    </select> <br></p>

    <p><label for="warna">Warna Cat:</label>
    <input type="radio" name="warna" value="merah">Merah</input>
    <input type="radio" name="warna" value="biru" checked>Biru</input>
    <input type="radio" name="warna" value="kuning"> kuning</input><br></p>
    
    <p><label for="jumlah">Jumlah Beli</label>
    <input type="number" name="jml_beli" value="<?php echo $jumlah ?>"></p>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">

    </form></fieldset>
</body>
</html>
  

