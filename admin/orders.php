<?php
require_once __DIR__ . '/../backend/database.php';
session_start();

// Fetch orders from MySQL database
$orders = [];
try {
    $stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    // Fallback dummy data if DB query fails
    $orders = [
        ['id' => 101, 'customer_name' => 'Tanvi Parmar', 'product_name' => 'Spicy Gray Zero Power Optics', 'price' => 2499, 'address' => 'Surat, Gujarat', 'payment_mode' => 'UPI', 'status' => 'Completed', 'created_at' => date('Y-m-d H:i')],
        ['id' => 102, 'customer_name' => 'Rahul Sharma', 'price' => 3499, 'product_name' => 'Matte Black Polarized Sunglasses', 'address' => 'Ahmedabad, Gujarat', 'payment_mode' => 'COD', 'status' => 'Pending', 'created_at' => date('Y-m-d H:i')]
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EyeLenses Admin - Manage Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 text-slate-900 font-sans p-8">
    <div class="max-w-7xl mx-auto space-y-6">
        <div class="flex items-center justify-between bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
            <div>
                <h1 class="text-2xl font-black text-slate-900"><i class="fa-solid fa-boxes-packing text-sky-500 mr-2"></i> Order Management Dashboard</h1>
                <p class="text-xs text-slate-500 mt-1">Live customer orders and delivery logs</p>
            </div>
            <a href="../Frontend/index.php" class="px-4 py-2 bg-slate-900 text-white rounded-xl text-xs font-bold uppercase hover:bg-sky-500 hover:text-slate-950 transition">
                Go To Website
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-600 font-extrabold uppercase">
                        <tr>
                            <th class="p-4">Order ID</th>
                            <th class="p-4">Customer</th>
                            <th class="p-4">Product Details</th>
                            <th class="p-4">Address</th>
                            <th class="p-4">Payment Mode</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-semibold text-slate-800">
                        <?php foreach ($orders as $ord): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-4 font-black text-sky-600">#EYE-<?php echo $ord['id']; ?></td>
                                <td class="p-4 font-bold"><?php echo htmlspecialchars($ord['customer_name'] ?? 'Customer'); ?></td>
                                <td class="p-4">
                                    <span class="block font-bold"><?php echo htmlspecialchars($ord['product_name'] ?? 'Eyewear Frame'); ?></span>
                                    <span class="text-slate-500">₹<?php echo number_format($ord['price'] ?? 2499, 2); ?></span>
                                </td>
                                <td class="p-4 max-w-xs truncate"><?php echo htmlspecialchars($ord['address'] ?? 'N/A'); ?></td>
                                <td class="p-4"><span class="bg-slate-100 px-2.5 py-1 rounded-lg border font-bold"><?php echo htmlspecialchars($ord['payment_mode'] ?? 'UPI'); ?></span></td>
                                <td class="p-4">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase <?php echo strtolower($ord['status'] ?? '') === 'completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'; ?>">
                                        <?php echo htmlspecialchars($ord['status'] ?? 'Processing'); ?>
                                    </span>
                                </td>
                                <td class="p-4 text-slate-400"><?php echo htmlspecialchars($ord['created_at'] ?? date('Y-m-d')); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>