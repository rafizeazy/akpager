# Reset Password Guide

## Cara 1: Melalui Filament Dashboard (Recommended)

### Langkah-langkah:

1. **Login ke Dashboard Filament**

    - Buka browser dan akses: `http://your-domain.com/admin`
    - Masukkan email dan password Anda

2. **Buka Menu Profile**

    - Klik foto profile atau nama Anda di pojok kanan atas
    - Akan muncul dropdown menu

3. **Pilih "Reset Password"**

    - Klik menu "Reset Password" (di atas "Sign Out")
    - Anda akan diarahkan ke halaman reset password

4. **Isi Form Reset Password**

    - **Current Password**: Masukkan password saat ini
    - **New Password**: Masukkan password baru (minimal 8 karakter)
    - **Confirm New Password**: Ketik ulang password baru

5. **Klik "Update Password"**
    - Jika berhasil, akan muncul notifikasi success
    - Password Anda sudah berubah

## Cara 2: Melalui Command Line (Alternatif)

Jika Anda lupa password dan tidak bisa login, gunakan command artisan:

```bash
php artisan admin:password email@example.com newpassword123
```

### Contoh:

```bash
php artisan admin:password chivalrain1@gmail.com smartplus2025
```

### Output:

```
Password updated successfully for chivalrain1@gmail.com!
```

## Keamanan Password

### Ketentuan Password:

-   ✅ Minimal 8 karakter
-   ✅ Kombinasi huruf besar dan kecil (recommended)
-   ✅ Kombinasi dengan angka (recommended)
-   ✅ Kombinasi dengan simbol (recommended)

### Tips Keamanan:

1. Jangan gunakan password yang mudah ditebak
2. Jangan gunakan tanggal lahir atau nama
3. Gunakan password manager untuk menyimpan password
4. Ganti password secara berkala
5. Jangan bagikan password kepada siapapun

## Troubleshooting

### "Current password is incorrect"

-   Pastikan Anda memasukkan password lama yang benar
-   Coba login ulang untuk memastikan password yang Anda ingat

### "New password must be at least 8 characters"

-   Password baru harus minimal 8 karakter
-   Tambahkan lebih banyak karakter

### "Password confirmation does not match"

-   Pastikan "Confirm New Password" sama persis dengan "New Password"
-   Perhatikan huruf besar/kecil

### Lupa Password Sepenuhnya?

Gunakan command artisan:

```bash
php artisan admin:password your-email@example.com YourNewPassword123
```

## Untuk Hosting Production

Setelah di-hosting, pastikan:

1. ✅ File `.env` sudah dikonfigurasi dengan benar
2. ✅ Database sudah ter-migrate
3. ✅ User admin sudah dibuat
4. ✅ Jalankan: `php artisan config:cache`
5. ✅ Jalankan: `php artisan route:cache`

Jika perlu reset password di server production:

```bash
# SSH ke server
ssh user@your-server.com

# Masuk ke folder project
cd /path/to/your/project

# Reset password
php artisan admin:password admin@example.com NewSecurePassword123

# Clear cache
php artisan config:clear
php artisan cache:clear
```

## File yang Dibuat

### 1. Reset Password Page

**File**: `app/Filament/Pages/ResetPassword.php`

-   Handle form reset password
-   Validasi current password
-   Update password dengan Hash

### 2. View Template

**File**: `resources/views/filament/pages/reset-password.blade.php`

-   Template untuk halaman reset password

### 3. Menu Configuration

**File**: `app/Providers/Filament/AdminPanelProvider.php`

-   Menambahkan menu "Reset Password" di user dropdown

### 4. Command Artisan

**File**: `app/Console/Commands/UpdateAdminPassword.php`

-   Command untuk update password via terminal

## Support

Jika ada masalah, hubungi:

-   Email: info@akpager.com
-   Phone: +62 xxx xxxx xxxx
