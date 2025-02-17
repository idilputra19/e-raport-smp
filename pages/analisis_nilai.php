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
    <title>Analisis Nilai</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Analisis Nilai</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Rata-rata Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT mata_pelajaran.nama_pelajaran, AVG(nilai.nilai) as rata_rata 
                                       FROM nilai 
                                       JOIN mata_pelajaran ON nilai.mata_pelajaran_id = mata_pelajaran.id 
                                       GROUP BY mata_pelajaran.nama_pelajaran");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama_pelajaran']}</td>
                            <td>{$row['rata_rata']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>