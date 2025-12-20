<?php
include "koneksi.php";

/* ================= SIMPAN ================= */
if (isset($_POST['simpan'])) {
    mysqli_query($koneksi,"INSERT INTO peminjaman VALUES(
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
}

/* ================= HAPUS ================= */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $q = mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id_pinjam='$id'");
    $d = mysqli_fetch_array($q);

    mysqli_query($koneksi,"UPDATE buku SET status_buku='Tersedia'
    WHERE nomor_buku='$d[nomor_buku]'");

    mysqli_query($koneksi,"UPDATE anggota SET status_anggota='Aktif'
    WHERE nomor_anggota='$d[nomor_anggota]'");

    mysqli_query($koneksi,"DELETE FROM peminjaman WHERE id_pinjam='$id'");
}

/* ================= EDIT ================= */
if (isset($_POST['update'])) {
    mysqli_query($koneksi,"UPDATE peminjaman SET
        tgl_habis='$_POST[tgl_habis]'
        WHERE id_pinjam='$_POST[id_pinjam]'
    ");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Beranda Peminjaman Buku</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-light">
<div class="container mt-4">
    <div id="h">
        <a href="Peminjaman.php?ke=Beranda">beranda</a>
        <a href="simpan.php?ke=data_simpan">data simpan</a>
        <a href="laporan_peminjaman.php?ke">laporan peminjaman</a>
        <a href="pengembalian.php?ke">pengembalian</a>
        
    </div>


<hr>

<!-- ================= DATA ================= -->
<h5>Data Peminjaman</h5>
<table border="2" width="100%">
<tr>
<th>No</th>
<th>Anggota</th>
<th>Buku</th>
<th>Tgl Pinjam</th>l
<th>Tgl Habis</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM peminjaman");
 {
?>
<td>
<form method="post" class="d-flex">
<input type="hidden" name="id_pinjam" value="<?= $d['id_pinjam'] ?>">
<input type="date" name="tgl_habis" value="<?= $d['tgl_habis'] ?>" class="form-control">
</form>
</td>
<td>
</td>
</tr>
<?php } ?>
</table>
<div>
    <input type="date" name="tgl_habis" value="<?= $d['tgl_habis'] ?>" class="form-control">
    <button name="update" class="btn btn-warning btn-sm ms-1">Update</button>
    <a href="?hapus=<?= $d['id_pinjam'] ?>"
onclick="return confirm('Hapus data?')"
class="btn btn-danger btn-sm">Hapus</a>
</td>
</div>
</div>

<!-- ================= AJAX ================= -->
<script>
$("#nomor_anggota").keyup(function(){
    $.get("cari_anggota.php",{nomor_anggota:this.value},function(data){
        if(data){
            let a = JSON.parse(data);
            $("#nama_anggota").val(a.nama_anggota);
        }
    });
});

$("#nomor_buku").keyup(function(){
    $.get("cari_buku.php",{nomor_buku:this.value},function(data){
        if(data){
            let b = JSON.parse(data);
            $("#judul_buku").val(b.judul_buku);
            $("#pengarang").val(b.pengarang);
        }
    });
});
</script>

</body>
</html>
