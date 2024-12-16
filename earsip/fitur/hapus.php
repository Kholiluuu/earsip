<?php
// Koneksi ke database
include('config/koneksi.php');

// Cek jika id ada dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_kegiatan WHERE id_kegiatan = '$id'");

    // Cek jika query berhasil
    if ($hapus) {
        echo "<script>
                alert('Data Berhasil Dihapus');
                document.location='?hal=input';  // Mengarahkan kembali ke halaman input
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Dihapus');
              </script>";
    }
}
?>
