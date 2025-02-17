<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'siswa') {
    header("Location: ../login.php");
}
include '../db.php';

$siswa_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Raport</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Cetak Raport</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT mata_pelajaran.nama_pelajaran, nilai.nilai 
                                       FROM nilai 
                                       JOIN mata_pelajaran ON nilai.mata_pelajaran_id = mata_pelajaran.id 
                                       WHERE nilai.siswa_id = $siswa_id");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama_pelajaran']}</td>
                            <td>{$row['nilai']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <button onclick="window.print()" class="btn btn-primary">Cetak Raport</button>
    </div>
</body>
</html>