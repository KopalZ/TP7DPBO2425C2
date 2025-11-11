<?php
require_once '../class/Peran.php';

$peran = new Peran();

// 🟢 Tambah data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_peran'];
    $peran->create($nama);
    header("Location: peran.php");
    exit;
}

// 🟡 Update data
if (isset($_POST['update'])) {
    $id = $_POST['id_peran'];
    $nama = $_POST['nama_peran'];
    $peran->update($id, $nama);
    header("Location: peran.php");
    exit;
}

// 🔴 Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $peran->delete($id);
    header("Location: peran.php");
    exit;
}

// ✏️ Ambil data untuk edit
$editData = null;
if (isset($_GET['edit'])) {
    $editData = $peran->getById($_GET['edit']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peran Asrama</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>🎭 Data Peran Asrama</h1>
    <a href="../index.php" class="btn">⬅ Kembali</a>

    <!-- 🧾 Form tambah / edit -->
    <form method="post" class="form-container">
        <input type="hidden" name="id_peran" value="<?= $editData['id_peran'] ?? '' ?>">
        <input type="text" name="nama_peran" placeholder="Nama Peran" required
               value="<?= $editData['nama_peran'] ?? '' ?>">

        <?php if ($editData): ?>
            <button type="submit" name="update">✏️ Update</button>
            <a href="peran.php" class="btn">Batal</a>
        <?php else: ?>
            <button type="submit" name="tambah">➕ Tambah</button>
        <?php endif; ?>
    </form>

    <!-- 📋 Tabel Data -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama Peran</th>
            <th>Aksi</th>
        </tr>

        <?php
        $data = $peran->getAll();
        $no = 1;
        while ($row = $data->fetch_assoc()):
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_peran']) ?></td>
            <td>
                <a href="?edit=<?= $row['id_peran'] ?>" class="btn">✏️ Edit</a>
                <a href="?hapus=<?= $row['id_peran'] ?>" class="btn"
                   onclick="return confirm('Yakin mau hapus peran ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
