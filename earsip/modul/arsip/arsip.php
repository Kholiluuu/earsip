<?php
include('config/koneksi.php');

// Filter input and prevent SQL injection
function filter_input_data($data) {
    global $koneksi;
    return mysqli_real_escape_string($koneksi, $data);
}

// Handle form submission (save/update)
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
        $query = "UPDATE tbl_kegiatan SET no_box='$no_box', kegiatan='$kegiatan', tahun='$tahun', penyedia='$penyedia', buku='$buku', jumlah='$jumlah', keterangan='$keterangan' WHERE id_kegiatan='$id'";
        $message = 'Data Berhasil Diperbarui';
    } else {
        $query = "INSERT INTO tbl_kegiatan (no_box, kegiatan, tahun, penyedia, buku, jumlah, keterangan) VALUES ('$no_box', '$kegiatan', '$tahun', '$penyedia', '$buku', '$jumlah', '$keterangan')";
        $message = 'Data Berhasil Disimpan';
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('$message'); document.location='?haladmin=arsiphal';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data');</script>";
    }
}

// Fetch data for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tbl_kegiatan WHERE id_kegiatan='$id'"));
}

// Handle deletion
if (isset($_GET['hapus_id']) && is_numeric($_GET['hapus_id'])) {
    $id_hapus = $_GET['hapus_id'];
    if (mysqli_query($koneksi, "DELETE FROM tbl_kegiatan WHERE id_kegiatan='$id_hapus'")) {
        echo "<script>alert('Data Berhasil Dihapus'); document.location='?haladmin=arsiphal';</script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data');</script>";
    }
}
?>

<style>
    .search-box { margin-top: 3rem; }
    .search-container { display: flex; flex-direction: column; }
    #searchInput { padding: 10px 15px; font-size: 16px; border: 2px solid #007bff; border-radius: 5px; width: 100%; }
    .table-responsive { overflow-x: auto; }
</style>

<!-- Search Box -->
<div class="search-box">
    <div class="search-container">
        <label for="searchInput">Search:</label>
        <input type="text" id="searchInput" placeholder="Search..." class="form-control">
    </div>
</div>

<!-- Card Section for Data Display -->
<div class="card mt-3">
    <div class="card-header text-white bg-info">Data Arsip</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Box</th>
                        <th>Kegiatan</th>
                        <th>Tahun</th>
                        <th>Penyedia</th>
                        <th>Buku</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($koneksi, "SELECT * FROM tbl_kegiatan ORDER BY id_kegiatan DESC");
                    $no = 1;
                    while ($data = mysqli_fetch_array($result)):
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['no_box'] ?></td>
                            <td><?= $data['kegiatan'] ?></td>
                            <td><?= $data['tahun'] ?></td>
                            <td><?= $data['penyedia'] ?></td>
                            <td><?= $data['buku'] ?></td>
                            <td><?= $data['jumlah'] ?></td>
                            <td><?= $data['keterangan'] ?></td>
                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Table row filter
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var filter = this.value.toUpperCase();
        var rows = document.querySelectorAll('table tbody tr');
        rows.forEach(function(row) {
            var cells = row.getElementsByTagName('td');
            row.style.display = Array.from(cells).some(cell => cell.innerText.toUpperCase().includes(filter)) ? '' : 'none';
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
