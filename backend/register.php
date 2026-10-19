<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($name) || empty($email) || empty($password)) {
        header("Location: ../Frontend/signup.php?error=" . urlencode("All fields are required."));
        exit();
    }

    try {
        // 1. Check if email already exists using PDO
        $checkStmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->execute([$email]);

        if ($checkStmt->fetch()) {
            header("Location: ../Frontend/signup.php?error=" . urlencode("Email already registered!"));
            exit();
        }

        // 2. Insert new user into database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hashedPassword]);

        // 3. Auto login session set karein
        $_SESSION['user_id']    = $pdo->lastInsertId();
        $_SESSION['user_name']  = $name;
        $_SESSION['user_email'] = $email;

        header("Location: ../Frontend/index.php?signup=success");
        exit();

    } catch (Exception $e) {
        header("Location: ../Frontend/signup.php?error=" . urlencode("Registration Error: " . $e->getMessage()));
        exit();
    }
} else {
    header("Location: ../Frontend/signup.php");
    exit();
}
?>