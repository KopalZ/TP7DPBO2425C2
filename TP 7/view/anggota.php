<?php
require_once '../class/Anggota.php';
require_once '../class/Asrama.php';
require_once '../class/Peran.php';

$anggota = new Anggota();
$asrama = new Asrama();
$peran = new Peran();

// 🟢 Tambah data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_anggota'];
    $id_asrama = $_POST['id_asrama'];
    $id_peran = $_POST['id_peran'];
    $tanggal = $_POST['tanggal_masuk'];
    $anggota->create($nama, $id_asrama, $id_peran, $tanggal);
    header("Location: anggota.php");
    exit;
}

// 🟡 Update data
if (isset($_POST['update'])) {
    $id = $_POST['id_anggota'];
    $nama = $_POST['nama_anggota'];
    $id_asrama = $_POST['id_asrama'];
    $id_peran = $_POST['id_peran'];
    $tanggal = $_POST['tanggal_masuk'];
    $anggota->update($id, $nama, $id_asrama, $id_peran, $tanggal);
    header("Location: anggota.php");
    exit;
}

// 🔴 Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $anggota->delete($id);
    header("Location: anggota.php");
    exit;
}

// ✏️ Ambil data untuk edit
$editData = null;
if (isset($_GET['edit'])) {
    $editData = $anggota->getById($_GET['edit']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Asrama</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>🙋‍♂️ Data Anggota Asrama</h1>
    <a href="../index.php" class="btn">⬅ Kembali</a>

    <!-- 🧾 Form tambah / edit -->
    <form method="post" class="form-container">
        <input type="hidden" name="id_anggota" value="<?= $editData['id_anggota'] ?? '' ?>">
        <input type="text" name="nama_anggota" placeholder="Nama Anggota" required
               value="<?= $editData['nama_anggota'] ?? '' ?>">

        <select name="id_asrama" required>
            <option value="">-- Pilih Asrama --</option>
            <?php
            $asramaData = $asrama->getAll();
            while ($row = $asramaData->fetch_assoc()):
                $selected = ($editData && $editData['id_asrama'] == $row['id_asrama']) ? 'selected' : '';
                echo "<option value='{$row['id_asrama']}' $selected>{$row['nama_asrama']}</option>";
            endwhile;
            ?>
        </select>

        <select name="id_peran" required>
            <option value="">-- Pilih Peran --</option>
            <?php
            $peranData = $peran->getAll();
            while ($row = $peranData->fetch_assoc()):
                $selected = ($editData && $editData['id_peran'] == $row['id_peran']) ? 'selected' : '';
                echo "<option value='{$row['id_peran']}' $selected>{$row['nama_peran']}</option>";
            endwhile;
            ?>
        </select>

        <input type="date" name="tanggal_masuk" required
               value="<?= $editData['tanggal_masuk'] ?? '' ?>">

        <?php if ($editData): ?>
            <button type="submit" name="update">✏️ Update</button>
            <a href="anggota.php" class="btn">Batal</a>
        <?php else: ?>
            <button type="submit" name="tambah">➕ Tambah</button>
        <?php endif; ?>
    </form>

    <!-- 📋 Tabel Data -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Asrama</th>
            <th>Peran</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th>
        </tr>

        <?php
        $data = $anggota->getAll(); // join ke asrama dan peran
        $no = 1;
        while ($row = $data->fetch_assoc()):
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_anggota']) ?></td>
            <td><?= htmlspecialchars($row['nama_asrama']) ?></td>
            <td><?= htmlspecialchars($row['nama_peran']) ?></td>
            <td><?= htmlspecialchars($row['tanggal_masuk']) ?></td>
            <td>
                <a href="?edit=<?= $row['id_anggota'] ?>" class="btn">✏️ Edit</a>
                <a href="?hapus=<?= $row['id_anggota'] ?>" class="btn"
                   onclick="return confirm('Yakin mau hapus anggota ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
