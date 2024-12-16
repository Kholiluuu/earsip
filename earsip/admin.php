<?php

session_start(); // Mulai sesi

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    echo "<script>
        alert('Silakan login terlebih dahulu.');
        window.location.href = 'index.php';
    </script>";
    exit();
}
include "config/koneksi.php";
include "headerhal.php";
include "contenthal.php";
include "template/footer.php";
?>