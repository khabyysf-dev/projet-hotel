<?php
require_once 'includes/google_setup.php';
$authUrl = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Hôtel Sables d'Or</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="auth-nav-top">
    <a href="index.php" class="btn btn-sm btn-outline nav-auth-login">Home</a>
    <a href="login.php" class="btn btn-sm btn-primary nav-auth-register">Login</a>
</div>

<div class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Créer un compte</h2>
            <p class="muted">Rejoignez-nous pour des offres exclusives</p>
        </div>
        
        <div id="register-success" style="display: none; background: rgba(74, 222, 128, 0.1); border: 1px solid #4ade80; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            <i class="fas fa-check-circle"></i> Inscription réussie ! Vous pouvez maintenant vous connecter.
        </div>
        
        <form action="process_register.php" method="POST" class="auth-form" id="register-form">
            <div class="input-group">
                <label><i class="fas fa-user"></i> Nom complet</label>
                <input type="text" name="name" placeholder="Votre nom" required class="custom-input">
            </div>
            
            <div class="input-group">
                <label><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" placeholder="votre@email.com" required class="custom-input">
            </div>
            
            <div class="input-group">
                <label><i class="fas fa-lock"></i> Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required class="custom-input">
            </div>

            <div class="input-group">
                <label><i class="fas fa-lock"></i> Confirmer le mot de passe</label>
                <input type="password" name="confirm_password" placeholder="••••••••" required class="custom-input">
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%;">S'inscrire</button>
            
            <div class="social-divider">Ou s'inscrire avec</div>
            
            <div class="social-buttons">
                <a href="<?php echo htmlspecialchars($authUrl); ?>" class="btn-social" style="text-decoration: none; display: flex; align-items: center; justify-content: center; color: inherit;">
                    <i class="fab fa-google btn-google"></i> Google
                </a>
                <button type="button" class="btn-social">
                    <i class="fab fa-facebook-f btn-facebook"></i> Facebook
                </button>
                <button type="button" class="btn-social">
                    <i class="fab fa-apple btn-apple"></i> Apple
                </button>
            </div>
        </form>
    </div>
</div>


</body>
</html>