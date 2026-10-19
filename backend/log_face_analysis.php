<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json');
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId    = $_SESSION['user_id'] ?? null;
    $faceShape = trim($_POST['face_shape'] ?? 'Unknown');
    $pdValue   = floatval($_POST['pd_value'] ?? 63.0);
    $fitStatus = trim($_POST['fit_status'] ?? 'Optimal');

    try {
        $stmt = $pdo->prepare("INSERT INTO face_analysis_logs (user_id, face_shape, pd_value, fit_status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $faceShape, $pdValue, $fitStatus]);

        echo json_encode([
            'status' => 'success',
            'message' => 'Face analysis log recorded successfully',
            'log_id' => $pdo->lastInsertId()
        ]);
        exit();
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database error: ' . $e->getMessage()
        ]);
        exit();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit();
}
?>