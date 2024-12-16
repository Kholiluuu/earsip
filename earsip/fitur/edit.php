<?php
// Koneksi ke database
include('config/koneksi.php');

// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_kegiatan WHERE id_kegiatan = '$id'");
    $data = mysqli_fetch_array($query);
}

// Jika form disubmit, lakukan update data
if (isset($_POST['update'])) {
    $no_box = mysqli_real_escape_string($koneksi, $_POST['no_box']);
    $kegiatan = mysqli_real_escape_string($koneksi, $_POST['kegiatan']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $penyedia = mysqli_real_escape_string($koneksi, $_POST['penyedia']);
    $buku = mysqli_real_escape_string($koneksi, $_POST['buku']);
    $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    // Query untuk update data
    $update = mysqli_query($koneksi, "UPDATE tbl_kegiatan SET 
        no_box = '$no_box',
        kegiatan = '$kegiatan',
        tahun = '$tahun',
        penyedia = '$penyedia',
        buku = '$buku',
        jumlah = '$jumlah',
        keterangan = '$keterangan'
        WHERE id_kegiatan = '$id'");

    // Cek jika berhasil
    if ($update) {
        echo "<script>
                alert('Data Berhasil Diperbarui');
                document.location='?hal=input';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Diperbarui');
              </script>";
    }
}
?>

<!-- Form Edit Data -->
<div class="card mt-3">
    <div class="card-header text-white bg-info">
        Edit Data Kegiatan
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label for="no_box">No Box</label>
                <input type="text" class="form-control" id="no_box" name="no_box" value="<?= $data['no_box'] ?>" required>
            </div>
            <!-- Form fields yang sama dengan input, pastikan data sudah ada -->
            <!-- Isi form lainnya: kegiatan, tahun, penyedia, buku, jumlah, keterangan -->

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Batal</button>
        </form>
    </div>
</div>
