<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id']);
    $judul = trim($_POST['judul']);
    $tahun = trim($_POST['tahun']);
    $rating = trim($_POST['rating']);

    if ($judul && $tahun && $rating) {
        $stmt = $pdo->prepare("INSERT INTO data_film (ID, Judul, Tahun, Rating) VALUES (?, ?, ?, ?)");
        $stmt->execute([$id, $judul, $tahun, $rating]);
        header("Location: index.php");
        exit;
    } else {
        $error = "Semua field wajib diisi!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Data Film</h1>
        <div class="card mb-4">
            <div class="card-header">
                Tambah data
            </div>
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID :</label>
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul:</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun:</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" required>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating:</label>
                        <input type="number" class="form-control" id="rating" name="rating" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <a href="index.php" class="btn btn-secondary mt-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>