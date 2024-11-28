<?php
$user = mysqli_query($koneksi, "SELECT*FROM user ORDER BY id DESC");
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    $insert = mysqli_query($koneksi, "INSERT INTO user (nama,email,password,jenis_kelamin,telepon) 
    VALUES('$nama','$email','$password','$jenis_kelamin','$telepon')");
    header("location:?pg=user&tambah=berhasil");
}
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query($koneksi, "SELECT*FROM user WHERE id ='$id'");
$rowEdit = mysqli_fetch_assoc($editUser);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    if ($_POST['password']) {
        $password = sha1($_POST['password']);
    } else {
        $password = $rowEdit['password'];
    }
    //$password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    $update = mysqli_query($koneksi, "UPDATE user SET nama='$nama', email='$email', 
    password='$password', jenis_kelamin='$jenis_kelamin', telepon='$telepon' WHERE id='$id'");
    header("location:?pg=user&ubah=berhasil");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
    header("location:?pg=user&hapus=berhasil");
}

?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> user</legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="masukan nama anda"
                            value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">email</label>
                        <input type="email" class="form-control" name="email" placeholder="masukan email anda"
                            value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                        <div class="mb-3">
                            <label for="" class="form-label">passowrd</label>
                            <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                        </div>
                        <div class="mb-3 p-2">
                            <label for="">Jenis Kelamin</label><br>
                            <input type="radio" name="jenis_kelamin"
                                value="Laki-laki" <?php echo isset($_GET['edit']) ? $rowEdit['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' : '' ?>> Laki-laki <br>
                            <input type="radio" name="jenis_kelamin"
                                value="Perempuan" <?php echo isset($_GET['edit']) ? $rowEdit['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' : '' ?>>Perempuan <br>
                        </div>
                        <div class="mb-3 p-1">
                            <input type="text" name="telepon" placeholder="Masukan Telepon Anda"
                                value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : '' ?>"> telepon <br>
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