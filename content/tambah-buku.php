<?php
$buku = mysqli_query($koneksi, "SELECT*FROM buku ORDER BY id DESC");
if (isset($_POST['tambah'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang = $_POST['pengarang'];
    $id_kategori = $_POST['id_kategori'];

    $insert = mysqli_query($koneksi, "INSERT INTO buku (nama_buku,penerbit,tahun_terbit,pengarang,id_kategori) 
    VALUES('$nama_buku','$penerbit','$tahun_terbit','$pengarang',$id_kategori)");
    header("location:?pg=buku&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editBuku = mysqli_query($koneksi, "SELECT*FROM buku WHERE id ='$id'");
$rowEdit = mysqli_fetch_assoc($editBuku);

if (isset($_POST['edit'])) {
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang = $_POST['pengarang'];
    $id_kategori = $_POST['id_kategori'];


    $update = mysqli_query($koneksi, "UPDATE buku SET nama_buku='$nama_buku', penerbit='$penerbit', 
    tahun_terbit='$tahun_terbit', pengarang='$pengarang', id_kategori='$id_kategori' WHERE id='$id'");
    header("location:?pg=buku&ubah=berhasil");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
    header("location:?pg=buku&hapus=berhasil");
}

$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");


?>
<div class="mt-5 container">
    <div class="row">
        <div class="col-sm-12">
            <fieldset class="border p-3 border-black border-2">
                <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kategori</label>
                        <select name="id_kategori" id="" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <?php while ($rowKategori = mysqli_fetch_assoc($queryKategori)): ?>
                                <option <?php echo isset($_GET['edit']) ? ($rowKategori['id'] == $rowEdit['id_kategori'] ? 'selected' : '') : ''
                                        ?> value="<?php echo $rowKategori['id'] ?>"><?php echo $rowKategori['nama_kategori'] ?></option>
                            <?php endwhile ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" name="nama_buku" placeholder="masukan nama buku"
                            value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_buku'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="masukan penerbit"
                            value="<?php echo isset($_GET['edit']) ? $rowEdit['penerbit'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun_terbit" placeholder="masukan tahun penerbit"
                            value="<?php echo isset($_GET['edit']) ? $rowEdit['tahun_terbit'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="masukan nama pengarang"
                            value="<?php echo isset($_GET['edit']) ? $rowEdit['pengarang'] : '' ?>">
                    </div>
        </div>
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