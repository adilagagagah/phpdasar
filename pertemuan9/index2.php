<?php

// koneksi ke database 
$db = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel mahasiswa
$result = mysqli_query($db, "SELECT * FROM mahasiswa");

// ambil data(fetch) mahasiswa dari objek result
// mysqli_fetch_row() => mengembalikan array numerik
// mysqli_fetch_assoc() => mengembalikan array associative
// mysqli_fetch_array() => mengembalikan array numerik dan assoc
// mysqli_fetch_object() =>

// $mhs = mysqli_fetch_assoc($result);
//     var_dump($mhs);

// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// };


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
    <h1>Daftar Mahasiswa</h1>

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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td>
                    <a href="">ubah</a> |
                    <a href="">hapus</a>
                </td>
                <td><img src="img/<?php echo $row["gambar"] ?>" width="50" alt=""></td>
                <td><?php echo $row["nrp"] ?></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["jurusan"] ?></td>
            </tr>
            <?php $id++; ?>
        <?php endwhile; ?>

    </table>


</body>

</html>