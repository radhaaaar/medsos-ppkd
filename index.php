<?php
ob_start();
ob_clean();
session_start();
if (empty($_SESSION['NAMA'])) {
    header("location:login.php?acces=failed");
}

include 'koneksi.php';

?>
<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Perpustakan</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        .cover {

            height: 200px;
        }

        .cover img {
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<div>
    <div class="container">
        <?php include 'inc/navbar.php'; ?>
        <div class="content">
            <?php if (isset($_GET['pg'])) {
                if (file_exists('content/' . $_GET['pg'] . '.php')) {
                    include 'content/' . $_GET['pg'] . '.php';
                }
            } else {
                include 'content/dashboard.php';
            }
            ?>
        </div>
    </div>
    <footer class="text-center border-top fixed-bottom p-3"> Copyright &copy; 2024 PPKD- Jakarta Pusat.</footer>
</div>
</div>
<script src="assets/dist/js/jquery-3.7.1.min.js"></script>
<script src="assets/dist/js/moment.js"></script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
<script src="app.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>

<script>
    $("#id_peminjaman").change(function() {
        let no_peminjaman = $(this).find('option:selected').val();
        let tbody = $('tbody'),
            newRow = "";

        $.ajax({
            url: "ajax/getPeminjam.php?no_peminjaman=" + no_peminjaman,
            type: "get",
            dataType: "json",
            success: function(res) {
                $('#no_pinjam').val(res.data.no_peminjaman);
                $('#tgl_peminjaman').val(res.data.tgl_peminjaman);
                $('#tgl_pengembalian').val(res.data.tgl_pengembalian);
                $('#nama_anggota').val(res.data.nama_anggota);
                console.log(res);

                let tanggal_kembali = new moment(res.data.tgl_pengembalian);
                let tanggal_dikembalikan = new moment(2024 - 10 - 21);
                let selisih = tanggal_di_kembalikan.diff(tanggal_kembali, "days");
                let biaya_denda = 1000000;
                let totalDenda = selisih * biaya_denda;
                $('denda').val(totalDenda);

                $.each(res.detail_peminjaman, function(key, val) {
                    newRow += "<tr>";
                    newRow += "<td>" + val.nama_buku + "</td>";
                    newRow += "</tr>";
                    console.log(val.nama_buku);

                });
                tbody.html(newRow);


            }
        });

    });
</script>

</body>

</html>