<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'kepala_sekolah') {
    header("Location: ../login.php");
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Akademik</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Laporan Akademik</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Rata-rata Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT kelas.nama_kelas, AVG(nilai.nilai) as rata_rata 
                                       FROM nilai 
                                       JOIN siswa ON nilai.siswa_id = siswa.id 
                                       JOIN kelas ON siswa.kelas_id = kelas.id 
                                       GROUP BY kelas.nama_kelas");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama_kelas']}</td>
                            <td>{$row['rata_rata']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>