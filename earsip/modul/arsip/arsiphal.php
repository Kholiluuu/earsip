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
<!-- Add Data Button -->
<a href="?haladmin=inputhal"><button class="btn btn-primary">TAMBAH DATA</button></a>

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
                        <th>Aksi</th>
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
                            <td>
                                <a href="?haladmin=inputhal&id=<?= $data['id_kegiatan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="?haladmin=inputhal&hapus_id=<?= $data['id_kegiatan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
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
