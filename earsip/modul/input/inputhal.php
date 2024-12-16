<?php
include('config/koneksi.php');

// Fungsi untuk mencegah SQL Injection
function filter_input_data($data) {
    global $koneksi;
    return mysqli_real_escape_string($koneksi, $data);
}

// Menyimpan atau memperbarui data
if (isset($_POST['bsimpan']) || isset($_POST['update'])) {
    $no_box = filter_input_data($_POST['no_box']);
    $kegiatan = filter_input_data($_POST['kegiatan']);
    $tahun = filter_input_data($_POST['tahun']);
    $penyedia = filter_input_data($_POST['penyedia']);
    $buku = filter_input_data($_POST['buku']);
    $jumlah = filter_input_data($_POST['jumlah']);
    $keterangan = filter_input_data($_POST['keterangan']);
    
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $query = "UPDATE tbl_kegiatan SET no_box = '$no_box', kegiatan = '$kegiatan', tahun = '$tahun', penyedia = '$penyedia', buku = '$buku', jumlah = '$jumlah', keterangan = '$keterangan' WHERE id_kegiatan = '$id'";
        $message = 'Data Berhasil Diperbarui';
    } else {
        $query = "INSERT INTO tbl_kegiatan (no_box, kegiatan, tahun, penyedia, buku, jumlah, keterangan) VALUES ('$no_box', '$kegiatan', '$tahun', '$penyedia', '$buku', '$jumlah', '$keterangan')";
        $message = 'Data Berhasil Disimpan';
    }

    $result = mysqli_query($koneksi, $query);
    echo $result ? "<script>alert('$message'); document.location='?haladmin=arsiphal';</script>" : "<script>alert('Gagal Menyimpan Data');</script>";
}

// Mengambil data untuk form Edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tbl_kegiatan WHERE id_kegiatan = '$id'"));
}

// Hapus data berdasarkan ID
if (isset($_GET['hapus_id']) && is_numeric($_GET['hapus_id'])) {
    $id_hapus = $_GET['hapus_id'];
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_kegiatan WHERE id_kegiatan = '$id_hapus'");
    echo $hapus ? "<script>alert('Data Berhasil Dihapus'); document.location='?haladmin=arsiphal';</script>" : "<script>alert('Gagal Menghapus Data');</script>";
}
?>
<div class="card mt-1">
    <div class="card-header text-white bg-info">Input Data</div>
    <div class="card-body">
        <form method="post">
            <?php 
            $fields = ['no_box', 'kegiatan', 'tahun', 'penyedia', 'buku', 'jumlah', 'keterangan'];
            foreach ($fields as $field) { 
                $value = isset($data[$field]) ? $data[$field] : ''; 
            ?>
            <div class="form-group">
                <label for="<?= $field ?>"><?= ucfirst(str_replace('_', ' ', $field)) ?></label>
                <input type="text" class="form-control" id="<?= $field ?>" name="<?= $field ?>" value="<?= $value ?>" required>
            </div>
            <?php } ?>
            <button type="submit" name="<?= isset($data) ? 'update' : 'bsimpan' ?>" class="btn btn-primary"><?= isset($data) ? 'Update' : 'Simpan' ?></button>
            <button type="reset" class="btn btn-danger">Batal</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
