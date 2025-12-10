<?php
session_start();
header('Content-Type: application/json');

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Silakan login terlebih dahulu!']);
    exit;
}

// Koneksi database
$host = 'localhost';
$dbname = 'flowerssshop';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil data dari POST
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'] ?? null;
    $product_price = $_POST['product_price'] ?? null;
    $recipient_name = $_POST['recipient_name'] ?? null;
    $shipping_address = $_POST['shipping_address'] ?? null;
    $phone_number = $_POST['phone_number'] ?? null;
    $payment_method = $_POST['payment_method'] ?? null;
    $total_price = $_POST['total_price'] ?? null;

    // Validasi data
    if (!$product_id || !$product_name || !$product_price || !$recipient_name || 
        !$shipping_address || !$phone_number || !$payment_method || !$total_price) {
        echo json_encode(['success' => false, 'message' => 'Data tidak lengkap!']);
        exit;
    }

    // Simpan ke database
    $stmt = $pdo->prepare("
        INSERT INTO orders (
            user_id, 
            product_id, 
            product_name, 
            product_price, 
            recipient_name, 
            shipping_address, 
            phone_number, 
            payment_method, 
            shipping_cost, 
            total_price,
            order_status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 15000, ?, 'pending')
    ");
    
    $stmt->execute([
        $user_id,
        $product_id,
        $product_name,
        $product_price,
        $recipient_name,
        $shipping_address,
        $phone_number,
        $payment_method,
        $total_price
    ]);

    $order_id = $pdo->lastInsertId();

    echo json_encode([
        'success' => true,
        'message' => 'Pesanan berhasil dibuat!',
        'order_id' => $order_id,
        'payment_method' => $payment_method
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>
