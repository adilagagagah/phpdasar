<?php 

require 'functions.php';

session_start();

// cek apakah ada cookie id dan username(key)
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    // jika ada pastikan user tidak bisa mencoba masuk dengan cookie editor
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil data user dari database
    $result = mysqli_query($db, "SELECT username FROM user WHERE id = $id");
    $user = mysqli_fetch_assoc($result);

    // cek apakah username yang sudah di acak sama dengan username diacak dari database
    if($key === hash('sha256', $user['username'])) {
        // jika sama, set session login
        $_SESSION['login'] = true;
    }
}


// cek apakah session login sudah di set atau belum
if(isset($_SESSION['login'])) {
    // jika sudah, langsung masuk ke halaman index.php
    header("Location: index.php");
    exit;
}


// cek apakah tombol submit(login) sudah di klik atau belum
if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
    
    // cek apakah username ada di database
    if (mysqli_num_rows($result) === 1) {
        
        // cek apakah password yang dimasukkan user sama dengan yang di database(sudah di enkripsi) 
        $user = mysqli_fetch_assoc($result);
        if(password_verify($password, $user['password'])){
            // jika username ada dan password sama, maka set session login(masuk ke halaman index.php)
            $_SESSION['login'] = true;

            // cek apakah user centang remember me (opsi)
            if(isset($_POST['remember'])) {
                // jika centang remember me, maka buat cookie
                setcookie("id", $user['id'], time() + 60);
                setcookie("key", hash('sha256', $user['username']), time() + 60);
            }
            
            header("Location: index.php");
            exit;
        }
    }
    
    $error = true;
}


?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Halaman Login</title>
</head>

<body>
    <h1>Halaman Login</h1>

    <?php if(isset($error)): ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>

    <form action="" method="POST">

        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me :</label>
            </li>
            <li>
                <button type="submit" name="login">Login!</button>
            </li>
        </ul>

    </form>
</body>

</html>