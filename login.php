<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Hôtel Sables d'Or</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-body">

<div class="auth-nav-top">
    <a href="index.php" class="btn btn-sm btn-outline nav-auth-login">Home</a>
    <a href="registre.php" class="btn btn-sm btn-primary nav-auth-register">Register</a>
</div>

<div class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Connexion</h2>
        </div>
        
        <form action="process_login.php" method="POST" class="auth-form">
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" class="custom-input" required placeholder="exemple@mail.com">
            </div>
            
            <div class="input-group">
                <label>Mot de passe</label>
                <input type="password" name="password" class="custom-input" required placeholder="••••••••">
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
            
            <div class="social-divider">Ou continuer avec</div>
            
            <div class="btns">
                 <button type="button" class="btn-social" style="text-decoration: none; display: flex; align-items: center; justify-content: center; color: inherit;">
                    <i class="fab fa-google btn-google"></i> Google
</button>

                <button type="button" class="btn-social">
                    <i class="fab fa-facebook-f btn-facebook"></i> Facebook
                </button>
                <button type="button" class="btn-social">
                    <i class="fab fa-apple btn-apple"></i> Apple
                </button>
            </div>
        </form>

        <div class="auth-footer">
            <p style="margin-bottom: 15px;">Pas encore de compte ?</p>
            <a href="registre.php" class="btn btn-outline btn-sm" style="width: 100%;">Créer un compte</a>
        </div>
    </div>
</div>



</body>
</html>