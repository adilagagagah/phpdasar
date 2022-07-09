<?php 

if(
    !isset($_GET["nama"]) ||
    !isset($_GET["NIM"]) ||
    !isset($_GET["email"]) ||
    !isset($_GET["jurusan"]) ||
    !isset($_GET["gambar"])
    ) {
    header("Location: latihan1.php");
    exit;
};

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Detail Mahasiswa</title>
</head>

<body>

    <ul>
        <li><img src="img/<?php echo $_GET["gambar"]; ?>"></li>
        <li><?php echo $_GET["nama"]; ?></li>
        <li><?php echo $_GET["NIM"]; ?></li>
        <li><?php echo $_GET["jurusan"]; ?></li>
        <li><?php echo $_GET["email"]; ?></li>
    </ul>

    <a href="latihan1.php">kembali ke daftar mahasiswa</a>

</body>

</html>