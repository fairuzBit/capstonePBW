Panduan ini menjelaskan cara menjalankan proyek ini di komputer lokal Anda menggunakan **PHP Built-in Web Server**. Metode ini cepat dan tidak memerlukan konfigurasi server yang rumit (seperti Apache/Nginx).

## Prasyarat

Pastikan PHP sudah terinstall di sistem operasi Linux Anda.
Untuk mengeceknya, buka terminal dan jalankan:

```bash
php -v

```

## Langkah-langkah Menjalankan

Ikuti langkah berikut untuk memulai server lokal:

1. **Buka Terminal**
Buka aplikasi terminal di Linux Anda.
2. **Masuk ke Direktori Proyek**
Gunakan perintah `cd` untuk masuk ke folder tempat file `index.php` ini berada.
```bash
cd /path/ke/folder/proyek-ini

```


3. **Jalankan Server PHP**
Ketik perintah berikut untuk mengaktifkan server pada port `8000`:
```bash
php -S localhost:8000

```


Jika berhasil, terminal akan menampilkan pesan seperti:
> *PHP 8.x.x Development Server (https://www.google.com/search?q=http://localhost:8000) started*


4. **Buka di Browser**
Buka browser (Chrome, Firefox, dll) dan akses alamat berikut:
[http://localhost:8000](https://www.google.com/search?q=http://localhost:8000)

## Menghentikan Server

Untuk mematikan server, kembali ke terminal tempat server berjalan, lalu tekan tombol:

**`Ctrl + C`**

## Catatan Tambahan (Troubleshooting)

* **Port Sudah Terpakai?**
Jika port `8000` sudah digunakan oleh aplikasi lain, Anda bisa menggantinya dengan angka lain (misalnya `8080` atau `3000`):
```bash
php -S localhost:8080
