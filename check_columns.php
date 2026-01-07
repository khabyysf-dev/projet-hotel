<?php
require 'includes/db.php';
$output = "";
try {
    $output .= "--- USERS ---\n";
    $stmt = $pdo->query("DESCRIBE users");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= $row['Field'] . "\n";
    }
    $output .= "\n--- RESERVATIONS ---\n";
    $stmt = $pdo->query("DESCRIBE reservations");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output .= $row['Field'] . "\n";
    }
} catch(Exception $e) {
    $output .= "Error: " . $e->getMessage();
}
file_put_contents('db_structure.txt', $output);
?>
