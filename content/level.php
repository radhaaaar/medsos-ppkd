<?php
$level = mysqli_query($koneksi, "SELECT*FROM level ORDER BY id DESC");
?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?> Data Level</legend>
                <div class="butten-action">
                    <a href="?pg=tambah-level" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>Tambah</a>
                    <a href="" class="btn btn-primary">Recycle</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                while ($rowLevel = mysqli_fetch_assoc($level)):
                                ?>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowLevel['nama_level'] ?></td>

                                    <td>
                                        <a id="edit-level" href="?pg=tambah-level&edit=<?php echo $rowLevel['id'] ?>" class="btn btn-success btn-sm">EDIT
                                        </a>
                                        <a href="?pg=tambah-level&delete=<?php echo $rowLevel['id'] ?>"
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