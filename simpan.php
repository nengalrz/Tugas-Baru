<?php
include "koneksi.php";
$koneksi = mysqli_connect("localhost","root","","peminjaman");

if (!$koneksi) {
    echo "koneksi berhasil";
}

mysqli_query($koneksi, "INSERT INTO simpan.php VALUES(
NULL,
'$_POST[nomor_anggota]',
'$_POST[nama_anggota]',
'$_POST[nomor_buku]',
'$_POST[judul_buku]',
'$_POST[pengarang]',
'$_POST[tgl_pinjam]',
'$_POST[tgl_habis]',
'Meminjam'
)");

mysqli_query($koneksi,"UPDATE buku SET status_buku='Dipinjam' 
WHERE nomor_buku='$_POST[nomor_buku]'");

mysqli_query($koneksi,"UPDATE anggota SET status_anggota='Meminjam'
WHERE nomor_anggota='$_POST[nomor_anggota]'");

header("location:peminjaman.php");
?>
