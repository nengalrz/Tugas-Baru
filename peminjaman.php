<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Peminjaman Buku</title>
    <style>
        body { font-family: Arial; }
        .container { width: 900px;
                     margin: auto; 
                     border: 2px solid #000; 
                     padding: 20px; 
                 }
        .header { text-align: center;
                    font-weight: bold; 
                    margin-bottom: 20px;
                 }
        .left { width: 65%;
                float: left; 
            }
        .right { width: 30%; 
                float: right; 
            }
        input { width: 90%; 
                padding: 5px; 
                margin-bottom: 10px; 
            }
        button { width: 100%; 
                padding: 10px; 
                margin-bottom: 10px; 
            }
        .clear { clear: both; 
        }

    </style>
</head>
    
<body>
    <?php
include 'koneksi.php';
$koneksi = mysqli_connect("localhost","root","","perpustakawan");

if (!$koneksi) {
    echo "koneksi berhasil";
}
?>
<div class="container">
    <div class="header">TRANSAKSI PEMINJAMAN BUKU</div>

    <form method="post">
        <div class="left">
            Nomor Anggota
            <input type="text" name="nomor_anggota">
            <button name="cari_anggota">Cari Anggota</button>

            Nama Anggota
            <input type="text" name="nama_anggota">

            Nomor Buku
            <input type="text" name="nomor_buku">
            <button name="cari_buku">Cari Buku</button>

            Judul Buku
            <input type="text" name="judul_buku">

            Pengarang
            <input type="text" name="pengarang">

            Tgl. Pinjam
            <input type="date" name="tgl_pinjam">

            Tgl. Habis
            <input type="date" name="tgl_habis">

            Status Buku
            <input type="text" name="status_buku">
            <button name="ubah_status_buku">Ganti Status Buku</button>

            Status
            <input type="text" name="status">
            <button name="ubah_status_anggota">Ganti Status Anggota</button>
        </div>

        <div class="right">
            <b>What you want to do?</b><br><br>
            <button name="cari_data">Cari Data Peminjam</button>
            <button name="koreksi">Koreksi</button>
            <button name="simpan">Simpan</button>
            <button name="hapus">Hapus</button>
            <button type="reset">Keluar</button>
        </div>

        <div class="clear"></div>
        
    </form>
</div>
</body>
</html>
