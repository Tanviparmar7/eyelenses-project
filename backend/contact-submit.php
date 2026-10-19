<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        header("Location: ../Frontend/contact.php?error=" . urlencode("All fields are required."));
        exit();
    }

    try {
        // Insert message into contact_messages table in database
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);

        header("Location: ../Frontend/contact.php?success=" . urlencode("Aapka message receive ho gaya hai!"));
        exit();
    } catch (Exception $e) {
        header("Location: ../Frontend/contact.php?error=" . urlencode("Error: " . $e->getMessage()));
        exit();
    }
} else {
    header("Location: ../Frontend/contact.php");
    exit();
}
?>