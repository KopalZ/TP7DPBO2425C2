

# 🧾 Sistem Manajemen Peran — PHP Native (OOP + Prepared Statement)

Proyek ini merupakan implementasi **website berbasis PHP Native** dengan penerapan konsep **Object-Oriented Programming (OOP)** dan penggunaan **Prepared Statement** untuk seluruh interaksi database.  
Aplikasi ini dirancang sebagai sistem sederhana untuk **mengelola data Peran, Film, dan Relasi Pemeran Film**, mencakup fitur **CRUD (Create, Read, Update, Delete)** untuk setiap entitas.

---

## 🔗 Informasi Repositori

| Kategori | Detail |
| :--- | :--- |
| **Nama Repo** | `TP7DPBO2425Cxxxx` |
| **Teknologi** | PHP Native (OOP), MySQL (Prepared Statement), HTML, CSS |
| **Struktur Aplikasi** | MVC sederhana (Model - View - Controller) |
| **Database** | `db_peran` (3 tabel: film, peran, detail_peran) |

---

## 🎬 Tema Website: Sistem Manajemen Peran Film

Website ini digunakan untuk mencatat dan menampilkan daftar **film**, **peran (aktor/aktris)**, serta **hubungan antara keduanya** melalui tabel `detail_peran`.

Contoh penggunaan:
- Admin dapat menambahkan film baru beserta detail pemainnya.  
- Data peran dan film dapat diubah atau dihapus.  
- Setiap peran dikaitkan ke film melalui *foreign key* `id_film`.

---

## 🗃️ Struktur Database

### 1️⃣ Tabel `film`

| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id_film` | INT (PK, AUTO_INCREMENT) | ID unik untuk film |
| `judul` | VARCHAR(100) | Judul film |
| `genre` | VARCHAR(50) | Jenis/genre film |
| `tahun_rilis` | INT | Tahun rilis film |

### 2️⃣ Tabel `peran`

| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id_peran` | INT (PK, AUTO_INCREMENT) | ID unik untuk peran |
| `nama` | VARCHAR(100) | Nama aktor/aktris |
| `usia` | INT | Usia aktor/aktris |
| `negara_asal` | VARCHAR(50) | Negara asal aktor/aktris |

### 3️⃣ Tabel `detail_peran`

| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id_detail` | INT (PK, AUTO_INCREMENT) | ID unik untuk detail relasi |
| `id_film` | INT (FK → film.id_film) | Relasi ke film |
| `id_peran` | INT (FK → peran.id_peran) | Relasi ke peran |
| `nama_karakter` | VARCHAR(100) | Nama karakter dalam film |

---

## 🧩 Fitur Utama (CRUD per Entitas)

| Entitas | Fitur | Deskripsi |
| :--- | :--- | :--- |
| **Film** | Create, Read, Update, Delete | Kelola data film seperti judul, genre, dan tahun rilis. |
| **Peran** | Create, Read, Update, Delete | Kelola data aktor/aktris. |
| **Detail Peran** | Create, Read, Update, Delete | Hubungkan aktor dengan film dan karakter yang diperankan. |

---

## 🏗️ Struktur Folder Proyek

