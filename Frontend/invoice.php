<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../backend/database.php';

if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$orderId = filter_input(INPUT_GET, 'order_id', FILTER_VALIDATE_INT);

if (!$orderId || $orderId < 1) {
    die('Invalid order ID. Please place an order first.');
}

$userId = (int) $_SESSION['user_id'];

$stmt = $conn->prepare(
    "SELECT * FROM customer_orders WHERE id = ? AND user_id = ?"
);

if (!$stmt) {
    die('Could not load invoice. Please check your database.');
}

$stmt->bind_param('ii', $orderId, $userId);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

if (!$order) {
    die('Order not found or you do not have permission to view it.');
}

$stmt = $conn->prepare(
    "SELECT product_name, category, price, quantity, line_total
     FROM customer_order_items
     WHERE order_id = ?"
);

if (!$stmt) {
    die('Could not load invoice items.');
}

$stmt->bind_param('i', $orderId);
$stmt->execute();
$result = $stmt->get_result();

$items = [];

while ($item = $result->fetch_assoc()) {
    $items[] = $item;
}

$stmt->close();

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$showSuccess = isset($_GET['success']) && $_GET['success'] === '1';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice #<?= (int)$order['id'] ?> | EyeLenses</title>
<script src="https://cdn.tailwindcss.com"></script>

<style>
body {
    font-family: Arial, sans-serif;
}

@media print {
    .no-print {
        display: none !important;
    }

    body {
        background: white !important;
        padding: 0 !important;
    }

    .invoice {
        box-shadow: none !important;
        border: none !important;
        max-width: 100% !important;
    }
}
</style>
</head>

<body class="bg-slate-100 p-4 md:p-10 text-slate-800">

<?php if ($showSuccess): ?>
<script>
window.addEventListener('load', function () {
    alert('Order Placed Successfully!');
});
</script>
<?php endif; ?>

<div class="invoice max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-6 md:p-10">

    <div class="flex justify-between items-start border-b pb-6">
        <div>
            <h1 class="text-3xl font-extrabold text-sky-600">
                EyeLenses
            </h1>
            <p class="text-sm text-slate-500 mt-2">
                Luxury Eyewear Store
            </p>
        </div>

        <div class="text-right">
            <h2 class="text-2xl font-bold">INVOICE</h2>
            <p class="mt-2 text-sm">
                Invoice No: EL-<?= (int)$order['id'] ?>
            </p>
            <p class="text-sm text-slate-500">
                <?= e(date('d M Y, h:i A', strtotime($order['order_date']))) ?>
            </p>
        </div>
    </div>

    <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 mt-6">
        <h3 class="font-bold text-emerald-700">
            Order placed successfully!
        </h3>
        <p class="text-sm text-slate-600 mt-1">
            Order Status: <?= e($order['order_status']) ?>
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 py-8">
        <div>
            <h3 class="font-bold uppercase text-sm mb-3">
                Delivery Details
            </h3>

            <p class="font-semibold"><?= e($order['customer_name']) ?></p>
            <p><?= e($order['phone']) ?></p>
            <p><?= nl2br(e($order['address'])) ?></p>
            <p>
                <?= e($order['city']) ?> - <?= e($order['pincode']) ?>
            </p>
        </div>

        <div class="md:text-right">
            <h3 class="font-bold uppercase text-sm mb-3">
                Payment Details
            </h3>

            <p>Method: <?= e($order['payment_method']) ?></p>
            <p>Payment Status: <?= e($order['payment_status']) ?></p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-900 text-white">
                <tr>
                    <th class="p-3 text-left">Product</th>
                    <th class="p-3 text-left">Category</th>
                    <th class="p-3 text-right">Price</th>
                    <th class="p-3 text-center">Qty</th>
                    <th class="p-3 text-right">Amount</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($items as $item): ?>
                <tr class="border-b">
                    <td class="p-3 font-semibold">
                        <?= e($item['product_name']) ?>
                    </td>
                    <td class="p-3"><?= e($item['category']) ?></td>
                    <td class="p-3 text-right">
                        ₹<?= number_format((float)$item['price'], 2) ?>
                    </td>
                    <td class="p-3 text-center">
                        <?= (int)$item['quantity'] ?>
                    </td>
                    <td class="p-3 text-right font-semibold">
                        ₹<?= number_format((float)$item['line_total'], 2) ?>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($items)): ?>
                <tr>
                    <td colspan="5" class="p-4 text-center">
                        No products found for this order.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="flex justify-end mt-6">
        <div class="w-full max-w-xs border-t pt-4">
            <div class="flex justify-between font-bold text-xl">
                <span>Total</span>
                <span class="text-sky-600">
                    ₹<?= number_format((float)$order['total_amount'], 2) ?>
                </span>
            </div>
            <p class="text-xs text-slate-500 mt-2">
                Delivery charges: Free
            </p>
        </div>
    </div>

    <div class="text-center border-t mt-8 pt-6">
        <h3 class="font-bold text-lg">
            Thank you for shopping with EyeLenses!
        </h3>
        <p class="text-sm text-slate-500 mt-2">
            We appreciate your trust in us.
        </p>
    </div>

    <div class="no-print flex flex-wrap justify-center gap-3 mt-8">
        <button onclick="window.print()"
            class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-full font-bold">
            Print / Save as PDF
        </button>

        <a href="products.php"
            class="bg-slate-900 hover:bg-slate-700 text-white px-6 py-3 rounded-full font-bold">
            Continue Shopping
        </a>
    </div>

</div>
</body>
</html>
