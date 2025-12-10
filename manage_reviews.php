<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('db_connection.php');  // ← Ganti jadi db_connection.php

header('Content-Type: application/json');

// Get action
$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

// List all reviews
if ($action === 'list') {
    try {
        $stmt = $pdo->prepare("
            SELECT r.*, p.name as product_name 
            FROM reviews r 
            LEFT JOIN products p ON r.product_id = p.id 
            ORDER BY r.created_at DESC
        ");
        $stmt->execute();
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode([
            'success' => true,
            'reviews' => $reviews
        ]);
    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Check if user is logged in for create/update/delete
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Silakan login terlebih dahulu!'
    ]);
    exit;
}

$userId = $_SESSION['user_id'];
$userRole = isset($_SESSION['role']) ? $_SESSION['role'] : 'user';

// Create review
if ($action === 'create') {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $productId = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $rating = isset($_POST['rating']) ? $_POST['rating'] : 5;
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $photo = isset($_POST['photo']) ? $_POST['photo'] : null;

    if (empty($name) || empty($productId) || empty($message)) {
        echo json_encode([
            'success' => false,
            'message' => 'Mohon lengkapi semua field!'
        ]);
        exit;
    }

    try {
        $stmt = $pdo->prepare("
            INSERT INTO reviews (user_id, name, product_id, rating, message, photo, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, NOW())
        ");
        $stmt->execute([$userId, $name, $productId, $rating, $message, $photo]);
        
        echo json_encode([
            'success' => true,
            'message' => 'Review berhasil ditambahkan!'
        ]);
    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Update review
if ($action === 'update') {
    $reviewId = isset($_POST['review_id']) ? $_POST['review_id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $productId = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $rating = isset($_POST['rating']) ? $_POST['rating'] : 5;
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $photo = isset($_POST['photo']) ? $_POST['photo'] : null;

    if (empty($reviewId) || empty($name) || empty($productId) || empty($message)) {
        echo json_encode([
            'success' => false,
            'message' => 'Mohon lengkapi semua field!'
        ]);
        exit;
    }

    try {
        // Check ownership
        $stmt = $pdo->prepare("SELECT user_id FROM reviews WHERE id = ?");
        $stmt->execute([$reviewId]);
        $review = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$review || $review['user_id'] != $userId) {
            echo json_encode([
                'success' => false,
                'message' => 'Anda tidak memiliki akses untuk mengedit review ini!'
            ]);
            exit;
        }

        // Update review
        if ($photo) {
            $stmt = $pdo->prepare("
                UPDATE reviews 
                SET name = ?, product_id = ?, rating = ?, message = ?, photo = ? 
                WHERE id = ?
            ");
            $stmt->execute([$name, $productId, $rating, $message, $photo, $reviewId]);
        } else {
            $stmt = $pdo->prepare("
                UPDATE reviews 
                SET name = ?, product_id = ?, rating = ?, message = ? 
                WHERE id = ?
            ");
            $stmt->execute([$name, $productId, $rating, $message, $reviewId]);
        }
        
        echo json_encode([
            'success' => true,
            'message' => 'Review berhasil diupdate!'
        ]);
    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Delete review
if ($action === 'delete') {
    $reviewId = isset($_POST['review_id']) ? $_POST['review_id'] : '';

    if (empty($reviewId)) {
        echo json_encode([
            'success' => false,
            'message' => 'Review ID tidak valid!'
        ]);
        exit;
    }

    try {
        // Check ownership or admin
        $stmt = $pdo->prepare("SELECT user_id FROM reviews WHERE id = ?");
        $stmt->execute([$reviewId]);
        $review = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$review) {
            echo json_encode([
                'success' => false,
                'message' => 'Review tidak ditemukan!'
            ]);
            exit;
        }

        // Allow if admin OR owner
        if ($userRole !== 'admin' && $review['user_id'] != $userId) {
            echo json_encode([
                'success' => false,
                'message' => 'Anda tidak memiliki akses untuk menghapus review ini!'
            ]);
            exit;
        }

        // Delete review
        $stmt = $pdo->prepare("DELETE FROM reviews WHERE id = ?");
        $stmt->execute([$reviewId]);
        
        echo json_encode([
            'success' => true,
            'message' => 'Review berhasil dihapus!'
        ]);
    } catch(PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
    exit;
}

echo json_encode([
    'success' => false,
    'message' => 'Invalid action'
]);
?>
