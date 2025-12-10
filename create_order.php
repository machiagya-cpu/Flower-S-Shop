<?php
session_start();
require_once 'db_connection.php';
header('Content-Type: application/json');

// Cek login
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Silakan login!']);
    exit;
}

$user_id = $_SESSION['user_id'];
$product_name = $_POST['product_name'] ?? '';
$customer_name = $_POST['customer_name'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$payment_method = $_POST['payment_method'] ?? '';
$total = $_POST['total'] ?? '';

try {
    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, product_name, customer_name, address, phone, payment_method, total, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')
    ");
    $stmt->execute([$user_id, $product_name, $customer_name, $address, $phone, $payment_method, $total]);
    
    echo json_encode(['success' => true, 'message' => 'Pesanan berhasil dibuat!']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
