<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $reservation_id = $_POST['delete_id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ? AND user_id = ?");
        $stmt->execute([$reservation_id, $user_id]);
        
        if ($stmt->rowCount() > 0) {
            header("Location: mes_reservations.php?msg=deleted");
            exit();
        } else {
            header("Location: mes_reservations.php?error=not_found");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: mes_reservations.php?error=db_error");
        exit();
    }
}

$reservations = [];

try {
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
    $reservations = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations - Hôtel Sables d'Or</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .reservations-container {
            max-width: 1000px;
            margin: 120px auto 50px;
            padding: 20px;
        }
        .reservation-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        .reservation-card:hover {
            transform: translateY(-5px);
        }
        .res-header {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        .res-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            background: #e0f2fe;
            color: #0369a1;
        }
        .res-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }
        .res-item label {
            display: block;
            font-size: 0.8rem;
            color: #64748b;
            margin-bottom: 5px;
        }
        .res-item span {
            font-weight: 600;
            color: #1e293b;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="reservations-container">
    <h1 style="margin-bottom: 30px; font-family: 'Playfair Display', serif;">Mes Réservations</h1>
    
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
        <div style="padding: 15px; margin-bottom: 20px; background: #dcfce7; color: #166534; border-radius: 8px; border: 1px solid #bbf7d0;">
            <i class="fas fa-check-circle"></i> La réservation a été annulée avec succès.
        </div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div style="padding: 15px; margin-bottom: 20px; background: #fee2e2; color: #991b1b; border-radius: 8px; border: 1px solid #fecaca;">
            <i class="fas fa-exclamation-circle"></i> Une erreur est survenue lors de l'annulation.
        </div>
    <?php endif; ?>
    
    <?php if (empty($reservations)): ?>
        <div style="text-align: center; padding: 50px;">
            <i class="far fa-calendar-times" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 15px;"></i>
            <p>Vous n'avez aucune réservation pour le moment.</p>
            <a href="chambre.php" class="btn btn-primary" style="margin-top: 20px;">Réserver une chambre</a>
        </div>
    <?php else: ?>
        <?php foreach ($reservations as $res): ?>
            <div class="reservation-card">
                <div class="res-header">
                    <div>
                        <h3 style="margin: 0; font-size: 1.2rem;"><?php echo htmlspecialchars($res['chambre']); ?></h3>
                        <span style="font-size: 0.85rem; color: #64748b;">Réservé le <?php echo date('d/m/Y', strtotime($res['created_at'])); ?></span>
                    </div>
                    <div>
                        <span class="res-status">Confirmé</span>
                    </div>
                </div>
                <div class="res-details">
                    <div class="res-item">
                        <label>Arrivée</label>
                        <span><?php echo date('d/m/Y', strtotime($res['date_in'])); ?></span>
                    </div>
                    <div class="res-item">
                        <label>Départ</label>
                        <span><?php echo date('d/m/Y', strtotime($res['date_out'])); ?></span>
                    </div>
                    <div class="res-item">
                        <label>Invités</label>
                        <span><?php echo $res['guests']; ?></span>
                    </div>
                    <div class="res-item">
                        <label>Total</label>
                        <span style="color: #b89146;"><?php echo number_format($res['total_price'], 0, ',', ' '); ?> DZD</span>
                    </div>
                </div>
                <?php if(!empty($res['services'])): ?>
                <div style="margin-top: 15px; padding-top: 15px; border-top: 1px dashed #eee;">
                    <label style="font-size: 0.8rem; color: #64748b;">Services inclus</label>
                    <p style="margin: 5px 0 0; font-size: 0.9rem;"><?php echo htmlspecialchars($res['services']); ?></p>
                </div>
                <?php endif; ?>
                
                <div style="margin-top: 20px; text-align: right;">
                    <form action="" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ? Cette action est irréversible.');" style="display: inline;">
                        <input type="hidden" name="delete_id" value="<?php echo $res['id']; ?>">
                        <button type="submit" style="background: none; border: 1px solid #ef4444; color: #ef4444; padding: 8px 15px; border-radius: 6px; cursor: pointer; transition: all 0.3s; font-size: 0.9rem;">
                            <i class="far fa-trash-alt"></i> Annuler la réservation
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
