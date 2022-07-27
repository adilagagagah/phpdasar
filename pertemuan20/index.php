<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari di klik 
if( isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
};

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
        id="keyword">
        <button type="submit" name="cari" id="tombol-cari">cari!</button>

    </form>
    
    <br><br>

    <div id="container">

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

    </div>

    <script src="js/script.js"></script>

</body>

</html>