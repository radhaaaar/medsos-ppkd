<?php
$anggota = mysqli_query($koneksi, "SELECT*FROM anggota ORDER BY id DESC");
if (isset($_POST['tambah'])) {
    $nama_anggota = $_POST['nama_anggota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($koneksi, "INSERT INTO anggota (nama_anggota,telepon,email,alamat) 
    VALUES('$nama_anggota','$telepon','$email','$alamat')");
    header("location:?pg=anggota&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editAnggota = mysqli_query($koneksi, "SELECT*FROM anggota WHERE id ='$id'");
$rowAnggota = mysqli_fetch_assoc($editAnggota);

if (isset($_POST['edit'])) {
    $nama_anggota = $_POST['nama_anggota'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];


    $update = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$nama_anggota',telepon='$telepon', email = '$email', alamat='$alamat' WHERE id='$id'");
    header("location:?pg=anggota&ubah=berhasil");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'");
    header("location:?pg=anggota&hapus=berhasil");
}

?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Kategori</legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Anggota</label>
                        <input type="text" class="form-control" name="nama_anggota" placeholder="masukan nama anggota"
                            value="<?php echo isset($_GET['edit']) ? $rowAnggota['nama_anggota'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input type="text" class="form-control" name="telepon" placeholder="masukan no telepon"
                            value="<?php echo isset($_GET['edit']) ? $rowAnggota['telepon'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="masukan email"
                            value="<?php echo isset($_GET['edit']) ? $rowAnggota['email'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="masukan Alamat"
                            value="<?php echo isset($_GET['edit']) ? $rowAnggota['alamat'] : '' ?>">
                    </div>
                    <div>
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>"
                            type="submit" name="tambah" class="btn btn-primary w-100">submit</button>
                    </div>
        </div>
        </form>
        </fieldset>
    </div>
</div>
</div>