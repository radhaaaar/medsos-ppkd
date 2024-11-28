<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-straight/css/uicons-bold-straight.css'>
</head>

<body>


    <div class="wrapper">

        <?php
        require_once "perpus/inc/navbar.php";
        ?>

        <div class="container mt-4 mb-3">

            <fieldset class="border rounded-3 p-3 border-black border-2">
                <legend class="float-none w-auto px-3">Tabel Buku</legend>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <button class="btn btn-primary me-2">ADD</button>
                        <button class="btn btn-secondary">RECYCLE</button>
                    </div>
                </div>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="display: flex; justify-content: space-between; align-items: center;"> No <button
                                    class="btn"><i class="fas fa-sort"
                                        style="margin-left: 5px; vertical-align: middle;"></i></button> </th>
                            <th> Kategori Buku <button class="btn"><i class="fas fa-sort"></i></button> </th>
                            <th> Lokasi Rak <i class="fas fa-sort" style="margin-left: 5px;"></i> </th>
                            <th> Judul <i class="fas fa-sort" style="margin-left: 5px;"></i></th>
                            <th> Pengarang <i class="fas fa-sort" style="margin-left: 5px;"></i></th>
                            <th> Penerbit <i class="fas fa-sort" style="margin-left: 5px;"></i></th>
                            <th> Tahun Terbit <i class="fas fa-sort" style="margin-left: 5px;"></i></th>
                            <th> Keterangan <i class="fas fa-sort" style="margin-left: 5px;"></i></th>
                            <th> Stock <i class="fas fa-sort" style="margin-left: 5px;"></i></th>
                            <th> Settings <i class="fas fa-sort" style="margin-left: 5px;"></i></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Anak-anak dan Remaja</td>
                            <td>AR.BAA-AR1</td>
                            <td>Cerita Si Ipin</td>
                            <td>Harasan</td>
                            <td>Harasan Media</td>
                            <td>2008</td>
                            <td>Buku ini untuk anak-anak</td>
                            <td>16</td>
                            <td>
                                <button class="btn"><i class="fi fi-bs-trash-can-clock"></i></button>
                                <button class="btn"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
        <?php
        require_once "perpus/inc/navbar.php";
        ?>
    </div>


    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>