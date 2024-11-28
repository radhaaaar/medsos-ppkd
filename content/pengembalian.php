<?php
$query = mysqli_query($koneksi, "SELECT peminjaman.no_peminjaman, pengembalian. *
FROM pengembalian LEFT JOIN peminjaman ON peminjaman.id = pengembalian.id_peminjaman
ORDER BY id DESC");
?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?> Data Pengembalian</legend>
                <div class="butten-action">
                    <a href="?pg=tambah-pengembalian" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>Tambah</a>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Peminjaman</th>
                                <th>Status</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($query)):
                                ?>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['no_peminjaman'] ?></td>
                                    <td><?php echo date('status') ?></td>
                                    <td><?php echo $row['denda'] ?></td>


                                    <td>
                                        <a id="edit-kategori" href="?pg=tambah-pengembalian&detail=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Detail
                                        </a>
                                        <a href="?pg=tambah-pengembalian&delete=<?php echo $row['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">DELETE </a>
                                    </td>
                            </tr>
                        <?php endwhile ?>
                        </tbody>
                </div>
            </fieldset>
        </div>
    </div>
</div>