<?php
header('Content-Type: application/json');

// Database connection - SESUAIKAN DENGAN KONEKSI ANDA
$host = 'localhost';
$dbname = 'flowerssshop'; // ⚠️ Ganti dengan nama database Anda
$username = 'root';      // ⚠️ Ganti jika beda
$password = '';          // ⚠️ Ganti jika ada password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Ambil data dari form
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $message = $_POST['message'] ?? null;
    
    // Validasi data
    if (!$name || !$email || !$phone || !$message) {
        echo json_encode(['success' => false, 'message' => 'Semua field harus diisi!']);
        exit();
    }
    
    // Simpan ke database
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $message]);
    
    echo json_encode([
        'success' => true, 
        'message' => "Terima kasih $name! Pesan Anda telah tersimpan.\n\nKami akan menghubungi Anda segera melalui email: $email"
    ]);
    
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
