<?php
echo "<h1>Laravel Diagnose</h1>";

$files = [
    '../vendor/autoload.php' => 'Vendor Ordner (Composer)',
    '../.env' => '.env Datei (Konfiguration)',
    '../bootstrap/app.php' => 'Bootstrap Datei',
    '../storage' => 'Storage Ordner'
];

foreach ($files as $path => $name) {
    if (file_exists($path)) {
        echo "<p style='color:green'>✅ $name gefunden.</p>";
    } else {
        echo "<p style='color:red'>❌ $name FEHLT! (Pfad: $path)</p>";
    }
}

echo "<h2>System Info</h2>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "Current Dir: " . __DIR__ . "<br>";

if (is_writable('../storage')) {
    echo "<p style='color:green'>✅ Storage ist beschreibbar.</p>";
} else {
    echo "<p style='color:red'>❌ Storage ist NICHT beschreibbar!</p>";
}
