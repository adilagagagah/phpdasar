<?php

// koneksi ke database 
$db = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //upload gambar
    $gambar = upload();
    if( !$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa 
                VALUES
        ('', '$nama', '$nrp', '$email', 
        '$jurusan', '$gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar di upload
    if( $error === 4 ) {
        echo "<script>
            alert('pilih gambar terlebih dahulu')        
        </script>";
    }

    // cek apakah yang di upload gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
            alert('yang anda upload bukan gambar')
        </script>";
    }

    //cek jika ukuran terlalu besar
    if( $ukuranFile > 3000000) {
        echo "<script>
            alert('ukuran gambar terlalu besar')
        </script>";
    }

    // cek apakah nama file sama, ( ubah setiap file menjadi unik)
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    // lolos pengecekan, gambar siap di upload
    move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

    return $namaFileBaru;
}



function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($db);
}

function ubah($data)
{
    global $db;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id = $id
            ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa 
    WHERE 
    nama LIKE '%$keyword%' 
    OR nrp LIKE '%$keyword%'
    OR email LIKE '%$keyword%'
    OR jurusan LIKE '%$keyword%'";

    return query($query);
}

