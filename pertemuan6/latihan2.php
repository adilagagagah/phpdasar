<?php

// array associative
// key adalah string

$mahasiswa = [
    [
        "nama" => "Gagah Pusoko Adilaga",
        "NIM" => "24050121130050",
        "jurusan" => "Statistika",
        "email" => "gagahadilaga6124@gmail.com",
        "gambar" => "Asset 1.png"
    ],
    [
        "nama" => "Gagah Pusoko Adilaga",
        "NIM" => "24050121130050",
        "jurusan" => "Statistika",
        "email" => "gagahadilaga6124@gmail.com",
        "gambar" => "Asset 2.png"
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $ma) : ?>
        <ul>
            <li>
                <img src="img/<?php echo $ma["gambar"]; ?>">
            </li>
            <li>nama : <?php echo $ma["nama"]; ?></li>
            <li>NIM : <?php echo $ma["NIM"]; ?></li>
            <li>jurusan : <?php echo $ma["jurusan"]; ?></li>
            <li>email : <?php echo $ma["email"]; ?></li>
        </ul>
    <?php endforeach; ?>

</body>

</html>