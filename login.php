<?php
// login.php
session_start();
require_once 'db_connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // 🔍 Validasi input
    if (empty($email) || empty($password)) {
        echo json_encode([
            'success' => false,
            'message' => 'Mohon isi email dan password!'
        ]);
        exit;
    }

    // 🔎 Cari user berdasarkan email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // ✅ Cek user & password
    if ($user && password_verify($password, $user['password'])) {
        // ✅ Simpan session FLAT (sesuai dengan check_session.php)
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_photo'] = $user['photo'];

        echo json_encode([
            'success' => true,
            'message' => 'Selamat datang, ' . $user['name'] . '! 🌸',
            'user' => [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
                'photo' => $user['photo']
            ]
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Email atau password salah!'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method!'
    ]);
}
?>
