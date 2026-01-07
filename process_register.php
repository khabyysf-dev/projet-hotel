<?php
require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        die("Tous les champs sont obligatoires.");
    }

    if ($password !== $confirm_password) {
        die("Les mots de passe ne correspondent pas.");
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        die("Cet email est déjà utilisé.");
    }

  
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

 
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hashed_password]);

       
        header("Location: login.php?registered=1");
        exit();
    } catch (PDOException $e) {
        die("Erreur lors de l'inscription : " . $e->getMessage());
    }
}
?>
