<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user'])) {
    // Save booking data in session to restore after login? For now just redirect
    header("Location: login.php?redirect=reservation");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user']['id'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $guests = $_POST['guests'];
    $room_count = $_POST['room_count'];
    $room_type = $_POST['room_type'] ?? 'Standard'; // Fallback
    $total_price = $_POST['total_price'];
    $services = $_POST['services_list'];

    // Validation
    if (empty($checkin) || empty($checkout)) {
        die("Les dates sont obligatoires.");
    }

    try {
        // We assume the table is named 'reservation' or 'reservations'. The user said 'reservation table'.
        // We'll try to insert. If columns don't match, it will fail.
        // inferred columns: user_id, check_in, check_out, guests, room_count, room_type, total_price, services
        
        // Correct column mapping based on user input
        $sql = "INSERT INTO reservations (user_id, date_in, date_out, guests, rooms_count, chambre, total_price, services, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $checkin, $checkout, $guests, $room_count, $room_type, $total_price, $services]);

        header("Location: mes_reservations.php?booking=success");
        exit();

    } catch (PDOException $e) {
        // If table doesn't exist or columns mismatch, we might fallback or show error
        $error = $e->getMessage();
        // Check if table missing
        if (strpos($error, "doesn't exist") !== false) {
             die("Erreur: La table 'reservation' n'existe pas. Veuillez contacter l'administrateur. Détails: $error");
        }
         die("Erreur lors de la réservation : " . $error);
    }
}
?>
