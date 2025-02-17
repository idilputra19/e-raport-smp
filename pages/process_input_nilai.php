<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'guru') {
    header("Location: ../login.php");
}
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $siswa_id = $_POST['siswa_id'];
    $mata_pelajaran_id = $_POST['mata_pelajaran_id'];
    $nilai = $_POST['nilai'];

    $stmt = $conn->prepare("INSERT INTO nilai (siswa_id, mata_pelajaran_id, nilai) VALUES (?, ?, ?)");
    $stmt->bind_param("iid", $siswa_id, $mata_pelajaran_id, $nilai);

    if ($stmt->execute()) {
        echo "Nilai berhasil diinput.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>