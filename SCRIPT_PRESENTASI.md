# 🎤 SCRIPT PRESENTASI SISTEM PPDB SMK BAKTI NUSANTARA 666

---

## 📌 PEMBUKAAN (30 detik)

Assalamualaikum Wr. Wb. / Selamat pagi/siang Bapak/Ibu.

Perkenalkan, saya [NAMA ANDA] akan mempresentasikan **Sistem Informasi Penerimaan Peserta Didik Baru (PPDB) Online** untuk SMK Bakti Nusantara 666.

Sistem ini dirancang untuk **mempermudah proses pendaftaran siswa baru secara online**, **meningkatkan efisiensi verifikasi**, dan **mempercepat pengambilan keputusan penerimaan**.

---

## 🎯 KONSEP SISTEM (1 menit)

### **Latar Belakang**
Proses PPDB manual memiliki beberapa kendala:
- Pendaftar harus datang langsung ke sekolah
- Antrian panjang dan memakan waktu
- Dokumen fisik mudah hilang atau rusak
- Sulit melakukan tracking status pendaftaran
- Proses verifikasi lambat karena manual

### **Solusi yang Ditawarkan**
Sistem PPDB Online ini menawarkan:
- ✅ **Pendaftaran 24/7** - Bisa daftar kapan saja, dimana saja
- ✅ **Paperless** - Dokumen digital, ramah lingkungan
- ✅ **Real-time Tracking** - Status pendaftaran bisa dipantau langsung
- ✅ **Multi-level Verification** - Verifikasi bertahap untuk akurasi data
- ✅ **Secure & Reliable** - Keamanan data terjamin dengan enkripsi

### **Teknologi yang Digunakan**
- **Framework:** Laravel 11 (PHP)
- **Database:** MySQL
- **Frontend:** Bootstrap 5, JavaScript
- **Security:** OTP Verification, Bcrypt Password Hashing
- **Email Service:** SMTP Gmail
- **Server:** Apache (Laragon)

---

## 👥 PENGGUNA SISTEM (30 detik)

Sistem ini memiliki **5 role pengguna** dengan fungsi berbeda:

1. **Pendaftar** - Calon siswa yang mendaftar
2. **Admin** - Mengelola master data (jurusan, jadwal, informasi)
3. **Verifikator Administrasi** - Memverifikasi kelengkapan dokumen
4. **Keuangan** - Memverifikasi pembayaran pendaftaran
5. **Kepala Sekolah** - Memberikan approval final penerimaan

Setiap role memiliki **dashboard dan akses yang berbeda** sesuai tugasnya.

---

## 🔄 ALUR SISTEM (2 menit)

### **FASE 1: REGISTRASI & LOGIN**

**Step 1: Registrasi Akun**
```
Calon Siswa → Isi Form Registrasi (Nama, Email, No HP, Password)
           → Sistem Generate OTP 6 Digit
           → OTP Dikirim ke Email
           → User Input OTP dalam 10 Menit
           → Akun Terverifikasi & Aktif
```

**Keamanan:**
- OTP berlaku 10 menit
- Maksimal 3 kali percobaan input OTP
- Password di-hash dengan bcrypt (tidak bisa dibaca)

**Step 2: Login**
```
User → Input Email & Password
     → Sistem Validasi Kredensial
     → Redirect ke Dashboard Sesuai Role
```

**Fitur Tambahan:**
- Forgot Password dengan OTP verification
- Remember Me untuk auto-login

---

### **FASE 2: PENDAFTARAN SISWA**

**Step 1: Mengisi Formulir**

Formulir dibagi menjadi **3 bagian**:

**BAGIAN 1: Data Diri Lengkap**
- Nama Lengkap, NISN, NIK
- Tempat & Tanggal Lahir
- Jenis Kelamin, Agama
- Alamat Lengkap (Provinsi, Kabupaten, Kecamatan, Kelurahan, Kode Pos)
- **GPS Coordinates** (Latitude, Longitude) - Fitur Unggulan!
- No HP, Email
- Jurusan Pilihan

**BAGIAN 2: Data Orang Tua**
- Nama Ayah & Ibu
- Pekerjaan Ayah & Ibu
- No HP Orang Tua
- Alamat Orang Tua

**BAGIAN 3: Data Sekolah Asal**
- Nama Sekolah Asal
- Alamat Sekolah
- Tahun Lulus
- Nilai Rata-rata

**Step 2: Upload Dokumen**
- Foto Siswa
- Kartu Keluarga
- Ijazah/SKHUN
- Rapor Semester Akhir
- Bukti Pembayaran

**Step 3: Submit Pendaftaran**
```
Sistem → Generate Nomor Pendaftaran Otomatis (Format: PPDB-YYYY-XXXX)
      → Status: "Pending"
      → Notifikasi Email Berhasil Daftar
```

---

### **FASE 3: VERIFIKASI BERTAHAP**

**Level 1: Verifikasi Administrasi**
```
Verifikator → Cek Kelengkapan Dokumen
           → Cek Keabsahan Data
           → Approve / Reject dengan Catatan
           → Status: "Verifikasi Administrasi"
```

**Level 2: Verifikasi Keuangan**
```
Keuangan → Cek Bukti Pembayaran
         → Validasi Nominal & Tanggal Transfer
         → Approve / Reject
         → Status: "Verifikasi Keuangan"
```

**Level 3: Approval Kepala Sekolah**
```
Kepsek → Review Data Lengkap
       → Pertimbangan Kuota Jurusan
       → Final Decision: Approve / Reject
       → Status: "Diterima" / "Ditolak"
```

**Notifikasi:**
- Setiap perubahan status → Email otomatis ke pendaftar
- Jika ditolak → Disertai alasan penolakan

---

### **FASE 4: CETAK KARTU PENDAFTARAN**

Jika status **"Diterima"**:
```
Pendaftar → Download Kartu Pendaftaran (PDF)
         → Berisi: Nomor Pendaftaran, Data Siswa, Jurusan, QR Code
         → Dibawa saat daftar ulang
```

---

## 🗄️ STRUKTUR DATABASE (2 menit)

### **TABEL UTAMA**

#### **1. users** - Tabel Pengguna Sistem
```
┌─────────────────┬──────────────┬─────────────────────────────┐
│ Kolom           │ Tipe Data    │ Keterangan                  │
├─────────────────┼──────────────┼─────────────────────────────┤
│ id              │ BIGINT       │ Primary Key                 │
│ name            │ VARCHAR(255) │ Nama lengkap                │
│ email           │ VARCHAR(255) │ Email (UNIQUE)              │
│ phone           │ VARCHAR(255) │ Nomor HP                    │
│ password        │ VARCHAR(255) │ Password (Hashed Bcrypt)    │
│ role            │ ENUM         │ pendaftar/admin/verifikator │
│                 │              │ /keuangan/kepsek            │
│ is_active       │ BOOLEAN      │ Status aktif user           │
│ otp_code        │ VARCHAR(6)   │ Kode OTP 6 digit            │
│ otp_expires_at  │ TIMESTAMP    │ Waktu kadaluarsa OTP        │
│ email_verified  │ BOOLEAN      │ Status verifikasi email     │
│ otp_attempts    │ INTEGER      │ Jumlah percobaan OTP        │
│ created_at      │ TIMESTAMP    │ Waktu dibuat                │
│ updated_at      │ TIMESTAMP    │ Waktu diupdate              │
└─────────────────┴──────────────┴─────────────────────────────┘
```

**Relasi:** 1 user bisa punya 1 pendaftaran (One-to-One)

---

#### **2. jurusan** - Tabel Master Jurusan
```
┌─────────────┬──────────────┬────────────────────────┐
│ Kolom       │ Tipe Data    │ Keterangan             │
├─────────────┼──────────────┼────────────────────────┤
│ id          │ BIGINT       │ Primary Key            │
│ kode        │ VARCHAR(10)  │ Kode jurusan (RPL, DKV)│
│ nama        │ VARCHAR(100) │ Nama jurusan           │
│ deskripsi   │ TEXT         │ Deskripsi jurusan      │
│ kuota       │ INTEGER      │ Kuota penerimaan       │
│ is_active   │ BOOLEAN      │ Status aktif           │
│ created_at  │ TIMESTAMP    │ Waktu dibuat           │
│ updated_at  │ TIMESTAMP    │ Waktu diupdate         │
└─────────────┴──────────────┴────────────────────────┘
```

**Jurusan yang Tersedia:**
- Rekayasa Perangkat Lunak (RPL)
- Desain Komunikasi Visual (DKV)
- Akuntansi
- Animasi
- Pemasaran

---

#### **3. pendaftar** - Tabel Data Pendaftaran
```
┌──────────────────┬──────────────┬─────────────────────────────┐
│ Kolom            │ Tipe Data    │ Keterangan                  │
├──────────────────┼──────────────┼─────────────────────────────┤
│ id               │ BIGINT       │ Primary Key                 │
│ user_id          │ BIGINT       │ Foreign Key → users.id      │
│ jurusan_id       │ BIGINT       │ Foreign Key → jurusan.id    │
│ no_pendaftaran   │ VARCHAR(255) │ Nomor pendaftaran (UNIQUE)  │
│ status           │ ENUM         │ pending/verifikasi_adm/     │
│                  │              │ verifikasi_keuangan/        │
│                  │              │ approved/rejected           │
│ tanggal_daftar   │ DATE         │ Tanggal pendaftaran         │
│ catatan_verif    │ TEXT         │ Catatan dari verifikator    │
│ catatan_keuangan │ TEXT         │ Catatan dari keuangan       │
│ catatan_kepsek   │ TEXT         │ Catatan dari kepsek         │
│ created_at       │ TIMESTAMP    │ Waktu dibuat                │
│ updated_at       │ TIMESTAMP    │ Waktu diupdate              │
└──────────────────┴──────────────┴─────────────────────────────┘
```

**Status Flow:**
```
pending → verifikasi_adm → verifikasi_keuangan → approved/rejected
```

---

#### **4. pendaftar_data_siswa** - Tabel Data Lengkap Siswa
```
┌─────────────────┬──────────────┬─────────────────────────────┐
│ Kolom           │ Tipe Data    │ Keterangan                  │
├─────────────────┼──────────────┼─────────────────────────────┤
│ id              │ BIGINT       │ Primary Key                 │
│ pendaftar_id    │ BIGINT       │ Foreign Key → pendaftar.id  │
│ nama_lengkap    │ VARCHAR(255) │ Nama lengkap siswa          │
│ nisn            │ VARCHAR(10)  │ NISN                        │
│ nik             │ VARCHAR(16)  │ NIK                         │
│ tempat_lahir    │ VARCHAR(100) │ Tempat lahir                │
│ tanggal_lahir   │ DATE         │ Tanggal lahir               │
│ jenis_kelamin   │ ENUM('L','P')│ Laki-laki / Perempuan       │
│ agama           │ VARCHAR(50)  │ Agama                       │
│ alamat          │ TEXT         │ Alamat lengkap              │
│ provinsi        │ VARCHAR(100) │ Provinsi                    │
│ kabupaten       │ VARCHAR(100) │ Kabupaten/Kota              │
│ kecamatan       │ VARCHAR(100) │ Kecamatan                   │
│ kelurahan       │ VARCHAR(100) │ Kelurahan/Desa              │
│ kodepos         │ VARCHAR(5)   │ Kode pos                    │
│ lat             │ DECIMAL(10,7)│ GPS Latitude (Fitur Unggulan)│
│ lng             │ DECIMAL(10,7)│ GPS Longitude               │
│ no_hp           │ VARCHAR(15)  │ Nomor HP siswa              │
│ email           │ VARCHAR(100) │ Email siswa                 │
│ created_at      │ TIMESTAMP    │ Waktu dibuat                │
│ updated_at      │ TIMESTAMP    │ Waktu diupdate              │
└─────────────────┴──────────────┴─────────────────────────────┘
```

**Fitur GPS Coordinates:**
- Menggunakan Geolocation API browser
- Otomatis capture lokasi saat pendaftaran
- Bisa input manual jika browser tidak support
- Untuk mapping geografis calon siswa
- Link langsung ke Google Maps

---

#### **5. pendaftar_data_ortu** - Tabel Data Orang Tua
```
┌─────────────────┬──────────────┬─────────────────────────────┐
│ Kolom           │ Tipe Data    │ Keterangan                  │
├─────────────────┼──────────────┼─────────────────────────────┤
│ id              │ BIGINT       │ Primary Key                 │
│ pendaftar_id    │ BIGINT       │ Foreign Key → pendaftar.id  │
│ nama_ayah       │ VARCHAR(255) │ Nama ayah                   │
│ pekerjaan_ayah  │ VARCHAR(100) │ Pekerjaan ayah              │
│ nama_ibu        │ VARCHAR(255) │ Nama ibu                    │
│ pekerjaan_ibu   │ VARCHAR(100) │ Pekerjaan ibu               │
│ no_hp_ortu      │ VARCHAR(15)  │ Nomor HP orang tua          │
│ alamat_ortu     │ TEXT         │ Alamat orang tua            │
│ created_at      │ TIMESTAMP    │ Waktu dibuat                │
│ updated_at      │ TIMESTAMP    │ Waktu diupdate              │
└─────────────────┴──────────────┴─────────────────────────────┘
```

---

#### **6. pendaftar_data_sekolah** - Tabel Data Sekolah Asal
```
┌──────────────────┬──────────────┬─────────────────────────────┐
│ Kolom            │ Tipe Data    │ Keterangan                  │
├──────────────────┼──────────────┼─────────────────────────────┤
│ id               │ BIGINT       │ Primary Key                 │
│ pendaftar_id     │ BIGINT       │ Foreign Key → pendaftar.id  │
│ asal_sekolah     │ VARCHAR(255) │ Nama sekolah asal           │
│ alamat_sekolah   │ TEXT         │ Alamat sekolah              │
│ tahun_lulus      │ YEAR         │ Tahun lulus                 │
│ nilai_rata_rata  │ DECIMAL(5,2) │ Nilai rata-rata (0-100)     │
│ created_at       │ TIMESTAMP    │ Waktu dibuat                │
│ updated_at       │ TIMESTAMP    │ Waktu diupdate              │
└──────────────────┴──────────────┴─────────────────────────────┘
```

---

#### **7. jadwal_ppdb** - Tabel Jadwal PPDB
```
┌──────────────────┬──────────────┬─────────────────────────────┐
│ Kolom            │ Tipe Data    │ Keterangan                  │
├──────────────────┼──────────────┼─────────────────────────────┤
│ id               │ BIGINT       │ Primary Key                 │
│ nama_tahap       │ VARCHAR(100) │ Nama tahap (Gelombang 1, 2) │
│ tanggal_mulai    │ DATE         │ Tanggal mulai               │
│ tanggal_selesai  │ DATE         │ Tanggal selesai             │
│ is_active        │ BOOLEAN      │ Status aktif                │
│ created_at       │ TIMESTAMP    │ Waktu dibuat                │
│ updated_at       │ TIMESTAMP    │ Waktu diupdate              │
└──────────────────┴──────────────┴─────────────────────────────┘
```

---

#### **8. informasi** - Tabel Informasi/Pengumuman
```
┌─────────────────┬──────────────┬─────────────────────────────┐
│ Kolom           │ Tipe Data    │ Keterangan                  │
├─────────────────┼──────────────┼─────────────────────────────┤
│ id              │ BIGINT       │ Primary Key                 │
│ judul           │ VARCHAR(255) │ Judul informasi             │
│ konten          │ TEXT         │ Isi informasi               │
│ tanggal_publish │ DATE         │ Tanggal publish             │
│ is_active       │ BOOLEAN      │ Status aktif                │
│ created_at      │ TIMESTAMP    │ Waktu dibuat                │
│ updated_at      │ TIMESTAMP    │ Waktu diupdate              │
└─────────────────┴──────────────┴─────────────────────────────┘
```

---

### **RELASI ANTAR TABEL (ERD)**

```
┌─────────────┐
│   users     │
│ (Pengguna)  │
└──────┬──────┘
       │ 1
       │
       │ 1
┌──────▼──────────┐
│   pendaftar     │◄──────┐
│  (Pendaftaran)  │       │
└──────┬──────────┘       │
       │ 1                │ N
       │                  │
       ├──────────────────┼────────────┐
       │ 1                │            │
       │                  │            │
┌──────▼──────────────┐   │   ┌────────▼────────┐
│ pendaftar_data_siswa│   │   │    jurusan      │
│   (Data Siswa)      │   │   │  (Master Data)  │
└─────────────────────┘   │   └─────────────────┘
                          │
       ┌──────────────────┤
       │ 1                │ 1
       │                  │
┌──────▼──────────────┐   │
│ pendaftar_data_ortu │   │
│  (Data Orang Tua)   │   │
└─────────────────────┘   │
                          │
       ┌──────────────────┘
       │ 1
       │
┌──────▼─────────────────┐
│ pendaftar_data_sekolah │
│   (Data Sekolah Asal)  │
└────────────────────────┘

┌─────────────────┐     ┌──────────────┐
│  jadwal_ppdb    │     │  informasi   │
│ (Jadwal PPDB)   │     │ (Pengumuman) │
└─────────────────┘     └──────────────┘
```

**Penjelasan Relasi:**
- 1 User → 1 Pendaftar (One-to-One)
- 1 Pendaftar → 1 Data Siswa (One-to-One)
- 1 Pendaftar → 1 Data Orang Tua (One-to-One)
- 1 Pendaftar → 1 Data Sekolah Asal (One-to-One)
- 1 Jurusan → N Pendaftar (One-to-Many)

---

## 🔒 FITUR KEAMANAN (1 menit)

### **1. OTP Verification**
- Kode OTP 6 digit random
- Berlaku 10 menit
- Maksimal 3 kali percobaan
- Auto-expired setelah digunakan

### **2. Password Security**
- Hashing dengan Bcrypt (cost factor 12)
- Tidak bisa di-decrypt
- Minimal 8 karakter saat registrasi

### **3. Role-Based Access Control (RBAC)**
- Setiap role punya akses berbeda
- Middleware untuk proteksi route
- Unauthorized access → redirect 403

### **4. Session Management**
- Session-based authentication
- Auto-logout setelah idle
- Remember me dengan secure token

### **5. Input Validation**
- Server-side validation di Controller
- Client-side validation di Form
- Sanitasi input untuk prevent SQL Injection

### **6. CSRF Protection**
- Laravel CSRF token di setiap form
- Prevent Cross-Site Request Forgery

---

## 🎨 FITUR UNGGULAN (1 menit)

### **1. GPS Coordinates Mapping**
- Capture lokasi real-time dengan Geolocation API
- Simpan latitude & longitude
- Link langsung ke Google Maps
- Untuk analisis geografis calon siswa

### **2. Auto-Generate Nomor Pendaftaran**
- Format: PPDB-2025-0001
- Unique & sequential
- Otomatis saat submit form

### **3. Email Notification Otomatis**
- OTP verification
- Konfirmasi pendaftaran
- Update status verifikasi
- Pengumuman diterima/ditolak

### **4. Multi-Step Form Wizard**
- Form dibagi 3 bagian
- Progress indicator
- Save draft (bisa dilanjutkan nanti)

### **5. Document Upload & Preview**
- Upload foto, KK, ijazah, rapor
- Preview sebelum upload
- Validasi format & ukuran file

### **6. Dashboard Analytics**
- Statistik pendaftar per jurusan
- Grafik status verifikasi
- Total pendaftar real-time

### **7. Responsive Design**
- Mobile-friendly
- Bootstrap 5
- Bisa diakses dari HP, tablet, laptop

---

## 📊 KELEBIHAN SISTEM (30 detik)

✅ **Efisiensi Waktu** - Proses pendaftaran 10 menit vs 2 jam manual  
✅ **Paperless** - Hemat kertas, ramah lingkungan  
✅ **Real-time Tracking** - Status bisa dipantau kapan saja  
✅ **Data Terstruktur** - Database normalized, mudah di-query  
✅ **Secure** - OTP, encryption, RBAC  
✅ **Scalable** - Bisa handle ribuan pendaftar bersamaan  
✅ **User-Friendly** - Interface modern & intuitif  
✅ **Multi-Platform** - Web-based, bisa diakses dari device apapun  

---

## 🚀 PENGEMBANGAN KEDEPAN (30 detik)

Sistem ini bisa dikembangkan dengan fitur:

1. **Dashboard Analytics** - Grafik & chart statistik pendaftar
2. **Export Data** - Export ke Excel/PDF untuk laporan
3. **WhatsApp Notification** - Notifikasi via WhatsApp API
4. **Payment Gateway** - Integrasi Midtrans/Xendit untuk pembayaran online
5. **Mobile App** - Aplikasi Android/iOS native
6. **AI Recommendation** - Rekomendasi jurusan berdasarkan nilai & minat
7. **Online Interview** - Video call untuk wawancara calon siswa
8. **E-Certificate** - Sertifikat digital untuk siswa diterima

---

## 🎯 PENUTUP (30 detik)

Sistem PPDB Online ini dirancang untuk:
- ✅ Mempermudah calon siswa dalam mendaftar
- ✅ Meningkatkan efisiensi proses verifikasi
- ✅ Mempercepat pengambilan keputusan penerimaan
- ✅ Menjaga keamanan dan integritas data

Dengan sistem ini, SMK Bakti Nusantara 666 dapat memberikan **pelayanan pendaftaran yang modern, cepat, dan terpercaya**.

**Terima kasih atas perhatiannya.**

Wassalamualaikum Wr. Wb.

---

## 📝 TIPS PRESENTASI

### **Persiapan:**
- ✅ Buka aplikasi di browser (demo live)
- ✅ Siapkan akun dummy untuk setiap role
- ✅ Siapkan data sample untuk demo
- ✅ Test koneksi internet & email

### **Saat Presentasi:**
- 🎤 Bicara dengan jelas dan percaya diri
- 👁️ Eye contact dengan audiens
- 🖱️ Demo langsung fitur-fitur utama
- ⏱️ Jaga waktu (total 8-10 menit)
- 💬 Siap jawab pertanyaan

### **Demo yang Harus Ditunjukkan:**
1. Landing page (profil sekolah)
2. Registrasi + OTP verification
3. Login multi-role
4. Form pendaftaran (GPS feature)
5. Dashboard verifikator
6. Status tracking pendaftar

### **Antisipasi Pertanyaan:**
- "Bagaimana jika email OTP tidak masuk?" → Fitur resend OTP
- "Apakah data aman?" → Enkripsi password, HTTPS, RBAC
- "Berapa lama proses verifikasi?" → Tergantung kecepatan verifikator, rata-rata 1-2 hari
- "Apakah bisa daftar offline?" → Sistem online-only, tapi bisa dibantu admin
- "Biaya pengembangan?" → Estimasi [sesuaikan dengan budget]

---

## 🎬 STRUKTUR SLIDE PRESENTASI (Opsional)

**Slide 1:** Cover - Judul Sistem + Logo Sekolah  
**Slide 2:** Latar Belakang & Masalah  
**Slide 3:** Solusi yang Ditawarkan  
**Slide 4:** Teknologi yang Digunakan  
**Slide 5:** Pengguna Sistem (5 Role)  
**Slide 6:** Alur Sistem (Flowchart)  
**Slide 7:** Struktur Database (ERD)  
**Slide 8:** Fitur Keamanan  
**Slide 9:** Fitur Unggulan  
**Slide 10:** Screenshot Aplikasi  
**Slide 11:** Kelebihan Sistem  
**Slide 12:** Pengembangan Kedepan  
**Slide 13:** Penutup + Terima Kasih  

---

**SEMOGA SUKSES PRESENTASINYA! 🚀**
