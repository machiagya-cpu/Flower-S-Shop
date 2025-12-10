<?php
session_start();
error_log("Update_product.php session: " . print_r($_SESSION, true));

header('Content-Type: application/json');

if (!isset($_SESSION['user_role'])) {
    echo json_encode(['success' => false, 'message' => 'Session user hilang!']);
    exit;
}

if ($_SESSION['user_role'] !== 'admin') {
    echo json_encode(['success' => false, 'message' => 'Role bukan admin!']);
    exit;
}

// Koneksi database
$host = 'localhost';
$dbname = 'flowerssshop';
$username = 'root';
$password = '';

// ✅ DEBUG: Cek session
error_log("Session data: " . print_r($_SESSION, true));
error_log("User role: " . ($_SESSION['user']['role'] ?? 'not set'));

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal upload gambar!']);
            exit;
        }
    } else {
        // Update tanpa mengubah gambar
        $stmt = $pdo->prepare("UPDATE products SET name=?, price=?, description=? WHERE id=?");
        $stmt->execute([$name, $price, $description, $id]);
    }

    echo json_encode(['success' => true, 'message' => 'Produk berhasil diupdate! ✅']);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
// ✅ Jangan ada output apapun setelah ini
?>
