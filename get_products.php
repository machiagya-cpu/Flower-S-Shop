<?php
// get_products.php
require_once 'db_connection.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY id ASC");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['success' => true, 'products' => $products]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Gagal memuat produk: ' . $e->getMessage()]);
}
?>
