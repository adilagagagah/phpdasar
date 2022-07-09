<?php

$seluruh_mahasiswa = [
    ["Gagah Pusoko", "24050121130050", "Statistika", "gagahadilaga6124@gmail.com"],
    ["Gagah Pusoko", "24050121130050", "Statistika", "gagahadilaga6124@gmail.com"],
    ["Gagah Pusoko", "24050121130050", "Statistika", "gagahadilaga6124@gmail.com"]

]

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

    <?php foreach ($seluruh_mahasiswa as $mahasiswa) : ?>
        <ul>
            <?php foreach ($mahasiswa as $data_mhs) : ?>
                <li><?php echo $data_mhs; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>

</body>

</html>