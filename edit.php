<?php
require_once 'database.php';

$db = new Database();
$conn = $db->koneksiDatabase();

// Mengambil data mahasiswa yang akan diedit
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id_edit = $_GET['id'];
    $query = "SELECT * FROM mahasiswa WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("i", $id_edit);
    $statement->execute();
    $result = $statement->get_result();
    $data_edit = $result->fetch_assoc();
}

// LMenyimpan data yang diedit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan'])) {
    $id_edit = $_POST['id_edit'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];

    $query = "UPDATE mahasiswa SET nama = ?, alamat = ?, umur = ? WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param("ssii", $nama, $alamat, $umur, $id_edit);

    if ($statement->execute()) {
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Edit Mahasiswa</h1>
        <form method="POST" action="edit.php" class="mb-3">
            <input type="hidden" name="id_edit" value="<?php echo $data_edit['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data_edit['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $data_edit['alamat']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur:</label>
                <input type="number" name="umur" id="umur" class="form-control" value="<?php echo $data_edit['umur']; ?>" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
        <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
    </div>

</body>
</html>
