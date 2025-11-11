<?php
require_once __DIR__ . '/../config/db.php';

class Peran {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conn;
    }

    // Tampilkan semua peran
    public function getAll() {
        $query = "SELECT * FROM peran";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Ambil satu peran berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM peran WHERE id_peran = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Tambah peran
    public function create($nama) {
        $query = "INSERT INTO peran (nama_peran) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $nama);
        return $stmt->execute();
    }

    // Update peran
    public function update($id, $nama) {
        $query = "UPDATE peran SET nama_peran = ? WHERE id_peran = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $nama, $id);
        return $stmt->execute();
    }

    // Hapus peran
    public function delete($id) {
        $query = "DELETE FROM peran WHERE id_peran = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
