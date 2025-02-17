<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'guru') {
    header("Location: ../login.php");
}
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $siswa_id = $_POST['siswa_id'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO absensi (siswa_id, status, tanggal) VALUES (?, ?, NOW())");
    $stmt->bind_param("is", $siswa_id, $status);

    if ($stmt->execute()) {
        echo "Absensi berhasil diinput.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>