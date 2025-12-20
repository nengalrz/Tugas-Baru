
<h3>Laporan Peminjaman</h3>
<table border="1" width="100%">
<tr>
<th>No</th>
<th>Anggota</th>
<th>Buku</th>
<th>Tgl Pinjam</th>
<th>Status</th>
</tr>
<?php
include 'koneksi.php';
$no=1;
$data=mysqli_query($koneksi,"SELECT * FROM peminjaman");
{
?>

<?php } 
?>
</table>

<script>window.print();</script>
