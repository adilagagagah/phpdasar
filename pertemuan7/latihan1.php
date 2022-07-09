<?php

$mahasiswa = [
    [
        "nama" => "Gagah Pusoko Adilaga",
        "NIM" => "24050121130050",
        "jurusan" => "Statistika",
        "email" => "gagahadilaga6124@gmail.com",
        "gambar" => "Asset 1.png"
    ],
    [
        "nama" => "Sabrina Farrah Athadiva",
        "NIM" => "24050121140136",
        "jurusan" => "Statistika",
        "email" => "shabrina.fr13@gmail.com",
        "gambar" => "Asset 2.png"
    ]
];

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>GET</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <!-- <ul>
            <li><img src="img/<?php echo $mhs["gambar"]; ?>"></li>
            <li>nama : <?php echo $ma["nama"]; ?></li>
            <li>NIM : <?php echo $ma["NIM"]; ?></li>
            <li>jurusan : <?php echo $ma["jurusan"]; ?></li>
            <li>email : <?php echo $ma["email"]; ?></li>
            </ul> -->
            <li>
                <a href="latihan2.php?nama=<?php echo $mhs["nama"]; ?>&NIM=<?php echo $mhs["NIM"]; ?>&email=<?php echo $mhs["email"]; ?>&jurusan=<?php echo $mhs["jurusan"]; ?>&gambar=<?php echo $mhs["gambar"] ?>"><?php echo $mhs["nama"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>