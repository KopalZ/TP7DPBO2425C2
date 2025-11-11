<?php
require_once __DIR__ . '/../config/db.php';

class Anggota {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conn;
    }

    // Tampilkan semua anggota (join biar tampil nama asrama & peran)
    public function getAll() {
        $query = "
            SELECT a.id_anggota, a.nama_anggota, asr.nama_asrama, p.nama_peran, a.tanggal_masuk
            FROM anggota a
            JOIN asrama asr ON a.id_asrama = asr.id_asrama
            JOIN peran p ON a.id_peran = p.id_peran
            ORDER BY a.id_anggota
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Ambil satu anggota
    public function getById($id) {
        $query = "SELECT * FROM anggota WHERE id_anggota = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Tambah anggota
    public function create($nama, $id_asrama, $id_peran, $tanggal) {
        $query = "INSERT INTO anggota (nama_anggota, id_asrama, id_peran, tanggal_masuk) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siis", $nama, $id_asrama, $id_peran, $tanggal);
        return $stmt->execute();
    }

    // Update anggota
    public function update($id, $nama, $id_asrama, $id_peran, $tanggal) {
        $query = "UPDATE anggota SET nama_anggota = ?, id_asrama = ?, id_peran = ?, tanggal_masuk = ? WHERE id_anggota = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("siisi", $nama, $id_asrama, $id_peran, $tanggal, $id);
        return $stmt->execute();
    }

    // Hapus anggota
    public function delete($id) {
        $query = "DELETE FROM anggota WHERE id_anggota = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
