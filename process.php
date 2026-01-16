<?php
// Konfigurace připojení
$host = 'localhost';
$db   = 'fl_studio_db'; // Název databáze, kterou jsi vytvořil
$user = 'root';        // Výchozí uživatel v XAMPP
$pass = '';            // Výchozí heslo v XAMPP je prázdné
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Připojení k databázi
    $pdo = new PDO($dsn, $user, $pass, $options);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Příprava SQL dotazu (prevence proti SQL injection)
        $sql = "INSERT INTO dotazy (jmeno, email, zprava) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $message]);

        // Úspěšné přesměrování nebo výpis
        echo "<h1>Dotaz byl úspěšně uložen do databáze!</h1>";
        echo "<a href='index.php'>Zpět na web</a>";
    }

} catch (\PDOException $e) {
    // V případě chyby vypíšeme problém
    die("Chyba databáze: " . $e->getMessage());
}
?>