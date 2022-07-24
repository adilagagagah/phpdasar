<?php 

session_start();

// hilangkan session (cara 1) : bikin global variabel session jadi array kosong
$_SESSION = [];

// hilangkan session (cara 2)
session_unset();

// hilangkan session (cara 3)
session_destroy();

// kembali ke halaman login
header("Location: login.php");
exit;

?>