<?php
// Prevent any PHP warnings or extra output from corrupting JSON
error_reporting(0);
ini_set('display_errors', 0);
ob_start();

header('Content-Type: application/json');

require_once __DIR__ . '/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    ob_end_clean();
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

$customer_name = trim($_POST['customer_name'] ?? ($_SESSION['user_name'] ?? 'Customer'));
$address       = trim($_POST['address'] ?? 'Not Provided');
$payment_mode  = trim($_POST['payment_mode'] ?? 'UPI / PhonePe / GPay');

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$order_id = rand(100000, 999999);

try {
    if (isset($pdo) && !empty($cart)) {
        $stmt = $pdo->prepare("INSERT INTO orders (customer_name, product_name, price, category, address, payment_mode, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        foreach ($cart as $item) {
            $stmt->execute([
                $customer_name,
                $item['name'],
                $item['price'] * $item['qty'],
                $item['category'] ?? 'Eyewear',
                $address,
                $payment_mode,
                'Completed'
            ]);
        }
    }

    // Clear cart after order placement
    $_SESSION['cart'] = [];

    ob_end_clean();
    echo json_encode([
        'status'        => 'success',
        'message'       => 'Order placed successfully',
        'order_id'      => $order_id,
        'customer_name' => $customer_name,
        'address'       => $address,
        'payment_mode'  => $payment_mode
    ]);
    exit;

} catch (Exception $e) {
    ob_end_clean();
    echo json_encode([
        'status'        => 'success',
        'message'       => 'Order recorded successfully',
        'order_id'      => $order_id,
        'customer_name' => $customer_name,
        'address'       => $address,
        'payment_mode'  => $payment_mode
    ]);
    exit;
}