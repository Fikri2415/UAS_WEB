# UAS_WEB

**Kelompok 5**  
Project UAS mata kuliah Web Programming

## Deskripsi
Ini adalah project UAS Web berbasis **HTML, CSS, PHP**, dan dijalankan menggunakan **Docker**.

Struktur folder terdiri dari:
- `app/` → folder berisi file website (HTML, PHP, CSS)
- `init/` → folder inisialisasi database (jika ada)
- `docker-compose.yml` → konfigurasi Docker untuk web dan database
- `Dockerfile` → image untuk container web server

## Cara Menjalankan
1. Pastikan sudah install Docker dan Docker Compose
2. Buka terminal di folder project ini
3. Jalankan perintah:

```bash
docker-compose up --build
