<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function cartResponse($status, $message = '') {
    $cart = [];
    $count = 0;

    foreach ($_SESSION['cart'] as $key => $item) {
        if (is_array($item)) {
            $item['id'] = (int)($item['id'] ?? $key);
            $item['qty'] = (int)($item['qty'] ?? 1);
        } else {
            $item = [
                'id' => (int)$key,
                'name' => 'Product',
                'price' => 0,
                'category' => '',
                'image' => '',
                'qty' => (int)$item
            ];
        }

        $count += $item['qty'];
        $cart[] = $item;
    }

    echo json_encode([
        'status' => $status,
        'message' => $message,
        'cartCount' => $count,
        'cart' => $cart
    ]);

    exit;
}

$action = $_GET['action'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

// GET CART
if ($action === 'get' && $method === 'GET') {
    cartResponse('success', 'Cart loaded.');
}

// ADD PRODUCT
if ($action === 'add' && $method === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $price = (float)($_POST['price'] ?? 0);
    $category = trim($_POST['category'] ?? '');
    $image = trim($_POST['image'] ?? '');

    if ($id <= 0 || $name === '' || $price < 0) {
        cartResponse('error', 'Invalid product details.');
    }

    if (isset($_SESSION['cart'][$id])) {
        $existing = $_SESSION['cart'][$id];

        $qty = is_array($existing)
            ? (int)($existing['qty'] ?? 1)
            : (int)$existing;

        if ($qty >= 99) {
            cartResponse('error', 'Maximum quantity is 99.');
        }

        if (is_array($existing)) {
            $_SESSION['cart'][$id]['qty'] = $qty + 1;
        } else {
            $_SESSION['cart'][$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'category' => $category,
                'image' => $image,
                'qty' => $qty + 1
            ];
        }
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'category' => $category,
            'image' => $image,
            'qty' => 1
        ];
    }

    cartResponse('success', 'Product added to cart.');
}

// UPDATE QUANTITY
if ($action === 'update' && $method === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $qty = (int)($_POST['qty'] ?? 0);

    if (!isset($_SESSION['cart'][$id])) {
        cartResponse('error', 'Product not found in cart.');
    }

    if ($qty < 1 || $qty > 99) {
        cartResponse('error', 'Quantity must be between 1 and 99.');
    }

    if (is_array($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] = $qty;
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => 'Product',
            'price' => 0,
            'category' => '',
            'image' => '',
            'qty' => $qty
        ];
    }

    cartResponse('success', 'Quantity updated.');
}

// REMOVE PRODUCT
if ($action === 'remove' && $method === 'POST') {
    $id = (int)($_POST['id'] ?? 0);

    if (!isset($_SESSION['cart'][$id])) {
        cartResponse('error', 'Product not found in cart.');
    }

    unset($_SESSION['cart'][$id]);

    cartResponse('success', 'Product removed.');
}

http_response_code(400);
cartResponse('error', 'Invalid action or request method.');
?>
