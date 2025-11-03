# Script untuk memperbaiki path gambar di semua file Blade
# Mengganti path relatif dengan helper asset() Laravel

Write-Host "Memperbaiki path gambar di file Blade..." -ForegroundColor Green

$viewsPath = "c:\xampp\htdocs\akpager\resources\views"
$files = Get-ChildItem -Path $viewsPath -Filter "*.blade.php" -Recurse

$totalFiles = 0
$totalReplacements = 0

foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    $originalContent = $content
    $fileReplacements = 0
    
    # Pattern 1: style="background-image: url(assets/
    if ($content -match 'url\(assets/') {
        $content = $content -replace 'url\(assets/', 'url({{ asset(''assets/'
        $content = $content -replace '(assets/[^)]+)\)', '$1'') }})'
        $fileReplacements++
    }
    
    # Pattern 2: src="assets/
    if ($content -match 'src="assets/') {
        $content = $content -replace 'src="assets/', 'src="{{ asset(''assets/'
        $content = $content -replace '(src="{{ asset\(''assets/[^"]+)"', '$1'') }}"'
        $fileReplacements++
    }
    
    # Pattern 3: href="assets/
    if ($content -match 'href="assets/') {
        $content = $content -replace 'href="assets/', 'href="{{ asset(''assets/'
        $content = $content -replace '(href="{{ asset\(''assets/[^"]+)"', '$1'') }}"'
        $fileReplacements++
    }
    
    # Simpan jika ada perubahan
    if ($content -ne $originalContent) {
        Set-Content -Path $file.FullName -Value $content -NoNewline
        $totalFiles++
        $totalReplacements += $fileReplacements
        Write-Host "✓ Fixed: $($file.Name)" -ForegroundColor Yellow
    }
}

Write-Host "`n==================================" -ForegroundColor Green
Write-Host "Selesai!" -ForegroundColor Green
Write-Host "Total file diperbaiki: $totalFiles" -ForegroundColor Cyan
Write-Host "Total replacements: $totalReplacements" -ForegroundColor Cyan
Write-Host "==================================" -ForegroundColor Green
