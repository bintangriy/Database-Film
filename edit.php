<?php
require 'config.php';

$id_lama = isset($_GET['id']) ? intval($_GET['id']) : 0;
$stmt = $pdo->prepare("SELECT * FROM data_film WHERE ID = ?");
$stmt->execute([$id_lama]);
$film = $stmt->fetch();

if (!$film) {
    echo "<div class='alert alert-danger'>Data film tidak ditemukan.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_baru = trim($_POST['id']);
    $judul = trim($_POST['judul']);
    $tahun = trim($_POST['tahun']);
    $rating = trim($_POST['rating']);

    if ($id_baru && $judul && $tahun && $rating) {
        $stmt = $pdo->prepare("UPDATE data_film SET ID = ?, Judul = ?, Tahun = ?, Rating = ? WHERE ID = ?");
        $stmt->execute([$id_baru, $judul, $tahun, $rating, $id_lama]);
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
    <title>Edit Data Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Data Film</h1>
        <div class="card mb-4">
            <div class="card-header">
                Edit data
            </div>
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" name="id" id="id" class="form-control" value="<?= htmlspecialchars($film['ID']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="<?= htmlspecialchars($film['Judul']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control" value="<?= htmlspecialchars($film['Tahun']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" name="rating" id="rating" class="form-control" value="<?= htmlspecialchars($film['Rating']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>