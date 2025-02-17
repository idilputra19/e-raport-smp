<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage School Data</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Manage School Data</h2>
        <a href="add_school_data.php" class="btn btn-primary">Add School Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Sekolah</th>
                    <th>Alamat</th>
                    <th>NPSN</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT id, nama_sekolah, alamat, npsn FROM sekolah");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama_sekolah']}</td>
                            <td>{$row['alamat']}</td>
                            <td>{$row['npsn']}</td>
                            <td>
                                <a href='edit_school_data.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                                <a href='delete_school_data.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>