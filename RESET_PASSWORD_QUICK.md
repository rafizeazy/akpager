# Quick Guide: Reset Password

## 🔐 Cara Reset Password di Dashboard

1. Login ke `/admin`
2. Klik nama/foto profile (pojok kanan atas)
3. Pilih **"Reset Password"** (di atas Sign Out)
4. Isi form:
    - Current Password
    - New Password (min. 8 karakter)
    - Confirm New Password
5. Klik **"Update Password"**

✅ Password berhasil diubah!

---

## 🖥️ Cara Reset Password via Terminal

Jika lupa password dan tidak bisa login:

```bash
php artisan admin:password email@example.com newpassword123
```

**Contoh:**

```bash
php artisan admin:password chivalrain1@gmail.com smartplus2025
```

---

## 🚀 Untuk Production/Hosting

### Setup Awal:

```bash
# 1. Upload files ke server
# 2. Konfigurasi .env
# 3. Install dependencies
composer install --no-dev --optimize-autoloader

# 4. Generate app key
php artisan key:generate

# 5. Migrate database
php artisan migrate --force

# 6. Create admin user (jika belum ada)
php artisan make:filament-user

# 7. Clear & optimize cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Reset Password di Server:

```bash
# SSH ke server
ssh user@your-server.com

# Masuk ke folder project
cd /var/www/html/akpager

# Reset password
php artisan admin:password admin@example.com NewPassword123

# Clear cache
php artisan config:clear
php artisan cache:clear
```

---

## 📋 Checklist Before Hosting

-   [ ] File `.env` sudah dikonfigurasi
-   [ ] `APP_DEBUG=false` di production
-   [ ] `APP_ENV=production`
-   [ ] Database credentials benar
-   [ ] Run `composer install --no-dev`
-   [ ] Run `php artisan migrate --force`
-   [ ] Run cache commands
-   [ ] Test login dashboard
-   [ ] Test reset password
-   [ ] Backup database

---

## ⚠️ Troubleshooting

### "Current password is incorrect"

➡️ Password lama salah, coba lagi atau gunakan command artisan

### "Password must be at least 8 characters"

➡️ Password baru terlalu pendek, minimal 8 karakter

### "Password confirmation does not match"

➡️ Confirm password tidak sama dengan new password

### Lupa password sepenuhnya?

➡️ Gunakan: `php artisan admin:password your-email@example.com NewPass123`

---

## 📁 Files Created

1. `app/Filament/Pages/ResetPassword.php` - Reset password logic
2. `resources/views/filament/pages/reset-password.blade.php` - Reset password view
3. `app/Providers/Filament/AdminPanelProvider.php` - Menu configuration
4. `app/Console/Commands/UpdateAdminPassword.php` - Artisan command
5. `RESET_PASSWORD_GUIDE.md` - Full documentation
6. `RESET_PASSWORD_QUICK.md` - This quick guide

---

## 🎯 Features

✅ Reset password dari dashboard (tanpa seeder)
✅ Validasi current password
✅ Password minimal 8 karakter
✅ Confirm password harus sama
✅ Notifikasi success/error
✅ Command artisan untuk emergency reset
✅ Menu "Reset Password" di user dropdown
✅ Ready untuk production hosting

---

**Dokumentasi lengkap**: Lihat `RESET_PASSWORD_GUIDE.md`
