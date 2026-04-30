# 🛡️ Papan Kata - Eksperimen Keamanan Web (Stored XSS)

Repository ini berisi kode sumber untuk eksperimen kerentanan **Stored Cross-Site Scripting (XSS)** dan mitigasinya menggunakan PHP Native dan MySQL. Proyek web dengan antarmuka *full-width* ini dibangun sebagai pemenuhan tugas Ujian Tengah Semester (UTS) mata kuliah Pemrograman Web.

## 🛠️ Teknologi yang Digunakan
* **Backend:** PHP Native
* **Database:** MySQL
* **Frontend:** HTML & CSS (Embedded Style)

## 🚀 Cara Menjalankan Project

1. Pastikan **XAMPP** (Apache & MySQL) sudah berjalan di komputermu.
2. repository ini ke dalam folder `htdocs`:
3. Buka phpMyAdmin (http://localhost/phpmyadmin) dan buat database baru bernama db_papan.
4. Masuk ke tab SQL dan jalankan query berikut untuk membuat tabel kata:
   ```
   CREATE TABLE kata (
  id INT(11) NOT NULL AUTO_INCREMENT,
  isi_kata TEXT NOT NULL,
  PRIMARY KEY (id)
);
    ```
5. Buka browser dan akses proyek melalui: `http://localhost/XSS_eksperiment`

## Skenario Penyerangan
  Untuk menyimulasikan celah keamanan pada form input, masukkan payload JavaScript berikut:
  ```<script>alert("Website ini udah kena hack wkwk!");</script>```
  Hasil Eksperimen: Karena sistem awal tidak memfilter input pengguna, browser akan membaca teks tersebut sebagai instruksi dan menampilkan pop-up alert secara terus-menerus setiap kali halaman dimuat ulang.
## Skenario Mitigasi (The Fix)
  Celah keamanan ini berhasil ditutup dengan mengimplementasikan dua lapis keamanan pada file PHP:
  1. mysqli_real_escape_string(): Mengamankan input sebelum disimpan ke database untuk mencegah error SQL Injection.
  2. htmlspecialchars(): Mengonversi karakter khusus HTML saat data ditampilkan ke layar, sehingga browser hanya membacanya sebagai teks biasa dan pop-up tidak lagi muncul.
