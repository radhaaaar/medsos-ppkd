<?php
$user = mysqli_query($koneksi, "SELECT*FROM user ORDER BY id DESC");
?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?> Data User</legend>
                <div class="butten-action">
                    <a href="?pg=tambah-user" class="btn btn-primary"><?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>user</a>
                    <a href="" class="btn btn-primary">Recycle</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Telepon</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                while ($rowUser = mysqli_fetch_assoc($user)):

                                ?>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowUser['telepon'] ?></td>
                                    <td><?php echo $rowUser['nama'] ?> </td>
                                    <td><?php echo $rowUser['email'] ?></td>
                                    <td><?php echo $rowUser['jenis_kelamin'] ?></td>
                                    <td> <a href="?pg=tambah-user&edit=<?php echo $rowUser['id'] ?>" class="btn btn-success btn-sm">EDIT
                                        </a>
                                        <a href="?pg=tambah-user&delete=<?php echo $rowUser['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">DELETE
                                    </td>
                            </tr>
                        <?php endwhile ?>
                        </tbody>
                </div>
            </fieldset>
        </div>
    </div>
</div>