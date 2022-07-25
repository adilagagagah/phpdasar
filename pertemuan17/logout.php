<?php 

session_start();

// hapus session
// hilangkan session (cara 1) : bikin global variabel session jadi array kosong
$_SESSION = [];

// hilangkan session (cara 2)
session_unset();

// hilangkan session (cara 3)
session_destroy();


// hapus cookie
$_COOKIE('id', '', time() - 3600);
$_COOKIE('key', '', time() - 3600);


// setelah session dan cookie terhapus, kembali ke halaman login
header("Location: login.php");
exit;

?>