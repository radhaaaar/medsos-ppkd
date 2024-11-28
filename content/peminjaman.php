<?php
$query = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman. *
FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota
WHERE deleted_at = 0 ORDER BY id DESC");
?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?> Data Peminjaman</legend>
                <div class="butten-action">
                    <a href="?pg=tambah-peminjaman" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>Tambah</a>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>No Peminjaman</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
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
                                    <td><?php echo $row['nama_anggota'] ?></td>
                                    <td><?php echo date('D, d m Y', strtotime($row['no_peminjaman'])) ?></td>
                                    <td><?php echo date('D, d m Y', strtotime($row['tgl_peminjaman'])) ?></td>
                                    <td><?php echo $row['tgl_pengembalian'] ?></td>
                                    <td><?php echo $row['status'] ?></td>


                                    <td>
                                        <a id="edit-kategori" href="?pg=tambah-peminjaman&detail=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Detail
                                        </a>
                                        <a href="?pg=tambah-peminjaman&delete=<?php echo $row['id'] ?>"
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