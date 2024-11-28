<?php

$queryPosting = mysqli_query($koneksi, "SELECT tweet. * FROM tweet WHERE id_user = '$id_user'");
// $rowPosting = mysqli_fetch_assoc($queryPosting);
if (isset($_POST['posting'])) {
    $content = $_POST['konten'];

    //jika gambar mau diubah
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];

        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);


        // jika extensi foto tidak ada extensi yang terdaftar di array ext
        if (!in_array($extFoto, $ext)) {
            echo "Hanya diperbolehkan file gambar dengan format png, jpg, dan jpeg.";
            die;
        } else {
            //pindahkan gambar dari tmp folder yang sudah kita dibuat
            //unlink(): mendelete file
            unlink('upload/' . $rowTweet['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);

            $insert = mysqli_query($koneksi, "INSERT INTO tweet (konten,id_user,foto) VALUES ('$content','$id_user','$nama_foto')");
        }
    } else {
        //gambar tidak mau diubah
        $insert = mysqli_query($koneksi, "INSERT INTO tweet (konten,id_user) VALUES ('$content','$id_user')");
    }
    header("location:?pg=profil&tweet=berhasil");
}
?>

<div class="row">
    <div class="col-sm-12" align="right">
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Tweet</button>
    </div>
    <div class="col-sm-12 mt-3">
        <?php while ($rowTweets = mysqli_fetch_assoc($queryPosting)): ?>
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="upload/<?php echo isset($rowUser['foto']) ? $rowUser['foto'] :
                                            '' ?>" width="100" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <?php if (isset($rowTweets['foto'])): ?>
                        <img src="upload/<?php echo $rowTweets['foto'] ?>" alt="" width="100">
                    <?php endif ?>
                    <?php echo $rowTweets['konten'] ?>
                </div>
                <!-- like -->
                <?php $idStatusnya = $rowTweets['id'];
                $selectLike = mysqli_query($koneksi, "SELECT COUNT(user_id) AS countuser FROM likes WHERE status_id= '$idStatusnya'");
                $rowLike = mysqli_fetch_assoc($selectLike);
                ?>
                <div class="status mt-1">
                    <input type="text" id="user_id_like" value="<?php echo $rowTweets['id_user'] ?>">
                    <button class="btn btn-success btn-sm" onclick="toggleLike(<?php echo $rowTweets['id']; ?>)">Like (<?php echo isset($rowLike['countuser']) ? $rowLike['countuser'] : 0 ?>)</button>
                </div>
                <div class="class-flex-grow-1 ms-3">
                    <form action="add_comment.php" method="POST">
                        <input type="text" name="status_id" value="<?php echo $rowTweets['id'] ?>">
                        <input type="text" name="user_id" value="<?php echo $rowTweets['id_user'] ?>">
                        <textarea name="comment_text" id="comment_text" class="form-control" cols="5" rows="5" placeholder="tweet balasan anda"></textarea>
                        <button class="btn btn-primary btn-sm mt-2" type="submit">kirim balasannya</button>

                        <div class="mt-2 alet" id="comment-alert" style="display:none;"></div>
                        <div class="mt-1">
                            <?php
                            if (isset($rowTweets['id']) && isset($rowTweets['id_user'])) {
                                $idStatus = $rowTweets['id'];
                                $userId = $rowTweets['id_user'];
                                $queryComment = mysqli_query($koneksi, "SELECT * FROM comments WHERE status_id='$idStatus' AND user_id='$userId'");
                                $rowCounts = mysqli_fetch_all($queryComment, MYSQLI_ASSOC);

                                foreach ($rowCounts as $rowCount) {
                            ?>
                                    <span>
                                        <pre>Komentar : <?php echo $rowCount['comment_text'] ?></pre>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        <?php endwhile ?>
        <hr>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <textarea name="konten" id="summernote" class="form-control" placeholder="apa yang sedang dibicarakan"></textarea>

                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="nama_pengguna" value="<?php echo $rowUser['nama_pengguna'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="email" name="email" value="<?php echo $rowUser['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="file" name="foto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="posting">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        function toggleLike(statusId) {
            const userId = document.getElementById('user_id_like').value;
            fetch("likes.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `status_id=${statusId}&user_id=${userId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status == "liked") {
                        alert("Liked!");
                    } else if (data.status === "unliked") {
                        alert("Unliked!");
                    }
                    location.reload();
                })
                .catch(error => console.error("Error:", error));
        }
    </script>