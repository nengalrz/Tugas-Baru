<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Pengembalian Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 900px;
            margin: auto;
            border: 3px solid black;
            padding: 20px;
        }

        h2 {
            text-align: center;
            border: 3px solid black;
            padding: 10px;
        }

        table {
            width: 100%;
            margin-top: 15px;
        }

        td {
            padding: 8px;
        }

        input {
            width: 95%;
            padding: 5px;
            border: 2px solid black;
        }

        .btn {
            padding: 6px 12px;
            border: 2px solid black;
            background: white;
            cursor: pointer;
        }

        .btn:hover {
            background: #ddd;
        }

        .button-area {
            text-align: center;
            margin-top: 20px;
            border-top: 3px solid black;
            padding-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Transaksi Pengembalian Buku</h2>

    <table>
        <tr>
            <td>No. Anggota</td>
            <td><input type="text" id="noAnggota"></td>
            <td>Nama</td>
            <td><input type="text" id="nama"></td>
        </tr>
        <tr>
            <td>No. Buku</td>
            <td><input type="text" id="noBuku"></td>
            <td>Judul</td>
            <td><input type="text" id="judul"></td>
        </tr>
        <tr>
            <td>Tanggal Pinjam</td>
            <td><input type="date" id="tglPinjam"></td>
            <td>Status Buku</td>
            <td>
                <input type="text" id="statusBuku">
                <button class="btn" onclick="gantiStatusBuku()">Ganti Status Buku</button>
            </td>
        </tr>
        <tr>
            <td>Tanggal Habis</td>
            <td><input type="date" id="tglHabis"></td>
        </tr>
        <tr>
            <td>Tanggal Kembali</td>
            <td><input type="date" id="tglKembali"></td>
            <td>Status Anggota</td>
            <td>
                <input type="text" id="statusAnggota">
                <button class="btn" onclick="gantiStatusAnggota()">Ganti Status Anggota</button>
            </td>
        </tr>
        <tr>
            <td>Besar Denda</td>
            <td><input type="text" id="denda" readonly></td>
        </tr>
    </table>

    <div class="button-area">
        <button class="btn" onclick="cekPinjam()">Cek Data Pinjam</button>
        <button class="btn" onclick="cekKembali()">Cek Data Kembali</button>
        <button class="btn" onclick="koreksi()">Koreksi</button>
        <button class="btn" onclick="simpan()">Simpan</button>
        <button class="btn" onclick="hapus()">Hapus</button>
        <button class="btn" onclick="keluar()">Keluar</button>
    </div>
</div>

<script>
    function gantiStatusBuku() {
        document.getElementById("statusBuku").value = "Tersedia";
    }

    function gantiStatusAnggota() {
        document.getElementById("statusAnggota").value = "Aktif";
    }

    function cekPinjam() {
        alert("Data peminjaman ditemukan!");
    }

    function cekKembali() {
        let tglHabis = new Date(document.getElementById("tglHabis").value);
        let tglKembali = new Date(document.getElementById("tglKembali").value);

        if (tglKembali > tglHabis) {
            let selisih = (tglKembali - tglHabis) / (1000 * 60 * 60 * 24);
            let denda = selisih * 1000;
            document.getElementById("denda").value = "Rp " + denda;
        } else {
            document.getElementById("denda").value = "Rp 0";
        }

        alert("Data pengembalian dicek");
    }

    function koreksi() {
        alert("Silakan koreksi data");
    }

    function simpan() {
        alert("Data berhasil disimpan");
    }

    function hapus() {
        if (confirm("Yakin ingin menghapus data?")) {
            document.querySelectorAll("input").forEach(input => input.value = "");
        }
    }

    function keluar() {
        alert("Keluar dari aplikasi");
        window.close();
    }
</script>

</body>
</html>