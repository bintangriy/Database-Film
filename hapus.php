<?php
require 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM data_film WHERE ID = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
