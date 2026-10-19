<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        header("Location: ../Frontend/login.php?error=" . urlencode("Email aur Password dono required hain."));
        exit();
    }

    try {
        // Fetch user from database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            // Password Check (Supports both plain password & hashed password)
            if (password_verify($password, $user['password']) || $password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'] ?? 'User';
                $_SESSION['user_email'] = $user['email'];

                header("Location: ../Frontend/index.php?login=success");
                exit();
            } else {
                header("Location: ../Frontend/login.php?error=" . urlencode("Incorrect Password!"));
                exit();
            }
        } else {
            header("Location: ../Frontend/login.php?error=" . urlencode("User Email not found!"));
            exit();
        }
    } catch (Exception $e) {
        header("Location: ../Frontend/login.php?error=" . urlencode("Login Error: " . $e->getMessage()));
        exit();
    }
} else {
    header("Location: ../Frontend/login.php");
    exit();
}
?>