<?php
require_once __DIR__ . '/../config/db.php';

class Asrama {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->conn;
    }

    // Tampilkan semua data asrama
    public function getAll() {
        $query = "SELECT * FROM asrama";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Ambil 1 data berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM asrama WHERE id_asrama = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Tambah asrama
    public function create($nama, $kepala) {
        $query = "INSERT INTO asrama (nama_asrama, kepala_asrama) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $nama, $kepala);
        return $stmt->execute();
    }

    // Update data asrama
    public function update($id, $nama, $kepala) {
        $query = "UPDATE asrama SET nama_asrama = ?, kepala_asrama = ? WHERE id_asrama = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $nama, $kepala, $id);
        return $stmt->execute();
    }

    // Hapus asrama
    public function delete($id) {
        $query = "DELETE FROM asrama WHERE id_asrama = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
