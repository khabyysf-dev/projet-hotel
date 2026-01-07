<?php
// Main API router for authentication endpoints
// Handles CORS and routes requests to appropriate handlers

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Respond to preflight checks
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once '../includes/db.php';

// Parse incoming request
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = str_replace('/api', '', $path);

// Route to the right handler
switch ($path) {
    case '/auth/login':
        if ($method === 'POST') handleLogin($pdo);
        break;
    
    case '/auth/register':
        if ($method === 'POST') handleRegister($pdo);
        break;
    
    default:
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Not found']);
        break;
}

// User login endpoint
function handleLogin($pdo) {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input || empty($input['email']) || empty($input['password'])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Email and password required']);
        return;
    }

    $email = trim($input['email']);
    $password = $input['password'];

    try {
        // Check if user exists
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            echo json_encode([
                'success' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ]
            ]);
        } else {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Database error']);
    }
}

// User registration endpoint
function handleRegister($pdo) {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input || empty($input['name']) || empty($input['email']) || empty($input['password'])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'All fields required']);
        return;
    }

    $name = trim($input['name']);
    $email = trim($input['email']);
    $password = $input['password'];

    // Check email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid email']);\n        return;
    }

    try {
        // Check if email already exists
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            http_response_code(409);
            echo json_encode(['success' => false, 'message' => 'Email already exists']);
            return;
        }

        // Hash and save password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$name, $email, $hashedPassword]);

        echo json_encode(['success' => true, 'message' => 'Account created']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error creating account']);
    }
}
?>
