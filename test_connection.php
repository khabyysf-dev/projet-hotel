<?php
require_once 'includes/db.php';

try {
    echo "Testing connection to database '$dbname'...\n";
    if ($pdo) {
        echo "✅ Connected successfully to MySQL database!\n";
        
        // Check if tables exist
        $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
        echo "Found tables: " . implode(", ", $tables) . "\n";
        
        if (in_array('users', $tables)) {
            $userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
            echo "Users in DB: $userCount\n";
        } else {
            echo "Table 'users' not found. Did you import database.sql?\n";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}
?>
