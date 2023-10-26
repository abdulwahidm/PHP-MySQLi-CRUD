<?php
require_once 'database.php';

$db = new Database();
$conn = $db->koneksiDatabase();

// Menghapus data mahasiswa berdasarkan ID
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id_hapus = $_GET['id'];
    $query = "DELETE FROM mahasiswa WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("i", $id_hapus);

    if ($statement->execute()) {
        header('Location: index.php');
    }
}
?>
