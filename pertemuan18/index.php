<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// konfigurasi
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT *  FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
$halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
// hal 1, 3 dimulai dari 0
// hal 2, 3 dimulai dari 3
// hal 3, 3 dimulai dari 6
$dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $dataAwal, $jumlahDataPerHalaman"); // #limit >> arg index pertama, arg berapa banyak data dari index pertama

//tombol cari di klik 
if( isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Halaman Admin</title>
</head>

<body>
    
    <a href="logout.php">Logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">

        <input type="text" name="keyword" size=40 autofocus 
        placeholder="masukkan pencarian.." autocomplete="off" 
        id="">
        <button type="submit" name="cari">cari!</button>

    </form>
    
    <br><br>

    <!-- membuat bar navigasi -->
    <?php if($halamanAktif > 1): ?>
        <a href="?halaman=<?php echo ($halamanAktif - 1) ?>">&laquo</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahDataPerHalaman; $i++): ?>
        <?php if($i == $halamanAktif): ?>
            <a href="?halaman=<?php echo $i?>" style="font-weight: bold; color: red;"><?php echo $i ?></a>
        <?php else: ?>
            <a href="?halaman=<?php echo $i?>"><?php echo $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman): ?>
        <a href="?halaman=<?php echo ($halamanAktif + 1) ?>">&raquo</a>
    <?php endif; ?>

    <br>

    <!-- membuat tabel daftar mahasiswa -->
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>NO.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $id = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td>
                    <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> |
                    <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
                </td>
                <td><img src="img/<?php echo $row["gambar"] ?>" width="50" alt=""></td>
                <td><?php echo $row["nrp"] ?></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["jurusan"] ?></td>
            </tr>
            <?php $id++; ?>
        <?php endforeach; ?>

    </table>


</body>

</html>