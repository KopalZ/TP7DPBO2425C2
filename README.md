# Janji
Saya Naufal Zahid dengan NIM 2405787 mengerjakan TP 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# 🧙‍♂️ Sistem Manajemen Asrama Hogwarts — PHP Native (OOP + Prepared Statement)

Proyek ini merupakan implementasi website berbasis PHP Native dengan penerapan konsep Object-Oriented Programming (OOP) serta penggunaan Prepared Statement untuk seluruh interaksi dengan database.
Aplikasi ini dirancang untuk mengelola data Asrama, Peran, dan Anggota Hogwarts, dengan fitur utama CRUD (Create, Read, Update, Delete) di setiap entitas.

---

## 🔗 Informasi Repositori

| Kategori | Detail |
| :--- | :--- |
| **Nama Repo** | `TP7DPBO2425C2` |
| **Database** | `db_harrypotter` (3 tabel: film, peran, detail_peran) |

---

## 🎬 Tema Website: Sistem Manajemen Asrama Hogwarts

Website ini digunakan untuk mencatat dan menampilkan data asrama di Hogwarts, peran anggota, serta hubungan antar data.
Setiap anggota memiliki peran tertentu dan tergabung dalam satu asrama.

Contoh penggunaan:
- Admin dapat menambahkan data asrama baru dan kepala asramanya.
- Admin dapat menambahkan anggota baru dan menentukan asrama serta perannya.
- Data asrama, peran, maupun anggota dapat diubah dan dihapus dengan mudah.

---

## 🗃️ Struktur Database

### 1️⃣ Tabel `film`

| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id_asrama` | INT (PK, AUTO_INCREMENT) | ID unik untuk asrama |
| `nama_asrama` | VARCHAR(100) | Nama asrama (misal: Gryffindor, Slytherin) |
| `kepala_asrama` | VARCHAR(100) | Nama kepala asrama |

### 2️⃣ Tabel `peran`

| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id_peran` | INT (PK, AUTO_INCREMENT) | ID unik untuk peran |
| `nama` | VARCHAR(100) | Nama peran (misal: Prefect, Ketua Asrama, Murid biasa) |

### 3️⃣ Tabel `anggota`

| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id_anggota` | INT (PK, AUTO_INCREMENT) | ID unik untuk anggota |
| `nama` | VARCHAR(100) | Nama anggota Hogwarts |
| `id_asrama` | INT (FK → asrama.id_asrama) | Relasi ke tabel asrama |
| `id_peran` | INT (FK → peran.id_peran) | Relasi ke tabel peran |
| `tanggal_masuk` | DATE | Tanggal masuk ke Hogwarts |

---

## 🧩 Fitur Utama (CRUD per Entitas)

| Entitas | Fitur | Deskripsi |
| :--- | :--- | :--- |
| **Asrama** | Create, Read, Update, Delete | Kelola data nama asrama dan kepala asrama. |
| **Peran** | Create, Read, Update, Delete | Kelola daftar peran di Hogwarts. |
| **Anggota** | Create, Read, Update, Delete | Kelola data anggota dan relasinya ke asrama serta peran. |

---

## 🏗️ Struktur Folder Proyek

```bash
  TP7/
  ├── Class/
  │   ├── Asrama.php
  │   ├── Anggota.php
  │   └── Peran.php
  │
  ├── config/
  │   └── DB.php
  │
  ├── database/
  │   └── db_harrypotter.sql
  │
  ├── view/
  │   ├── asrama.php
  │   ├── anggota.php
  │   └── peran.php
  │
  ├── index.php
  └── style.css
```

---

## Flow / Alur Program
### 1. index.php
- Berfungsi sebagai halaman utama untuk navigasi antar tabel.
- Menggunakan parameter `page` pada URL (`?page=asrama`, `?page=peran`, `?page=anggota`) untuk menampilkan view yang sesuai.

### 2. class
- Berisi representasi tiap entitas database dalam bentuk class OOP PHP.
- Masing-masing memiliki fungsi `getAllData()`, `addData()`, `updateData()`, dan `deleteData()`.
  
### 3. config/db.php
- Mengatur koneksi ke database MySQL.
- Koneksi digunakan oleh seluruh class untuk operasi CRUD.

### 4. view/
- Menyediakan tampilan (form & tabel) untuk tiap tabel:
  - `asrama.php` untuk data asrama
  - `peran.php` untuk data peran
  - `anggota.php` untuk data anggota (relasi antar tabel ditampilkan dalam bentuk join)
- Data ditampilkan dalam bentuk tabel dengan nomor urut dinamis (bukan ID database).

### 5. style.css
- Mengatur tampilan keseluruhan website agar lebih rapi dan konsisten antar halaman.

---
