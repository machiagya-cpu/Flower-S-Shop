<?php
session_start();
require_once 'db_connection.php';

// register.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'user';
    $photo = $_POST['photo'] ?? '';
    
    // Validasi input
    if (empty($name) || empty($email) || empty($password)) {
        echo json_encode([
            'success' => false,
            'message' => 'Mohon lengkapi semua field!'
        ]);
        exit;
    }
    
    // Validasi email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => 'Format email tidak valid!'
        ]);
        exit;
    }
    
    try {
        // Check apakah email sudah terdaftar
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            echo json_encode([
                'success' => false,
                'message' => 'Email sudah terdaftar!'
            ]);
            exit;
        }
        
        // Generate default photo jika tidak upload
        if (empty($photo)) {
            $bgColor = $role === 'admin' ? 'ec4899' : 'f472b6';
            $photo = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=' . $bgColor . '&color=fff&size=128';
        }
        
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user ke database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, photo) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $hashedPassword, $role, $photo]);
        
        echo json_encode([
            'success' => true,
            'message' => 'Registrasi berhasil! Silakan login. 🌺'
        ]);
        
    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error database: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?>
