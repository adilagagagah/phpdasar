<?php 

require '../functions.php';

$keyword = $_GET['keyword'];

$mahasiswa = cari($keyword);

?>

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