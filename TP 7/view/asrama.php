<?php
require_once '../class/Asrama.php';
$asrama = new Asrama();

// 🟢 Tambah data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_asrama'];
    $kepala = $_POST['kepala_asrama'];
    $asrama->create($nama, $kepala);
    header("Location: asrama.php");
    exit;
}

// 🟡 Update data
if (isset($_POST['update'])) {
    $id = $_POST['id_asrama'];
    $nama = $_POST['nama_asrama'];
    $kepala = $_POST['kepala_asrama'];
    $asrama->update($id, $nama, $kepala);
    header("Location: asrama.php");
    exit;
}

// 🔴 Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $asrama->delete($id);
    header("Location: asrama.php");
    exit;
}

// ✏️ Ambil data untuk edit
$editData = null;
if (isset($_GET['edit'])) {
    $editData = $asrama->getById($_GET['edit']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Asrama Hogwarts</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>🏠 Data Asrama Hogwarts</h1>
    <a href="../index.php" class="btn">⬅ Kembali</a>

    <!-- 🧾 Form tambah / edit -->
    <form method="post" class="form-container">
        <input type="hidden" name="id_asrama" value="<?= $editData['id_asrama'] ?? '' ?>">
        <input type="text" name="nama_asrama" placeholder="Nama Asrama" required 
               value="<?= $editData['nama_asrama'] ?? '' ?>">
        <input type="text" name="kepala_asrama" placeholder="Kepala Asrama" required 
               value="<?= $editData['kepala_asrama'] ?? '' ?>">

        <?php if ($editData): ?>
            <button type="submit" name="update">✏️ Update</button>
            <a href="asrama.php" class="btn">Batal</a>
        <?php else: ?>
            <button type="submit" name="tambah">➕ Tambah</button>
        <?php endif; ?>
    </form>

    <!-- 📋 Tabel Data -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama Asrama</th>
            <th>Kepala Asrama</th>
            <th>Aksi</th>
        </tr>

        <?php
        $data = $asrama->getAll();
        $no = 1;
        while ($row = $data->fetch_assoc()):
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_asrama']) ?></td>
            <td><?= htmlspecialchars($row['kepala_asrama']) ?></td>
            <td>
                <a href="?edit=<?= $row['id_asrama'] ?>" class="btn">✏️ Edit</a>
                <a href="?hapus=<?= $row['id_asrama'] ?>" class="btn" 
                   onclick="return confirm('Yakin mau hapus asrama ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
