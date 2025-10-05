<?php

require 'config.php';

$stmt = $pdo->query("SELECT ID, Judul, Tahun, Rating FROM data_film");
$films = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Film</h1>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Film</a>
        <div class="card mb-4">
            <div class="card-header">
                <h3>Daftar Film</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Rating</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($films) > 0): ?>
                            <?php foreach ($films as $film): ?>
                                <tr>
                                    <td><?= htmlspecialchars($film['ID']) ?></td>
                                    <td class="judul"><?= htmlspecialchars($film['Judul']) ?></td>
                                    <td><?= htmlspecialchars($film['Tahun']) ?></td>
                                    <td><?= htmlspecialchars($film['Rating']) ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $film['ID'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="hapus.php?id=<?= $film['ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus film ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Data film tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>