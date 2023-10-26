# TASK 

Membuat program sederhana untuk input dan menghapus data mahasiswa.
Ketentuan program yang harus dibuat adalah sebagai berikut: 
Buatlah database di MYSQL dan tabel untuk menyimpan data mahasiswa, 
dengan namadatabase (db_akademik) dan nama tabel (mahasiswa) dengan
field sebagai berikut:

``` bash 
id (dibuatauto_increment),
nama, 
alamat,
umur
```
Membuat 4 file script php dengan petunjuk sebagai berikut
database.php (untuk script koneksi ke database MYSQL) sekaligus dibuat sebagai class,
dan didalamnya terdapat function koneksi_database, tampil, simpan.

# SOLVE

1. Buat database baru di mysql dengan nama `db_akademik`

2. Buat struktur table `mahasiswa` dalam database `db_akademik` dengan kolom-kolom sebagai berikut:
(query file sql terlampir dalam repository ini)

```bash
id (auto-increment, primary key)
nama (varchar)
alamat (varchar)
umur (integer) 
```
3. Buat file "database.php" untuk mengatur koneksi ke database MySQL.
Buat class Database dengan function koneksi_database, tampil, dan simpan untuk mengelola koneksi dan operasi CRUD (Create, Read, Update, Delete) ke tabel "mahasiswa".

4. Buat file "index.php" sebagai tampilan utama.
Tampilkan data mahasiswa dari database menggunakan fungsi tampil pada class Database yang telah dibuat.
Tambahkan tombol-tombol untuk mengedit dan menghapus data pada kolom aksi.

5. Buat file "input.php" sebagai halaman untuk memasukkan data mahasiswa baru.
Tambahkan formulir input untuk nama, alamat, dan umur.
Gunakan fungsi simpan pada class Database untuk menyimpan data baru ke dalam database.

6. Buat file "edit.php" sebagai halaman untuk mengedit data mahasiswa.
Tampilkan data mahasiswa yang akan diedit berdasarkan ID.
Izinkan pengguna mengubah nama, alamat, dan umur.
Gunakan class Database untuk menyimpan perubahan data.

7. Buat file "delete.php" untuk mengelola logika penghapusan data berdasarkan ID.
Tambahkan tombol "Hapus" pada halaman "index.php" yang mengarahkan ke "delete.php" dengan ID yang sesuai.

8. Uji coba seluruh aplikasi dengan memasukkan, mengedit, dan menghapus data mahasiswa umtuk memastikan semua fitur berfungsi dengan baik.

