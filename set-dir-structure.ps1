# vytvoření adresářů projektu
$dirs = @(
    "assets",
    "assets/css",
    "assets/js",
    "assets/img",
    "assets/img/screenshots",
    "data",
    "api",
    "docs",
    "public"
)

foreach ($dir in $dirs) {
    New-Item -ItemType Directory -Path $dir -Force | Out-Null
}

# vytvoření prázdných souborů
$files = @(
    "public/index.html",
    "README.md",
    "assets/css/styles.css",
    "assets/js/main.js",
    "assets/js/flstudio.js",
    "data/info.json",
    "data/tutorial.json",
    "data/export.json",
    "api/getData.php",
    "docs/design_wireframe.md"
)

foreach ($file in $files) {
    New-Item -ItemType File -Path $file -Force | Out-Null
}

# zobrazení výsledku
Write-Host "Adresářová struktura projektu byla úspěšně vytvořena." -ForegroundColor Green
