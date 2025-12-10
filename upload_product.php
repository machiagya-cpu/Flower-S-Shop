<?php
session_start();

// ✅ Log untuk debugging
error_log("=== UPDATE PRODUCT DEBUG ===");
error_log("Session ID: " . session_id());
error_log("Session data: " . print_r($_SESSION, true));

header('Content-Type: application/json');

// ✅ Cek session user (FLAT structure)
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Session user hilang! Silakan login kembali.',
        'debug' => [
            'session_id' => session_id(),
            'has_user_id' => isset($_SESSION['user_id']),
            'session_keys' => array_keys($_SESSION)
        ]
    ]);
    exit;
}

// ✅ Cek role admin (FLAT structure)
if ($_SESSION['user_role'] !== 'admin') {
    echo json_encode([
        'success' => false,
        'message' => 'Hanya admin yang bisa edit produk! Role Anda: ' . $_SESSION['user_role']
    ]);
    exit;
}

// Koneksi database
require_once 'db_connection.php';

try {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? null;
    $price = $_POST['price'] ?? null;
    $description = $_POST['description'] ?? null;

    if (!$id || !$name || !$price || !$description) {
        echo json_encode(['success' => false, 'message' => 'Data tidak lengkap!']);
        exit;
    }

    // Cek apakah ada upload gambar
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Validasi tipe file
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        $fileType = $_FILES['image']['type'];

        if (!in_array($fileType, $allowedTypes)) {
            echo json_encode(['success' => false, 'message' => 'Format gambar tidak valid! Gunakan JPG, PNG, atau GIF.']);
            exit;
        }

        // Generate nama file unik
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $imagePath = $uploadDir . $imageName;

        // Upload file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            // Update dengan gambar baru
            $stmt = $pdo->prepare("UPDATE products SET name=?, price=?, image=?, description=? WHERE id=?");
            $stmt->execute([$name, $price, $imagePath, $description, $id]);

            error_log("✅ Product updated WITH image: ID=$id by " . $_SESSION['user_name']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal upload gambar!']);
            exit;
        }
    } else {
        // Update tanpa mengubah gambar
        $stmt = $pdo->prepare("UPDATE products SET name=?, price=?, description=? WHERE id=?");
        $stmt->execute([$name, $price, $description, $id]);

        error_log("✅ Product updated WITHOUT image: ID=$id by " . $_SESSION['user_name']);
    }

    echo json_encode(['success' => true, 'message' => 'Produk berhasil diupdate! ✅']);

} catch (PDOException $e) {
    error_log("❌ Database error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    error_log("❌ General error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
