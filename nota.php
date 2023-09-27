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
        $harga = 0;
        $diskon = 0;


    switch($jenis){
        case "Bituminous Paint":
            $harga = 20000;
            break;
        case "Vinyl":
            $harga = 40000;
            break;
        default:
            $harga = 30000;
    };

    $total = $harga * $jumlah;
    if($jumlah >= 5 && $jumlah < 10){
        $diskon = $total * 0.05;
    }elseif($jumlah > 10){
        $diskon = $total * 0.1;
    };
     
    $tolbay = $total - $diskon;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Caat Bangun Jaya</title>
    <script type="text/javascript">
</script>
</head>
<body>
    <fieldset  style=" width : 35%; margin:auto">
        <hr>
        <h3 align = "center";>Toko Cat Bangun Jaya</h3>
        
        <?php ;
        echo "<div class = 'nota'>";
        echo "<b>Nota Penjualan </b><br>"; 
        echo "<div class='tgl'><b>Tanggal Penjualan: $tanggal</b></div>";
        echo "</div>";
        echo "<hr>";

        echo "<div class = 'var'>";
        
        echo "Nama Customer <br><br>";
        echo "No HP<br><br>";
        echo "Alamat <br><br>";
        echo "Jenis Cat <br><br>";
        echo "Warna <br><br>";
        echo "Harga <br><br>";
        echo "Jumlah beli <br>";
      
        echo "<div class = 'nama'>";
        
        echo ": $nama<br><br>";
        echo ": $no_hp<br><br>";
        echo ": $alamat<br><br>";
        echo ": $jenis<br><br>";
        echo ": $warna<br><br>";
        echo ": Rp.  $harga<br><br>";
        echo ": $jumlah<br>";
        echo "</div></div>";

        echo "<hr>";

        echo "<div class = 'var'>";
        echo "Total harga <br><br>";
        echo "Diskon <br>";

        echo "<div class = 'nam'>";
        echo ":  Rp. $total <br><br>"; 
        echo ":  Rp. $diskon<br>";
        echo "</div></div>";
        echo "<hr>";

        echo "<div class = 'var'>";
        echo "Total Bayar:<br><br>";

        echo "<div class = 'na'>";
        echo ":  Rp. $tolbay <br><br>"; 
        echo "</div></div>";

        echo "<hr>";
        ?>
        
    </fieldset>
    <div class="cetak-button" style="text-align: center;">
            <p><button onclick="cetak()">Print</button></p>
        </div>

        <script>
            function cetak() {
                window.print();
            }
        </script>
</body>
</html>

<style> 
    .tgl{
      position: relative;
      left: 30px;
    }

    .nota{
        display: flex;
        width: 100%;
        padding-left: 14px;
    }

    .var{
        display: flex;
        padding-left: 20px;
    }

    .nama{
        margin-left: 50px;   
    }

    .nam{
        margin-left: 82px;
    }

    .na{
        margin-left: 75px;
    }

    @media print {
            .cetak-button {
                display: none;
            }
    }

</style>