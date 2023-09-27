<?php
require 'koneksi.php';

$nama = $_POST['nama_customer'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$tanggal = $_POST['tgl_penjualan'];
$jenis = $_POST['jenis_cat'];
$warna = $_POST['warna'];
$jumlah = $_POST['jml_beli'];

// Hitung harga berdasarkan jenis cat
switch($jenis){
    case "Bituminous Paint":
        $harga = 20000;
        break;
    case "Chlorinated Rubber":
        $harga = 30000; // Ubah harga sesuai dengan jenis cat
        break;
    case "Vinyl":
        $harga = 40000;
        break;
    default:
        $harga = 0; // Harga default jika jenis tidak dikenali
};

// Hitung total harga
$total = $harga * $jumlah;

// Hitung diskon berdasarkan jumlah beli
$diskon = 0;
if($jumlah >= 5 && $jumlah < 10){
    $diskon = $total * 0.05;
}elseif($jumlah >= 10){
    $diskon = $total * 0.1;
}

// Hitung total bayar
$total_bayar = $total - $diskon;

// Tambahkan data ke tabel penjualan
$tambah =   "INSERT INTO penjualan (`id`, `nama_customer`, `no_hp`, `alamat`, `tgl_penjualan`, `jenis_cat`, `warna`, `jml_beli`) VALUES ('', '$nama', '$no_hp', '$alamat','$tanggal', '$jenis', '$warna', '$jumlah')";
$result = mysqli_query($conn, $tambah);

// Dapatkan ID penjualan yang baru saja dimasukkan
$id_penjualan = mysqli_insert_id($conn);

// Tambahkan data ke tabel total_harga
$tambah_total_harga = "INSERT INTO total_harga (`id`, `id_penjualan`, `harga`, `total_harga`, `diskon`, `total_bayar`) VALUES ('', '$id_penjualan', '$harga', '$total', '$diskon', '$total_bayar')";
$result_total_harga = mysqli_query($conn, $tambah_total_harga);

// Redirect ke halaman utama
header('location: http://localhost/tugasBesar/index.php')
?>
