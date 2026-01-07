<?php
session_start();
require_once 'includes/db.php';

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $reservation_id = $_POST['id'];
    $user_id = $_SESSION['user']['id'];

    try {
        // Verify ownership before deleting
        $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ? AND user_id = ?");
        $stmt->execute([$reservation_id, $user_id]);

        if ($stmt->rowCount() > 0) {
            // Success
            header("Location: mes_reservations.php?msg=deleted");
            exit();
        } else {
            // Not found or not owned by user
            header("Location: mes_reservations.php?error=not_found");
            exit();
        }
    } catch (PDOException $e) {
        // DB Error
        header("Location: mes_reservations.php?error=db_error");
        exit();
    }
} else {
    // Invalid request
    header("Location: mes_reservations.php");
    exit();
}
