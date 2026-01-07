<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/google_setup.php';

if (isset($_GET['code'])) {
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        
        if (isset($token['error'])) {
            throw new Exception("Error fetching access token: " . $token['error']);
        }
        
        $client->setAccessToken($token['access_token']);
        
        // Get user profile
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        
        $email = $google_account_info->email;
        $name = $google_account_info->name;
        $google_id = $google_account_info->id; // Not currently stored in DB, but available
        
        // Check if user exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user) {
            // User exists, log them in
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ];
            header("Location: index.php");
            exit();
        } else {
            // User doesn't exist, create new account
            // Generate a random password since they are using Google
            $password = bin2hex(random_bytes(10));
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashed_password]);
            
            // Get the ID of the new user
            $newUserId = $pdo->lastInsertId();
            
            // Log them in
            $_SESSION['user'] = [
                'id' => $newUserId,
                'name' => $name,
                'email' => $email
            ];
            header("Location: index.php");
            exit();
        }
        
    } catch (Exception $e) {
        // Handle errors
        die("Erreur Google Login : " . $e->getMessage());
    }
} else {
    header("Location: login.php");
    exit();
}
?>
