<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'guru') {
    header("Location: ../login.php");
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Input Nilai</h2>
        <form method="POST" action="process_input_nilai.php">
            <div class="form-group">
                <label for="siswa_id">Siswa</label>
                <select class="form-control" id="siswa_id" name="siswa_id" required>
                    <?php
                    $result = $conn->query("SELECT id, nama FROM siswa");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nama']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mata_pelajaran_id">Mata Pelajaran</label>
                <select class="form-control" id="mata_pelajaran_id" name="mata_pelajaran_id" required>
                    <?php
                    $result = $conn->query("SELECT id, nama_pelajaran FROM mata_pelajaran");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['nama_pelajaran']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" step="0.01" class="form-control" id="nilai" name="nilai" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>