<?php
$kategori = mysqli_query($koneksi, "SELECT*FROM kategori ORDER BY id DESC");
?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?> Data Kategori</legend>
                <div class="butten-action">
                    <a href="?pg=tambah-kategori" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>Tambah</a>
                    <a href="" class="btn btn-primary">Recycle</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                while ($rowKategori = mysqli_fetch_assoc($kategori)):
                                ?>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowKategori['nama_kategori'] ?></td>

                                    <td>
                                        <a id="edit-kategori" href="?pg=tambah-kategori&edit=<?php echo $rowKategori['id'] ?>" class="btn btn-success btn-sm">EDIT
                                        </a>
                                        <a href="?pg=tambah-kategori&delete=<?php echo $rowKategori['id'] ?>"
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