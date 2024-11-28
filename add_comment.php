<?php
require_once "koneksi.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id'];
    $statusId = $_POST['status_id'];
    $commentText = mysqli_real_escape_string($koneksi, $_POST['comment_text']);

    if (!empty($commentText) && !empty($statusId)) {
        $query = "INSERT INTO comments (status_id,user_id,comment_text) VALUES ('$statusId','$userId','$commentText' )";

        if (mysqli_query($koneksi, $query)) {
            echo json_encode(["status_id" => "success", "message" => "komentar berhasi ditambah "]);
        } else {
            echo json_encode(["status" => "error", "message" => "komentar gagal ditambah" . mysqli_error($koneksi)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Komentar tidak boleh kosong"]);
    }
    exit();
}
