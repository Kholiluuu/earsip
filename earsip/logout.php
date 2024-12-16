<?php
session_start(); // Mulai sesi

// Hapus semua variabel sesi
$_SESSION = [];

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login dengan pesan logout
echo "<script>
    alert('Berhasil logout');
    window.location.href = 'index.php';
</script>";
exit();
?>
