# Praktikum 5: Pemodelan Relasi ORM (Laravel 12)

**Tugas 2 - Laporan Praktikum Kelompok 8** | Kelas 3 | Mata kuliah Pengembangan Web
Universitas Mega Buana Palopo | Tahun akademik 2026/2027

| No | Nama | NIM |
|---|---|---|
| 1 | Azarya Anugrah R. | IK2511039 |
| 2 | Citra Meisya Tandai | IK2511062 |
| 3 | Munawwarah | IK2511046 |
| 4 | Satriah Kahar Djabal Tira | IK2511064 |
| 5 | Vivin Dwi Agra | IK2511012 |

## Isi proyek

1. **Praktikum utama:** portal akademik (mahasiswa, profil, program studi, kelas)
   - One-to-One: mahasiswa dan profil
   - One-to-Many: program studi dan mahasiswa
   - Many-to-Many: mahasiswa dan kelas (pivot `course_student`)
2. **Tugas pengembangan:** sistem perpustakaan (anggota, kartu, kategori, buku, peminjaman)
   - One-to-One: `members` dan `member_cards`
   - One-to-Many: `categories` dan `books`
   - Many-to-Many: `members` dan `books` lewat `loans` (atribut pivot `status` dan `due_date`)
3. **Laporan PDF** dan bukti pengujian ada di folder `laporan/`.

## Lingkungan

Laravel 12.70.2, PHP 8.3.30, MySQL (Laragon), Windows.

## Menjalankan proyek

1. `composer install`
2. Salin `.env.example` menjadi `.env`, lalu jalankan `php artisan key:generate`
3. Buat database `portal_orm`, lalu atur `DB_*` di `.env`
   (`SESSION_DRIVER=file`, `CACHE_STORE=file`, `QUEUE_CONNECTION=sync`)
4. `php artisan migrate`
5. `php artisan db:seed --class=OrmDemoSeeder`
6. `php artisan db:seed --class=PerpustakaanSeeder`
7. `php artisan serve`, lalu buka `http://127.0.0.1:8000/praktikum/mahasiswa`

## Hasil pengujian

Pengujian U01 sampai U12 pada praktikum utama berstatus Lulus. Tugas pengembangan dibuktikan lewat ERD, tiga kondisi relasi, satu uji integritas negatif, dan perbandingan kueri 4 menjadi 2. Detailnya ada di laporan PDF.