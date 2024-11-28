<?php
$kategori = mysqli_query($koneksi, "SELECT*FROM kategori ORDER BY id DESC");
if (isset($_POST['tambah'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $insert = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) 
    VALUES('$nama_kategori')");
    header("location:?pg=kategori&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editKategori = mysqli_query($koneksi, "SELECT*FROM kategori WHERE id ='$id'");
$rowKategori = mysqli_fetch_assoc($editKategori);

if (isset($_POST['edit'])) {
    $nama_kategori = $_POST['nama_kategori'];


    $update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id='$id'");
    header("location:?pg=kategori&ubah=berhasil");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id'");
    header("location:?pg=kategori&hapus=berhasil");
}

?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Kategori</legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="masukan nama kategori"
                            value="<?php echo isset($_GET['edit']) ? $rowKategori['nama_kategori'] : '' ?>">
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